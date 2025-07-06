<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Services\AboutUs\AboutUsService;

class AboutUsController extends Controller
{
public $aboutUsService;

    public function __construct(AboutUsService $aboutUsService)
    {
        $this->aboutUsService = $aboutUsService;
    }

    public function index()
    {
        $data['aboutUs'] = $this->aboutUsService->getAllAboutUs(true, ['multipleImages']);
        return view('admin.about_us.index')->with($data);
    }

    public function create()
    {
        return view('admin.about_us.add');
    }

    public function store(AboutUsRequest $request)
    {
        try {
            $this->aboutUsService->storeAboutUs($request);
            return redirect()->route('admin.about_us.index')->with('success', 'About Us saved successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error storing About Us', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
            return back()->withErrors(['error' => 'Failed to create About Us.']);
        }
    }

    public function edit($id)
    {
        $data['aboutUs'] = $this->aboutUsService->getAAboutUs($id);
        return view('admin.about_us.edit')->with($data);
    }

    public function update(AboutUsRequest $request, $id)
    {
        try {
            $this->aboutUsService->updateAboutUs($request, $id);
            return redirect()->route('admin.about_us.index')->with('success', 'About Us updated successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error updating About Us', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
            return back()->withErrors(['error' => 'Failed to update About Us.']);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->aboutUsService->destroyAboutUs($id);
            if (!$deleted) {
                return back()->withErrors(['error' => 'About Us not found.']);
            }
            return redirect()->route('admin.about_us.index')->with('success', 'About Us deleted successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error deleting About Us', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
            return back()->withErrors(['error' => 'Failed to delete About Us.']);
        }
    }
}
