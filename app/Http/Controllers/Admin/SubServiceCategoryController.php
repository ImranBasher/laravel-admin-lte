<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubServiceCategoryRequest;
use App\Services\SubServiceCategory\SubServiceCategoryService;

class SubServiceCategoryController extends Controller
{
    protected $subServiceCategoryService;

    public function __construct(SubServiceCategoryService $subServiceCategoryService)
    {
        $this->subServiceCategoryService = $subServiceCategoryService;
    }

    public function index()
    {
        $data['subServiceCategories'] = $this->subServiceCategoryService->getAllSubServiceCategory(true, ['serviceCategory', 'multipleImages']);
        return view('admin.sub_service_category.index')->with($data);
    }

    public function create()
    {
        $serviceCategories = ServiceCategory::pluck('service_name', 'id'); // adjust as needed

        return view('admin.sub_service_category.add', [
            'serviceCategories' => $serviceCategories,
            'subServiceCategory' => null, // <-- Add this line
        ]);
    }

    public function store(SubServiceCategoryRequest $request)
    {
        try {
            $this->subServiceCategoryService->storeSubServiceCategory($request);
            return redirect()->route('admin.sub_service_categories.index')->with('success', 'Sub Service Category saved successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error storing Sub Service Category', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to store Sub Service Category.']);
        }
    }

    public function edit($id)
    {
        $subServiceCategory = $this->subServiceCategoryService->getASubServiceCategory($id);
        $serviceCategories = ServiceCategory::pluck('service_name', 'id');
        return view('admin.sub_service_category.edit',compact('subServiceCategory', 'serviceCategories'));
    }

    public function update(SubServiceCategoryRequest $request, $id)
    {
        try {
            $this->subServiceCategoryService->updateSubServiceCategory($request, $id);
            return redirect()->route('admin.sub_service_categories.index')->with('success', 'Sub Service Category updated successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error updating Sub Service Category', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to update Sub Service Category.']);
        }
    }

    public function destroy($id)
    {
        try {
            $this->subServiceCategoryService->destroySubServiceCategory($id);
            return redirect()->route('admin.sub_service_categories.index')->with('success', 'Sub Service Category deleted successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error deleting Sub Service Category', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to delete Sub Service Category.']);
        }
    }
}
