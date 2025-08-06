<?php

namespace App\Http\Controllers\Admin;

use App\Models\PricingPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PricingPackageRequest;
use App\Services\PricingPackage\PricingPackageService;
use Illuminate\Support\Facades\Log;

class PricingPackageController extends Controller
{
    protected $pricingPackageService;

    public function __construct(PricingPackageService $pricingPackageService)
    {
        $this->pricingPackageService = $pricingPackageService;
    }

    public function index()
    {
        $data['packages'] = $this->pricingPackageService->getAllPricingPackage(true);
        return view('admin.pricing_packages.index')->with($data);
    }

    public function create()
    {
        return view('admin.pricing_packages.add');
    }

    public function store(PricingPackageRequest $request)
    {

        // dd($request->all());
        $this->pricingPackageService->storePricingPackage($request);
        return redirect()->route('admin.pricing_packages.index')->with('success', 'Pricing package created successfully.');
    }

    public function edit($id)
    {
        $data['package'] = $this->pricingPackageService->getAPricingPackage($id);
        return view('admin.pricing_packages.edit')->with($data);
    }

    public function update(PricingPackageRequest $request, $id)
    {
        $this->pricingPackageService->updatePricingPackage($request, $id);
        return redirect()->route('admin.pricing_packages.index')->with('success', 'Pricing package updated successfully.');
    }

    public function destroy($id)
    {
        if ($this->pricingPackageService->destroyPricingPackage($id)) {
            return redirect()->route('admin.pricing_packages.index')->with('success', 'Pricing package deleted successfully.');
        }

        return back()->withErrors(['error' => 'Failed to delete pricing package.']);
    }
}

