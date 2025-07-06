<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\Product\ProductService;

class ProductController extends Controller
{
public $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $data['products'] = $this->productService->getAllProduct(true, ['multipleImages']);
        return view('admin.products.index')->with($data);
    }

    public function create()
    {
        return view('admin.products.add');
    }

    public function store(ProductRequest $request)
    {
        try {
            $this->productService->storeProduct($request);
            return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error storing product', ['exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)]);
            return back()->withErrors(['error' => 'Failed to create product.']);
        }
    }

    public function edit($id)
    {
        $data['product'] = $this->productService->getAProduct($id);
        return view('admin.products.edit')->with($data);
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            $this->productService->updateProduct($request, $id);
            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error updating product', ['exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)]);
            return back()->withErrors(['error' => 'Failed to update product.']);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->productService->destroyProduct($id);
            if (!$deleted) {
                return back()->withErrors(['error' => 'Product not found.']);
            }
            return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error deleting product', ['exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)]);
            return back()->withErrors(['error' => 'Failed to delete product.']);
        }
    }
}
