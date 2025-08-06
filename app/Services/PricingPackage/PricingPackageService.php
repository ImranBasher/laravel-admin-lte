<?php

namespace App\Services\PricingPackage;

use App\Models\PricingPackage;
use Illuminate\Support\Facades\Log;

class PricingPackageService
{
 public function getAllPricingPackage(
        $paginatePluckOrGet = null,
        array $relationships = []
    ) {
        $query = PricingPackage::query();
        !empty($relationships) ? $query->with($relationships) : $query->with([]);

        if (is_null($paginatePluckOrGet)) {
            return $query->pluck('id', 'name');
        }

        return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
    }

    public function getAPricingPackage($id)
    {
        return PricingPackage::findOrFail($id);
    }

public function storePricingPackage($request)
{
    try {
        $data = $request->validated();

        // Convert comma-separated features string to array
        if (isset($data['features']) && is_string($data['features'])) {
            $data['features'] = array_map('trim', explode(',', $data['features']));
        }

        return PricingPackage::create($data);
    } catch (\Throwable $exception) {
        Log::error('Error storing pricing package', [
            'exception' => $exception
        ]);
    }
}


public function updatePricingPackage($request, $id)
{
    try {
        $pricingPackage = $this->getAPricingPackage($id);
        $data = $request->validated();

        // Convert comma-separated features string to array
        if (isset($data['features']) && is_string($data['features'])) {
            $data['features'] = array_map('trim', explode(',', $data['features']));
        }

        $pricingPackage->update($data);
        return $pricingPackage;
    } catch (\Throwable $exception) {
        Log::error('Error updating pricing package', [
            'exception' => $exception
        ]);
    }
}


    public function destroyPricingPackage($id)
    {
        try {
            $pricingPackage = $this->getAPricingPackage($id);
            $pricingPackage->delete();
            return true;
        } catch (\Throwable $exception) {
            Log::error('Error deleting pricing package', [
                'exception' => $exception
            ]);
            return false;
        }
    }
}