<?php

namespace App\Http\Controllers\Admin;

use App\Models\MainBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\MainBannerRequest;
use App\Services\MainBanner\MainBannerService;

class MainBannerController extends Controller
{
    public $mainBannerService;

    public function __construct(MainBannerService $mainBannerService)
    {
        $this->mainBannerService = $mainBannerService ;
    }

    public function index()
    {
        $data['banners'] = $this->mainBannerService->getAllMainBanner(true, ['multipleImages'] );
        return view('admin.home_pages.main_banners.index')->with($data);
    }

    public function create()
    {
        return view('admin.home_pages.main_banners.add');
    }
    
    public function store(MainBannerRequest $mainBannerRequest)
    {
        $this->mainBannerService->storeMainBanner($mainBannerRequest);
        return redirect()->route('admin.main_banners.index')->with('success', 'Main Banner saved successfully.');
    }

    public function show($id)
    {
        try{
            $data['banners'] = $this->mainBannerService->getAMainBanner($id);
            return redirect()->back()->with('message', 'Notepad Status Updated');
        }catch(\Throwable $exception){
            Log::error('Error updating General Setting information in service', ['exception' => $exception ]);
           return back()->withErrors(['error' => 'Failed to update of a Note.']);
        }
    }


    public function edit($id)
    {
         $data['mainBanner'] = $this->mainBannerService->getAMainBanner($id);

        return view('admin.home_pages.main_banners.edit')->with($data);
    }


    public function update(MainBannerRequest $mainBannerRequest, $id)
    {
        $data['banners'] = $this->mainBannerService->updateMainBanner($mainBannerRequest, $id);
        return redirect()->route('admin.main_banners.index')->with('success', 'Main Banner Update successfully.');
    }


    public function destroy($id)
    {
        try{
            $deleted = $this->mainBannerService->destroyMainBanner($id);

            if (!$deleted) {
                return back()->withErrors(['error' => 'Main banner not found.']);
            }

            return redirect()->route('admin.main_banners.index')->with('success', 'A Main Banner deleted successfully.');

        }catch(\Throwable $exception){

             Log::error('Error updating Main Banner in service', ['exception' => $exception ]);

            return back()->withErrors(['error' => 'Failed to delete Main Banner.']);
        }
    }





}
