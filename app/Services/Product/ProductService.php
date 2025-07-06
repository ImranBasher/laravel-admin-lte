<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Models\MultipleImage;
use Illuminate\Support\Facades\Log;

class ProductService
{

    public function getAllProduct($paginatePluckOrGet = null, array $relationships = [])
    {
        $query = Product::query();
        !empty($relationships) ? $query->with($relationships) : $query->with([]);

        if (is_null($paginatePluckOrGet)) {
            return $query->pluck('id', 'name');
        }

        return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
    }

    public function getAProduct($id)
    {
        return Product::with('multipleImages')->findOrFail($id);
    }

    public function storeProduct($request)
    {
        try {
            $data = $request->validated();
            $data['status'] = 1;
            $product = Product::create($data);

            if ($request->hasFile('product_image')) {
                foreach ($request->file('product_image') as $image) {
                    $imagePath = singlePhotoUpload($image, 'products/product_image');
                    MultipleImage::create([
                        'product_id' => $product->id,
                        'image'      => $imagePath,
                        'type'       => 'product_image',
                        'purpose'    => 'product'
                    ]);
                }
            }

            return $product;
        } catch (\Throwable $exception) {
            Log::error('Error storing product', ['exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)]);
        }
    }

    public function updateProduct($request, $id)
    {
        try {
            $product = $this->getAProduct($id);
            $data = $request->validated();

            if ($request->hasFile('product_image')) {
                
                foreach ($product->multipleImages as $image) {
                    deleteSingleImage($image);
                }

                foreach ($request->file('product_image') as $image) {
                    $imagePath = singlePhotoUpload($image, 'products/product_image');
                    MultipleImage::create([
                        'product_id' => $product->id,
                        'image'      => $imagePath,
                        'type'       => 'product_image',
                        'purpose'    => 'product'
                    ]);
                }
            }

            $product->update($data);
            return $product;
        } catch (\Throwable $exception) {
            Log::error('Error updating product', ['exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)]);
        }
    }

    public function destroyProduct($id)
    {
        $product = $this->getAProduct($id);
        if (!$product) return false;

        foreach ($product->multipleImages as $image) {
            deleteSingleImage($image);
        }

        $product->delete();
        return true;
    }
}

