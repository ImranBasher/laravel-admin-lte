<?php

namespace App\Services\ScrollingHeading;

use App\Models\MultipleImage;
use App\Models\ScrollingHeading;
use Illuminate\Support\Facades\Log;

class ScrollingHeadingService
{
public function getAllScrollingHeading($paginatePluckOrGet = null, array $relationships = [])
    {
        $query = ScrollingHeading::query();
        !empty($relationships) ? $query->with($relationships) : $query->with([]);

        return is_null($paginatePluckOrGet)
            ? $query->pluck('id', 'name')
            : ($paginatePluckOrGet ? $query->paginate(20) : $query->get());
    }

    public function getAScrollingHeading($id)
    {
        return ScrollingHeading::with('multipleImages')->findOrFail($id);
    }

    public function storeScrollingHeading($request)
    {
        try {

        //    dd($request->all());
            $data = $request->validated();
            $data['status'] = 1;
            $scrollingHeading = ScrollingHeading::create($data);

            if ($request->hasFile('scrolling_heading_logo')) {
                $image = singlePhotoUpload($request->file('scrolling_heading_logo'), 'scrolling_heading/images');

                MultipleImage::create([
                    'scrolling_heading_id' => $scrollingHeading->id,
                    'image'                => $image,
                    'type'                 => 'scrolling_heading_logo',
                    'purpose'              => 'scrolling_heading',
                ]);
            }

            return $scrollingHeading;

        } catch (\Throwable $exception) {
            Log::error('Error storing Scrolling Heading', ['exception' => $exception]);
        }
    }

    public function updateScrollingHeading($request, $id)
    {

      
        try {
            $scrollingHeading = $this->getAScrollingHeading($id);
            $data = $request->validated();

            if ($request->hasFile('scrolling_heading_logo')) {
                foreach ($scrollingHeading->multipleImages->where('type', 'scrolling_heading_logo') as $image) {
                    $path = storage_path('app/public/' . $image->image);
                    if (file_exists($path)) {
                        @unlink($path);
                    }
                    $image->delete();
                }

                $newImage = singlePhotoUpload($request->file('scrolling_heading_logo'), 'scrolling_heading/images');

                MultipleImage::create([
                    'scrolling_heading_id' => $scrollingHeading->id,
                    'image'                => $newImage,
                    'type'                 => 'scrolling_heading_logo',
                    'purpose'              => 'scrolling_heading_logo',
                ]);
            }



            $scrollingHeading->update($data);
            return $scrollingHeading;
        } catch (\Throwable $exception) {
            Log::error('Error updating Scrolling Heading', ['exception' => $exception]);
        }
    }

    public function destroyScrollingHeading($id)
    {
        $scrollingHeading = $this->getAScrollingHeading($id);
        if (!$scrollingHeading) return false;

        if ($scrollingHeading->multipleImages->count()) {
            foreach ($scrollingHeading->multipleImages as $image) {
                deleteSingleImage($image);
            }
        }

        $scrollingHeading->delete();
        return true;
    }
}

