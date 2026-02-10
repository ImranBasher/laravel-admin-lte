<?php

namespace App\Services\GeneralSetting;

use App\Models\MultipleImage;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GeneralSettingService
{
    public function getAGeneralSetting($id = null){
        return GeneralSetting::with(['multipleImages'])->latest()->first();
    }

    public function updateGeneralSetting($request, $id)
    {
        try {
            $generalSetting = $this->getAGeneralSetting($id);
            // $data           = $request->except(['logo', 'contact_us_logo', 'blog_header_banner', 'images']);
            $data = $request->validated();

            

            // Define image fields and their directories
            $imageFields = [
                'logo'               => 'general_settings/logo',
                'contact_us_logo'    => 'general_settings/contact_logo',
                'blog_header_banner' => 'general_settings/banner'
            ];

            foreach ($imageFields as $field => $directory) {
                if ($request->hasFile($field)) {
                    // Delete previous image if exists
                    if ($generalSetting->$field) {

                        // Delete from MultipleImage table first
                        MultipleImage::where('image', $generalSetting->$field)
                            ->where('general_setting_id', $generalSetting->id)
                            ->delete();
                        
                        // Delete actual file
                        $imagePath = storage_path('app/public/' . $generalSetting->$field);

                        if (file_exists($imagePath)) {
                            @unlink($imagePath);
                        }
                    }

                    // Upload new image
                    $data[$field] = singlePhotoUpload($request->file($field), $directory);

                    // Record in MultipleImage table
                    MultipleImage::create([
                        'general_setting_id' => $generalSetting->id,
                        'image'             => $data[$field],
                        'type'              => $field,
                        'purpose'           => 'general_setting'
                    ]);
                }
            }

            // Handle multiple images if needed
            if ($request->hasFile('images')) {
                // Delete previous multiple images
                MultipleImage::where('general_setting_id', $generalSetting->id)
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
                        'general_setting_id' => $generalSetting->id,
                        'image'             => $imageName,
                        'type'              => 'additional',
                        'purpose'           => 'general_setting'
                    ]);
                }
            }

            $generalSetting->update($data);
            return $generalSetting;

        } catch (\Throwable $exception) {
            Log::error('Error updating General Setting information in service', [
                'exception' => $exception
            ]);
        }

    }

    public function deleteGeneralSettingImage(int $id): bool
    {
        try {
            $image = MultipleImage::where('id', $id)
                ->where('purpose', 'general_setting')
                ->whereIn('type', ['logo','contact_us_logo','blog_header_banner','additional'])
                ->first();

            if (!$image) return false;

            if ($image->image && Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }

            $image->delete();

            return true;

        } catch (\Throwable $exception) {
            Log::error('Error deleting General Setting image in service', [
                'exception' => $exception,
                'image_id'  => $id,
            ]);
            return false;
        }
    }




}

