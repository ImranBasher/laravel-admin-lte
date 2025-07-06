<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerReviewRequest;
use App\Services\CustomerReview\CustomerReviewService;

class CustomerReviewController extends Controller
{
public $customerReviewsService;

    public function __construct(CustomerReviewService $customerReviewsService)
    {
        $this->customerReviewsService = $customerReviewsService;
    }

    public function index()
    {
        try {
            $data['reviews'] = $this->customerReviewsService->getAllCustomerReview(true, ['multipleImages']);
            return view('admin.customer_reviews.index')->with($data);
        } catch (\Throwable $exception) {
            Log::error('Error fetching customer reviews', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
            return back()->withErrors(['error' => 'Unable to fetch reviews']);
        }
    }

    public function create()
    {
        return view('admin.customer_reviews.add');
    }

    public function store(CustomerReviewRequest $request)
    {
        try {
            $this->customerReviewsService->storeCustomerReview($request);
            return redirect()->route('admin.customer_reviews.index')->with('success', 'Review created successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error storing customer review', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
            return back()->withErrors(['error' => 'Failed to store review.']);
        }
    }

    public function edit($id)
    {
        try {
            $data['review'] = $this->customerReviewsService->getACustomerReview($id);
            return view('admin.customer_reviews.edit')->with($data);
        } catch (\Throwable $exception) {
            Log::error('Error editing customer review', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
            return back()->withErrors(['error' => 'Failed to load review.']);
        }
    }

    public function update(CustomerReviewRequest $request, $id)
    {
        try {
            $this->customerReviewsService->updateCustomerReview($request, $id);
            return redirect()->route('admin.customer_reviews.index')->with('success', 'Review updated successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error updating customer review', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
            return back()->withErrors(['error' => 'Failed to update review.']);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->customerReviewsService->destroyCustomerReview($id);
            if (!$deleted) {
                return back()->withErrors(['error' => 'Review not found.']);
            }
            return redirect()->route('admin.customer_reviews.index')->with('success', 'Review deleted successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error deleting customer review', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
            return back()->withErrors(['error' => 'Failed to delete review.']);
        }
    }
}
