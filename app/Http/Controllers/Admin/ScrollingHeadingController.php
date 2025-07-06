<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScrollingHeadingRequest;
use App\Services\ScrollingHeading\ScrollingHeadingService;

class ScrollingHeadingController extends Controller
{
    protected $scrollingHeadingService;

    public function __construct(ScrollingHeadingService $scrollingHeadingService)
    {
        $this->scrollingHeadingService = $scrollingHeadingService;
    }

    public function index()
    {
        try {
            $data['headings'] = $this->scrollingHeadingService->getAllScrollingHeading(true);
            return view('admin.home_pages.scrolling_headings.index')->with($data);
        } catch (\Throwable $exception) {
            Log::error('Error loading Scrolling Heading index', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to load scrolling headings.']);
        }
    }

    public function create()
    {
        return view('admin.home_pages.scrolling_headings.add');
    }

    public function store(ScrollingHeadingRequest $request)
    {
        try {
            $this->scrollingHeadingService->storeScrollingHeading($request);
            return redirect()->route('admin.scrolling_headings.index')->with('success', 'Scrolling Heading created successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error creating Scrolling Heading', ['exception' => $exception]);
            return back()->withInput()->withErrors(['error' => 'Failed to create scrolling heading.']);
        }
    }

    public function edit($id)
    {
        try {
            $data['scrollingHeading'] = $this->scrollingHeadingService->getAScrollingHeading($id);
            return view('admin.home_pages.scrolling_headings.edit')->with($data);
        } catch (\Throwable $exception) {
            Log::error('Error editing Scrolling Heading', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to load scrolling heading for edit.']);
        }
    }

    public function update(ScrollingHeadingRequest $request, $id)
    {
        try {
            $this->scrollingHeadingService->updateScrollingHeading($request, $id);
            return redirect()->route('admin.scrolling_headings.index')->with('success', 'Scrolling Heading updated successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error updating Scrolling Heading', ['exception' => $exception]);
            return back()->withInput()->withErrors(['error' => 'Failed to update scrolling heading.']);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->scrollingHeadingService->destroyScrollingHeading($id);
            if (!$deleted) {
                return back()->withErrors(['error' => 'Heading not found.']);
            }
            return redirect()->route('admin.scrolling_headings.index')->with('success', 'Heading deleted successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error deleting Scrolling Heading', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to delete heading.']);
        }
    }

}
