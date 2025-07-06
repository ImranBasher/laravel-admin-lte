<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\FooterBannerRequest;
use App\Services\FooterBanner\FooterBannerService;

class FooterBannerController extends Controller
{
public $footerBannerService;

    public function __construct(FooterBannerService $footerBannerService)
    {
        $this->footerBannerService = $footerBannerService;
    }

    public function index()
    {
        $data['footerBanners'] = $this->footerBannerService->getAllFooterBanner(true, ['multipleImages']);
        return view('admin.footer.index')->with($data);
    }

    public function create()
    {
        return view('admin.footer.add');
    }

    public function store(FooterBannerRequest $request)
    {
        try {
            $this->footerBannerService->storeFooterBanner($request);
            return redirect()->route('admin.footer_banners.index')->with('success', 'Footer Banner created successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error storing Footer Banner', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
            return back()->withErrors(['error' => 'Failed to store Footer Banner.']);
        }
    }

    public function edit($id)
    {
        $data['footerBanner'] = $this->footerBannerService->getAFooterBanner($id);
        return view('admin.footer.edit')->with($data);
    }

    public function update(FooterBannerRequest $request, $id)
    {
        try {
            $this->footerBannerService->updateFooterBanner($request, $id);
            return redirect()->route('admin.footer_banners.index')->with('success', 'Footer Banner updated successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error updating Footer Banner', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
            return back()->withErrors(['error' => 'Failed to update Footer Banner.']);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->footerBannerService->destroyFooterBanner($id);
            if (!$deleted) {
                return back()->withErrors(['error' => 'Footer Banner not found.']);
            }
            return redirect()->route('admin.footer_banners.index')->with('success', 'Footer Banner deleted successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error deleting Footer Banner', [
                'exception' => json_encode($exception->getMessage(), JSON_PRETTY_PRINT)
            ]);
            return back()->withErrors(['error' => 'Failed to delete Footer Banner.']);
        }
    }
}
