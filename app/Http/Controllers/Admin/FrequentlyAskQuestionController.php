<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\FrequentlyAskQuestionRequest;
use App\Models\SubServiceCategory;
use App\Services\FrequentlyAskQuestion\FrequentlyAskQuestionService;

class FrequentlyAskQuestionController extends Controller
{
public $faqService;

    public function __construct(FrequentlyAskQuestionService $faqService)
    {
        $this->faqService = $faqService;
    }

    public function index()
    {
        try {
            $data['faqs'] = $this->faqService->getAllFAQ(true, ['subServiceCategory']);
            return view('admin.sub_service_category_faq.index')->with($data);
        } catch (\Throwable $exception) {
            Log::error('Error fetching FAQ list', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Unable to load FAQ list.']);
        }
    }

    public function create()
    {
        $data['subServiceCategories'] = SubServiceCategory::get();

       
        return view('admin.sub_service_category_faq.add')->with($data);
    }

    public function store(FrequentlyAskQuestionRequest $request)
    {
        try {
            $this->faqService->storeFAQ($request);
            return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error storing FAQ', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to create FAQ.']);
        }
    }

    public function edit($id)
    {
        try {
            $data['faq'] = $this->faqService->getAFAQ($id);
            return view('admin.sub_service_category_faq.edit')->with($data);
        } catch (\Throwable $exception) {
            Log::error('Error fetching FAQ for edit', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Unable to load FAQ for editing.']);
        }
    }

    public function update(FrequentlyAskQuestionRequest $request, $id)
    {
        try {
            $this->faqService->updateFAQ($request, $id);
            return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error updating FAQ', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to update FAQ.']);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->faqService->destroyFAQ($id);

            if (!$deleted) {
                return back()->withErrors(['error' => 'FAQ not found.']);
            }

            return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error deleting FAQ', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to delete FAQ.']);
        }
    }
}
