<?php

namespace App\Services\MainBanner;

use App\Models\MainBanner;
use App\Models\MultipleImage;
use Illuminate\Support\Facades\Log;

class MainBannerService
{
        public function getAllMainBanner(
            $paginatePluckOrGet = null,
            array $relationships = []
        )
        {
            $query = MainBanner::query();
            !empty($relationships) ? $query->with($relationships) : $query->with([]);

            if(is_null($paginatePluckOrGet)){
                return $query->pluck('id','short_title');
            }

            return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
        }



        public function getAMainBanner($id){

            return MainBanner::with('multipleImages')->findOrFail($id);

        }

        public function storeMainBanner($request){
                try{

                    $data = $request->validated();
                    $data['status'] = 1;
                    $mainBanner = MainBanner::create($data);
        
                    $imageFields = [
                        'banner_image'              => 'main_banner/banner_image',
                        'animation_banner_image'    => 'main_banner/animation_banner_image',
                    ];

                    foreach ($imageFields as $field => $directory) {
                        if ($request->hasFile($field)) {
                            // Upload new image
                            $data[$field] = singlePhotoUpload($request->file($field), $directory);

                            // Record in MultipleImage table
                            MultipleImage::create([
                                'main_banner_id'    => $mainBanner->id,
                                'image'             => $data[$field],
                                'type'              => $field,
                                'purpose'           => 'general_setting'
                            ]);
                        }
                    }

                    return $mainBanner; // Return the Notepad instance if needed
                }catch (\Throwable $exception) {
                Log::error('Error updating General Setting information in service', [
                    'exception' => $exception
                ]);
            }
        }

        
    public function updateMainBanner($request, $id)
    {
        try {
            $mainBanner = $this->getAMainBanner($id);

            $data = $request->validated();
            
            // Define image fields and their directories
            $imageFields = [
                'banner_image'              => 'main_banner/banner_image',
                'animation_banner_image'    => 'main_banner/animation_banner_image',
            ];

            foreach ($imageFields as $field => $directory) {
                if ($request->hasFile($field)) {
                    // Delete previous image if exists
                    if ($mainBanner->$field) {

                        // Delete from MultipleImage table first
                        MultipleImage::where('image', $mainBanner->$field)
                            ->where('main_banner_id', $mainBanner->id)
                            ->delete();
                        
                        // Delete actual file
                        $imagePath = storage_path('app/public/' . $mainBanner->$field);

                        if (file_exists($imagePath)) {
                            @unlink($imagePath);
                        }
                    }

                    // Upload new image
                    $data[$field] = singlePhotoUpload($request->file($field), $directory);

                    // Record in MultipleImage table
                    MultipleImage::create([
                        'main_banner_id'    => $mainBanner->id,
                        'image'             => $data[$field],
                        'type'              => $field,
                        'purpose'           => 'main_banner'
                    ]);
                }
            }

            // Handle multiple images if needed
            if ($request->hasFile('images')) {
                // Delete previous multiple images
                MultipleImage::where('main_banner_id', $mainBanner->id)
                    ->where('purpose', 'general_setting')
                    ->where('type', 'additional')
                    ->each(function($image) {
                        $imagePath = storage_path('app/public/' . $image->image);
                        if (file_exists($imagePath)) {
                            @unlink($imagePath);
                        }
                        $image->delete();
                    });

                // Upload new multiple images
                $uploadedImages = multipleImageUploadFiles($request, 'general_setting');

                foreach ($uploadedImages as $imageName) {
                    MultipleImage::create([
                        'main_banner_id' => $mainBanner->id,
                        'image'             => $imageName,
                        'type'              => 'additional',
                        'purpose'           => 'general_setting'
                    ]);
                }
            }

            $mainBanner->update($data);
            return $mainBanner;

        } catch (\Throwable $exception) {
            Log::error('Error updating main banner information in service', [
                'exception' => $exception
            ]);
        }

    }

    public function destroyMainBanner($id){

        $mainBanner = $this->getAMainBanner($id);

        if (!$mainBanner) {
            return false;
        }
        
        if ($mainBanner->multipleImages && $mainBanner->multipleImages->count()) {
            foreach ($mainBanner->multipleImages as $image) {
                deleteSingleImage($image); 
            }
        }

        $mainBanner->delete();

        return true;
    }

            




}

