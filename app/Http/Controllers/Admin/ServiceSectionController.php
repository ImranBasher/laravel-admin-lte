<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceSectionRequest;
use App\Services\ServiceSection\ServiceSectionService;

class ServiceSectionController extends Controller
{
       public $serviceSectionService;

    public function __construct(ServiceSectionService $service)
    {
        $this->serviceSectionService = $service;
    }

    public function index()
    {
        $data['sections'] = $this->serviceSectionService->getAllServiceSection(true);
        return view('admin.home_pages.service_sections.index')->with($data);
    }

    public function create(){
        return view('admin.home_pages.service_sections.add');
    }

    public function store(ServiceSectionRequest $request)
    {
        $this->serviceSectionService->storeServiceSection($request);
        return redirect()->route('admin.service_sections.index')->with('success', 'Service Section created successfully.');
    }

    public function edit($id)
    {
        $data['section'] = $this->serviceSectionService->getAServiceSection($id);
        return view('admin.home_pages.service_sections.edit')->with($data);
    }

    public function update(ServiceSectionRequest $request, $id)
    {
        $this->serviceSectionService->updateServiceSection($request, $id);
        return redirect()->route('admin.service_sections.index')->with('success', 'Service Section updated successfully.');
    }

    public function destroy($id)
    {
        $this->serviceSectionService->destroyServiceSection($id);
        return redirect()->route('admin.service_sections.index')->with('success', 'Service Section deleted successfully.');
    }

}
