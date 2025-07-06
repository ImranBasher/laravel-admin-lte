<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceCategoryRequest;
use App\Services\ServiceCategory\ServiceCategoryService;

class ServiceCategoryController extends Controller
{
    protected $serviceCategoryService;

    public function __construct(ServiceCategoryService $serviceCategoryService)
    {
        $this->serviceCategoryService = $serviceCategoryService;
    }

    public function index()
    {
        $data['serviceCategories'] = $this->serviceCategoryService->getAllServiceCategory(true, ['multipleImages']);
        return view('admin.home_pages.service_categories.index', $data);
    }

    public function create()
    {
        return view('admin.home_pages.service_categories.add');
    }

    public function store(ServiceCategoryRequest $request)
    {
        $this->serviceCategoryService->storeServiceCategory($request);
        return redirect()->route('admin.service_categories.index')->with('success', 'Service Category saved successfully.');
    }

    public function edit($id)
    {
        $data['serviceCategory'] = $this->serviceCategoryService->getAServiceCategory($id);
        return view('admin.home_pages.service_categories.edit', $data);
    }

    public function update(ServiceCategoryRequest $request, $id)
    {
        $this->serviceCategoryService->updateServiceCategory($request, $id);
        return redirect()->route('admin.service_categories.index')->with('success', 'Service Category updated successfully.');
    }

    public function destroy($id)
    {
        $this->serviceCategoryService->destroyServiceCategory($id);
        return redirect()->route('admin.service_categories.index')->with('success', 'Service Category deleted successfully.');
    }
}
