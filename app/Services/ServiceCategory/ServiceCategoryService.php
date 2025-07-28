<?php

namespace App\Services\ServiceCategory;

use App\Models\MultipleImage;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Log;

class ServiceCategoryService
{
   public function getAllServiceCategory($paginatePluckOrGet = null, array $relationships = [])
    {
        $query = ServiceCategory::query();
        !empty($relationships) ? $query->with($relationships) : $query->with([]);

        if (is_null($paginatePluckOrGet)) {
            return $query->pluck('id', 'service_name');
        }

        return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
    }

    public function getAServiceCategory($id)
    {
        try {
            return ServiceCategory::with('multipleImages')->findOrFail($id);
        } catch (\Throwable $exception) {
            Log::error('Error fetching Service Category', [
                'exception' => $exception
            ]);
            throw $exception;
        }
    }

    public function storeServiceCategory($request)
    {
        try {
            $data = $request->validated();
            $data['status'] = 1;
            $category = ServiceCategory::create($data);

            $imageFields = [
                'logo_first' => 'service_category/logo_first',
                // 'logo_second' => 'service_category/logo_second',
                // 'banner' => 'service_category/banner',
                // 'quantity_logo' => 'service_category/quantity_logo'
            ];

            foreach ($imageFields as $field => $directory) {
                if ($request->hasFile($field)) {
                    $data[$field] = singlePhotoUpload($request->file($field), $directory);
                    MultipleImage::create([
                        'service_category_id' => $category->id,
                        'image' => $data[$field],
                        'type' => $field,
                        'purpose' => $field
                    ]);
                }
            }

            Log::info("Service Category createdn" . json_encode([
                'data' => $category
            ], JSON_PRETTY_PRINT));

            return $category;
        } catch (\Throwable $exception) {
            Log::error('Error creating Service Category', [
                'exception' => $exception
            ]);
            throw $exception;
        }
    }

    public function updateServiceCategory($request, $id)
    {
        try {
            $category = $this->getAServiceCategory($id);
            $data = $request->validated();

            $imageFields = [
                'logo_first' => 'service_category/logo_first',
                'logo_second' => 'service_category/logo_second',
                'banner' => 'service_category/banner',
                'quantity_logo' => 'service_category/quantity_logo'
            ];

            foreach ($imageFields as $field => $directory) {
                if ($request->hasFile($field)) {
                    MultipleImage::where('image', $category->$field)->where('service_category_id', $category->id)->delete();
                    $imagePath = storage_path('app/public/' . $category->$field);
                    if (file_exists($imagePath)) {
                        @unlink($imagePath);
                    }
                    $data[$field] = singlePhotoUpload($request->file($field), $directory);
                    MultipleImage::create([
                        'service_category_id' => $category->id,
                        'image' => $data[$field],
                        'type' => $field,
                        'purpose' => 'service_category'
                    ]);
                }
            }

            $category->update($data);

            Log::info("Service Category updatedn" . json_encode([
                'id' => $id,
                'data' => $data
            ], JSON_PRETTY_PRINT));

            return $category;
        } catch (\Throwable $exception) {
            Log::error('Error updating Service Category', [
                'exception' => $exception
            ]);
            throw $exception;
        }
    }

    public function destroyServiceCategory($id)
    {
        try {
            $category = $this->getAServiceCategory($id);
            if (!$category) return false;

            if ($category->multipleImages && $category->multipleImages->count()) {
                foreach ($category->multipleImages as $image) {
                    deleteSingleImage($image);
                }
            }

            $category->delete();

            Log::info("Service Category deletedn" . json_encode(['id' => $id], JSON_PRETTY_PRINT));

            return true;
        } catch (\Throwable $exception) {
            Log::error('Error deleting Service Category', [
                'exception' => $exception
            ]);
            return false;
        }
    }
}

