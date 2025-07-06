<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\WhyChooseRequest;
use App\Services\WhyChoose\WhyChooseService;

class WhyChooseController extends Controller
{
protected $whyChooseService;

    public function __construct(WhyChooseService $whyChooseService)
    {
        $this->whyChooseService = $whyChooseService;
    }

    public function index()
    {
        $data['whyChooses'] = $this->whyChooseService->getAllWhyChoose(true, ['multipleImages']);
        return view('admin.home_pages.why_chooses.index')->with($data);
    }

    public function create()
    {
        return view('admin.home_pages.why_chooses.add');
    }

    public function store(WhyChooseRequest $request)
    {
        try {
            $this->whyChooseService->storeWhyChoose($request);
            return redirect()->route('admin.why_chooses.index')->with('success', 'Why Choose section created successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error storing Why Choose section', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to create Why Choose section.']);
        }
    }

    public function edit($id)
    {
        $data['whyChoose'] = $this->whyChooseService->getAWhyChoose($id);
        return view('admin.home_pages.why_chooses.edit')->with($data);
    }

    public function update(WhyChooseRequest $request, $id)
    {
        try {
            $this->whyChooseService->updateWhyChoose($request, $id);
            return redirect()->route('admin.why_chooses.index')->with('success', 'Why Choose section updated successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error updating Why Choose section', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to update Why Choose section.']);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->whyChooseService->destroyWhyChoose($id);
            if (!$deleted) {
                return back()->withErrors(['error' => 'Why Choose not found.']);
            }
            return redirect()->route('admin.why_chooses.index')->with('success', 'Why Choose section deleted successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error deleting Why Choose section', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to delete Why Choose section.']);
        }
    }
}
