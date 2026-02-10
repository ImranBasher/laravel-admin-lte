<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// ===========
use App\Models\Blog; // TODO set correct model if different
use App\Models\Comment; // TODO set correct model if different
use App\Models\Product; // TODO set correct model if different
use App\Models\ServiceCategory; // TODO set correct model if different
use App\Models\ServiceSection; // TODO set correct model if different
use App\Models\SubServiceCategory; // TODO set correct model if different
use App\Models\User;
use App\Models\Worker; // TODO set correct model if different
use Illuminate\View\View;
use App\Jobs\GenerateMissingImagesJob;
use Illuminate\Http\RedirectResponse;

// ============
class DashboardController extends Controller
{

    // public function index(){
    //     return view('admin.dashboard.dashboard');
    // }

     public function index(): View
    {
        $serviceCategoryCount = ServiceCategory::count();
        $subServiceCategoryCount = SubServiceCategory::count();
        $serviceSectionCount = ServiceSection::count();
        $blogCount = Blog::count();
        $commentCount = Comment::count();
        $userCount = User::count();
        $productCount = Product::count();
        $workerCount = Worker::count();

        $recentBlogs = Blog::latest()->take(5)->get();
        $recentComments = Comment::latest()->take(5)->get();

        return view('admin.dashboard.dashboard', compact(
            'serviceCategoryCount',
            'subServiceCategoryCount',
            'serviceSectionCount',
            'blogCount',
            'commentCount',
            'userCount',
            'productCount',
            'workerCount',
            'recentBlogs',
            'recentComments'
        ));
    }

    public function generateMissingImages(): RedirectResponse
    {
        GenerateMissingImagesJob::dispatch();

        return back()->with('status', 'Image generation job queued.');
    }
   
}
