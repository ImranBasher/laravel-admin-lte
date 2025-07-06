<?php

namespace App\Services\FooterBanner;

use App\Models\FooterBanner;
use Illuminate\Support\Facades\Log;

class FooterBannerService
{
        public function getAllFooterBanner(
            $paginatePluckOrGet = null,
            array $relationships = []
        )
        {
            $query = FooterBanner::query();
            !empty($relationships) ? $query->with($relationships) : $query->with([]);

            if(is_null($paginatePluckOrGet)){
                return $query->pluck('id','title_a');
            }

            return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
        }





    public function getAFooterBanner($id)
    {
        return FooterBanner::with('multipleImages')->findOrFail($id);
    }

    public function storeFooterBanner($request)
    {
        try {
            $data = $request->validated();
            $data['status'] = 1;
            return FooterBanner::create($data);
        } catch (\Throwable $exception) {
            Log::error('Error storing Footer Banner', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
        }
    }

    public function updateFooterBanner($request, $id)
    {
        try {
            $footerBanner = $this->getAFooterBanner($id);
            $data = $request->validated();
            $footerBanner->update($data);
            return $footerBanner;
        } catch (\Throwable $exception) {
            Log::error('Error updating Footer Banner', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
        }
    }

    public function destroyFooterBanner($id)
    {
        $footerBanner = $this->getAFooterBanner($id);
        if (!$footerBanner) return false;

        foreach ($footerBanner->multipleImages as $image) {
            deleteSingleImage($image);
        }

        $footerBanner->delete();
        return true;
    }
}

