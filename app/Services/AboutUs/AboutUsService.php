<?php

namespace App\Services\AboutUs;

use App\Models\AboutUs;
use App\Models\MultipleImage;
use Illuminate\Support\Facades\Log;

class AboutUsService
{
    public function getAllAboutUs($paginatePluckOrGet = null, array $relationships = [])
    {
        $query = AboutUs::query();
        !empty($relationships) ? $query->with($relationships) : $query->with([]);

        if (is_null($paginatePluckOrGet)) {
            return $query->pluck('id', 'mechanics_title_start');
        }

        return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
    }




    public function getAAboutUs($id)
    {
        return AboutUs::with('multipleImages')->findOrFail($id);
    }

    public function storeAboutUs($request)
    {
        try {

            // dd($request->all());
            $data = $request->validated();
            $data['status'] = 1;
            $aboutUs = AboutUs::create($data);

            if ($request->hasFile('about_us_image')) {
                foreach ($request->file('about_us_image') as $image) {
                    $imagePath = singlePhotoUpload($image, 'about_us/image');
                    MultipleImage::create([
                        'about_us_id' => $aboutUs->id,
                        'image'       => $imagePath,
                        'type'        => 'about_us_image',
                        'purpose'     => 'about_us'
                    ]);
                }
            }

            return $aboutUs;
        } catch (\Throwable $exception) {
            Log::error('Error storing About Us', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
        }
    }

    public function updateAboutUs($request, $id)
    {
        try {
            $aboutUs = $this->getAAboutUs($id);
            $data = $request->validated();

            if ($request->hasFile('about_us_image')) {
                foreach ($aboutUs->multipleImages as $image) {
                    deleteSingleImage($image);
                }

                foreach ($request->file('about_us_image') as $image) {
                    $imagePath = singlePhotoUpload($image, 'about_us/image');
                    MultipleImage::create([
                        'about_us_id' => $aboutUs->id,
                        'image'       => $imagePath,
                        'type'        => 'about_us_image',
                        'purpose'     => 'about_us'
                    ]);
                }
            }

            $aboutUs->update($data);
            return $aboutUs;
        } catch (\Throwable $exception) {
            Log::error('Error updating About Us', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
        }
    }

    public function destroyAboutUs($id)
    {
        $aboutUs = $this->getAAboutUs($id);
        if (!$aboutUs) return false;

        foreach ($aboutUs->multipleImages as $image) {
            deleteSingleImage($image);
        }

        $aboutUs->delete();
        return true;
    }
}

