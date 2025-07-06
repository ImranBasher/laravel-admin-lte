<?php

namespace App\Services\SubServiceCategory;

use App\Models\MultipleImage;
use App\Models\SubServiceCategory;
use Illuminate\Support\Facades\Log;

class SubServiceCategoryService
{
public function getAllSubServiceCategory($paginatePluckOrGet = null, array $relationships = [])
    {
        $query = SubServiceCategory::query();
        !empty($relationships) ? $query->with($relationships) : $query->with([]);

        if (is_null($paginatePluckOrGet)) {
            return $query->pluck('id', 'sub_service_name');
        }

        return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
    }

    public function getASubServiceCategory($id)
    {
        return SubServiceCategory::with(['multipleImages', 'serviceCategory'])->findOrFail($id);
    }

    public function storeSubServiceCategory($request)
    {
        try {
            $data = $request->validated();
            $data['status'] = 1;

            $subServiceCategory = SubServiceCategory::create($data);

            $imageFields = [
                'logo'                      => 'sub_service_categories/logo',
                'banner'                    => 'sub_service_categories/banner',
                // 'features_and_benefit_image'=> 'sub_service_categories/features_and_benefit',
                // 'how_do_we_work_image'      => 'sub_service_categories/how_do_we_work',
                // 'expected_result_image'     => 'sub_service_categories/expected_result',
                'quantity_logo'             => 'sub_service_categories/quantity_logo'
            ];

            foreach ($imageFields as $field => $directory) {
                if ($request->hasFile($field)) {
                    $data[$field] = singlePhotoUpload($request->file($field), $directory);

                    MultipleImage::create([
                        'sub_service_category_id' => $subServiceCategory->id,
                        'image' => $data[$field],
                        'type' => $field,
                        'purpose' => 'sub_service_category'
                    ]);
                }
            }

            if ($request->hasFile('key_service_images')) {
                foreach ($request->file('key_service_images') as $file) {
                    $path = singlePhotoUpload($file, 'sub_service_categories/key_service_images');

                    MultipleImage::create([
                        'sub_service_category_id' => $subServiceCategory->id,
                        'image' => $path,
                        'type' => 'key_service_images',
                        'purpose' => 'sub_service_category'
                    ]);
                }
            }

            if ($request->hasFile('features_and_benefit_images')) {
                foreach ($request->file('features_and_benefit_images') as $file) {
                    $path = singlePhotoUpload($file, 'sub_service_categories/features_and_benefit_images');

                    MultipleImage::create([
                        'sub_service_category_id' => $subServiceCategory->id,
                        'image' => $path,
                        'type' => 'features_and_benefit_images',
                        'purpose' => 'sub_service_category'
                    ]);
                }
            }

            if ($request->hasFile('how_do_we_work_images')) {
                foreach ($request->file('how_do_we_work_images') as $file) {
                    $path = singlePhotoUpload($file, 'sub_service_categories/how_do_we_work_images');

                    MultipleImage::create([
                        'sub_service_category_id' => $subServiceCategory->id,
                        'image' => $path,
                        'type' => 'how_do_we_work_images',
                        'purpose' => 'sub_service_category'
                    ]);
                }
            }

            
            if ($request->hasFile('expected_result_images')) {
                foreach ($request->file('expected_result_images') as $file) {
                    $path = singlePhotoUpload($file, 'sub_service_categories/expected_result_images');

                    MultipleImage::create([
                        'sub_service_category_id' => $subServiceCategory->id,
                        'image' => $path,
                        'type' => 'expected_result_images',
                        'purpose' => 'sub_service_category'
                    ]);
                }
            }

            return $subServiceCategory;
        } catch (\Throwable $exception) {
            Log::error('Error storing Sub Service Category', ['exception' => $exception]);
        }
    }

    public function updateSubServiceCategory($request, $id)
    {
        try {
            $subServiceCategory = $this->getASubServiceCategory($id);
            $data = $request->validated();

            $imageFields = [
                'logo'                      => 'sub_service_categories/logo',
                'banner'                    => 'sub_service_categories/banner',
                // 'features_and_benefit_image'=> 'sub_service_categories/features_and_benefit',
                // 'how_do_we_work_image'      => 'sub_service_categories/how_do_we_work',
                // 'expected_result_image'     => 'sub_service_categories/expected_result',
                'quantity_logo'             => 'sub_service_categories/quantity_logo'
            ];

            foreach ($imageFields as $field => $directory) {
                if ($request->hasFile($field)) {
                    MultipleImage::where('sub_service_category_id', $subServiceCategory->id)
                        ->where('type', $field)->delete();

                    $imagePath = singlePhotoUpload($request->file($field), $directory);

                    MultipleImage::create([
                        'sub_service_category_id' => $subServiceCategory->id,
                        'image' => $imagePath,
                        'type' => $field,
                        'purpose' => 'sub_service_category'
                    ]);
                }
            }

            if ($request->hasFile('key_service_images')) {
                MultipleImage::where('sub_service_category_id', $subServiceCategory->id)
                    ->where('type', 'key_service_images')->delete();

                foreach ($request->file('key_service_images') as $file) {
                    $path = singlePhotoUpload($file, 'sub_service_categories/key_service_images');

                    MultipleImage::create([
                        'sub_service_category_id' => $subServiceCategory->id,
                        'image' => $path,
                        'type' => 'key_service_images',
                        'purpose' => 'sub_service_category'
                    ]);
                }
            }


            if ($request->hasFile('features_and_benefit_images')) {
                MultipleImage::where('sub_service_category_id', $subServiceCategory->id)
                    ->where('type', 'features_and_benefit_images')->delete();

                foreach ($request->file('features_and_benefit_images') as $file) {
                    $path = singlePhotoUpload($file, 'sub_service_categories/features_and_benefit_images');

                    MultipleImage::create([
                        'sub_service_category_id' => $subServiceCategory->id,
                        'image' => $path,
                        'type' => 'features_and_benefit_images',
                        'purpose' => 'sub_service_category'
                    ]);
                }
            }

            if ($request->hasFile('how_do_we_work_images')) {
                MultipleImage::where('sub_service_category_id', $subServiceCategory->id)
                    ->where('type', 'how_do_we_work_images')->delete();

                foreach ($request->file('how_do_we_work_images') as $file) {
                    $path = singlePhotoUpload($file, 'sub_service_categories/how_do_we_work_images');

                    MultipleImage::create([
                        'sub_service_category_id' => $subServiceCategory->id,
                        'image' => $path,
                        'type' => 'how_do_we_work_images',
                        'purpose' => 'sub_service_category'
                    ]);
                }
            }

            if ($request->hasFile('expected_result_images')) {
                MultipleImage::where('sub_service_category_id', $subServiceCategory->id)
                    ->where('type', 'expected_result_images')->delete();

                foreach ($request->file('expected_result_images') as $file) {
                    $path = singlePhotoUpload($file, 'sub_service_categories/expected_result_images');

                    MultipleImage::create([
                        'sub_service_category_id' => $subServiceCategory->id,
                        'image' => $path,
                        'type' => 'expected_result_images',
                        'purpose' => 'sub_service_category'
                    ]);
                }
            }
            $subServiceCategory->update($data);
            return $subServiceCategory;
        } catch (\Throwable $exception) {
            Log::error('Error updating Sub Service Category', ['exception' => $exception]);
        }
    }

    public function destroySubServiceCategory($id)
    {
        try {
            $subServiceCategory = $this->getASubServiceCategory($id);

            if (!$subServiceCategory) return false;

            foreach ($subServiceCategory->multipleImages as $image) {
                deleteSingleImage($image);
            }

            $subServiceCategory->delete();
            return true;
        } catch (\Throwable $exception) {
            Log::error('Error deleting Sub Service Category', ['exception' => $exception]);
            return false;
        }
    }
}

