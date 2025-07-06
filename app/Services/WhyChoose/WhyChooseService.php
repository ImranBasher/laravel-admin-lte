<?php

namespace App\Services\WhyChoose;

use App\Models\WhyChoose;
use App\Models\MultipleImage;
use Illuminate\Support\Facades\Log;

class WhyChooseService
{
public function getAllWhyChoose($paginatePluckOrGet = null, array $relationships = [])
    {
        $query = WhyChoose::query();
        !empty($relationships) ? $query->with($relationships) : $query->with([]);

        if (is_null($paginatePluckOrGet)) {
            return $query->pluck('id', 'title_start');
        }

        return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
    }

    public function getAWhyChoose($id)
    {
        return WhyChoose::with('multipleImages')->findOrFail($id);
    }

    public function storeWhyChoose($request)
    {
        try {
            $data = $request->validated();
            $data['status'] = 1;
            $whyChoose = WhyChoose::create($data);

            if ($request->hasFile('why_choose_image')) {
                $image = singlePhotoUpload($request->file('why_choose_image'), 'why_choose/images');

                MultipleImage::create([
                    'why_choose_id' => $whyChoose->id,
                    'image'         => $image,
                    'type'          => 'why_choose_image',
                    'purpose'       => 'why_choose',
                ]);
            }

            return $whyChoose;
        } catch (\Throwable $exception) {
            Log::error('Error storing Why Choose', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
        }
    }

    public function updateWhyChoose($request, $id)
    {
        try {
            $whyChoose = $this->getAWhyChoose($id);
            $data = $request->validated();

            if ($request->hasFile('why_choose_image')) {
                MultipleImage::where('why_choose_id', $whyChoose->id)
                    ->where('type', 'why_choose_image')
                    ->delete();

                $imagePath = singlePhotoUpload($request->file('why_choose_image'), 'why_choose/images');

                MultipleImage::create([
                    'why_choose_id' => $whyChoose->id,
                    'image'         => $imagePath,
                    'type'          => 'why_choose_image',
                    'purpose'       => 'why_choose',
                ]);
            }

            $whyChoose->update($data);
            return $whyChoose;
        } catch (\Throwable $exception) {
            Log::error('Error updating Why Choose', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
        }
    }

    public function destroyWhyChoose($id)
    {
        $whyChoose = $this->getAWhyChoose($id);

        if (!$whyChoose) {
            return false;
        }

        if ($whyChoose->multipleImages && $whyChoose->multipleImages->count()) {
            foreach ($whyChoose->multipleImages as $image) {
                deleteSingleImage($image);
            }
        }

        $whyChoose->delete();
        return true;
    }
}

