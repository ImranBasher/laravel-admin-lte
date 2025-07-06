<?php

namespace App\Services\Motivation;

use App\Models\Motivation;
use App\Models\MultipleImage;
use Illuminate\Support\Facades\Log;

class MotivationService
{
 public function getAllMotivation($paginate = null, array $relationships = [])
    {
        $query = Motivation::query();
        !empty($relationships) ? $query->with($relationships) : $query->with([]);

        if (is_null($paginate)) {
            return $query->pluck('id', 'title');
        }

        return $paginate ? $query->paginate(20) : $query->get();
    }

    public function getAMotivation($id)
    {
        return Motivation::with('multipleImages')->findOrFail($id);
    }

    public function storeMotivation($request)
    {
        try {
            $data = $request->validated();
            $data['status'] = 1;
            $motivation = Motivation::create($data);

            if ($request->hasFile('motivation_image')) {
                $image = singlePhotoUpload($request->file('motivation_image'), 'motivation/images');

                MultipleImage::create([
                    'motivation_id' => $motivation->id,
                    'image' => $image,
                    'type' => 'motivation_image',
                    'purpose' => 'motivation',
                ]);
            }

            return $motivation;
        } catch (\Throwable $exception) {
            Log::error('Error storing motivation', ['exception' => $exception]);
        }
    }

    public function updateMotivation($request, $id)
    {
        try {
            $motivation = $this->getAMotivation($id);
            $data = $request->validated();

            if ($request->hasFile('motivation_image')) {
                foreach ($motivation->multipleImages->where('type', 'motivation_image') as $image) {
                    $path = storage_path('app/public/' . $image->image);
                    if (file_exists($path)) {
                        @unlink($path);
                    }
                    $image->delete();
                }

                $newImage = singlePhotoUpload($request->file('motivation_image'), 'motivation/images');

                MultipleImage::create([
                    'motivation_id' => $motivation->id,
                    'image' => $newImage,
                    'type' => 'motivation_image',
                    'purpose' => 'motivation',
                ]);
            }

            $motivation->update($data);
            return $motivation;
        } catch (\Throwable $exception) {
            Log::error('Error updating motivation', ['exception' => $exception]);
        }
    }

    public function destroyMotivation($id)
    {
        $motivation = $this->getAMotivation($id);

        if (!$motivation) return false;

        foreach ($motivation->multipleImages as $image) {
            deleteSingleImage($image);
        }

        $motivation->delete();
        return true;
    }
}

