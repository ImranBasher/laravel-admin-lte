<?php

namespace App\Services\CustomerReview;

use App\Models\MultipleImage;
use App\Models\CustomerReview;
use Illuminate\Support\Facades\Log;

class CustomerReviewService
{
    public function getAllCustomerReview(
        $paginatePluckOrGet = null,
        array $relationships = []
    ) {
        $query = CustomerReview::query();
        !empty($relationships) ? $query->with($relationships) : $query->with([]);

        if (is_null($paginatePluckOrGet)) {
            return $query->pluck('id', 'customer_name');
        }

        return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
    }

    public function getACustomerReview($id)
    {
        return CustomerReview::with('multipleImages')->findOrFail($id);
    }

    public function storeCustomerReview($request)
    {
        try {
            $data = $request->validated();
            $data['status'] = 1;
            $review = CustomerReview::create($data);

            if ($request->hasFile('customer_image')) {
                $image = singlePhotoUpload($request->file('customer_image'), 'customer_reviews/images');
                MultipleImage::create([
                    'customer_review_id' => $review->id,
                    'image' => $image,
                    'type' => 'customer_image',
                    'purpose' => 'customer_review'
                ]);
            }

            return $review;
        } catch (\Throwable $exception) {
            Log::error('Error storing customer review', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
        }
    }

    public function updateCustomerReview($request, $id)
    {
        try {
            $review = $this->getACustomerReview($id);
            $data = $request->validated();

            if ($request->hasFile('customer_image')) {
                foreach ($review->multipleImages->where('type', 'customer_image') as $image) {
                    deleteSingleImage($image);
                }

                $uploaded = singlePhotoUpload($request->file('customer_image'), 'customer_reviews/images');

                MultipleImage::create([
                    'customer_review_id' => $review->id,
                    'image' => $uploaded,
                    'type' => 'customer_image',
                    'purpose' => 'customer_review'
                ]);
            }

            $review->update($data);
            return $review;
        } catch (\Throwable $exception) {
            Log::error('Error updating customer review', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
        }
    }

    public function destroyCustomerReview($id)
    {
        $review = $this->getACustomerReview($id);
        if (!$review) return false;

        foreach ($review->multipleImages as $image) {
            deleteSingleImage($image);
        }

        $review->delete();
        return true;
    }
}
