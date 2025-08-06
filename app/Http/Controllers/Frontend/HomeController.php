<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Mail;
use App\Models\Worker;
use App\Models\AboutUs;
use App\Models\WhyChoose;
use App\Models\MainBanner;
use App\Models\Motivation;
use Illuminate\Http\Request;
use App\Models\CustomerReview;
use App\Models\PricingPackage;
use App\Models\ServiceSection;
use App\Models\ServiceCategory;
use App\Models\ScrollingHeading;
use App\Models\SubServiceCategory;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

        $data['main_banners']       = MainBanner::where('status', 1)->with('multipleImages')->get();
        $data['service_section']    = ServiceSection::where('status', 1)->first();
        $data['services_category']  = SubServiceCategory::where('status', 1)->inRandomOrder()->take(3)->get();
        $data['services_category_quantity'] = SubServiceCategory::where('status', 1)
                                                ->whereNotNull('quantity')
                                                ->where('quantity', '>', 0)
                                                ->inRandomOrder()
                                                ->take(3)
                                                ->get();
        $data['motivation'] = Motivation::where('status', 1)->with('multipleImages')->first();
        $data['headings'] = ScrollingHeading::where('status', 'active')
                    ->orderBy('created_at', 'desc')
                    ->get(['id', 'name', 'color', 'background']);
        $data['why_choose'] = WhyChoose::where('status', 1)->with('multipleImages')->first();
        $data['services_category_for_slide']  = SubServiceCategory::where('status', 1)->take(10)->get();
        $data['reviews'] =  CustomerReview::where('status', 1)->with(['multipleImages'])->get();
        $data['blogs'] =  Blog::where('status', 1)->with(['multipleImages'])->get();
        $data['packages'] = PricingPackage::where('status', 1)->get();
        return view('frontend.index')->with($data);
    }



    public function aboutUs(){
        $data['about_us']          = AboutUs::where('status', 1)->with('multipleImages')->first();
        $data['services_category'] = SubServiceCategory::where('status', 1)->inRandomOrder()->take(3)->get();
        $data['categories']        = ServiceCategory::where('status', 1)->with('multipleImages')->inRandomOrder()->take(6)->get();
        $data['workers']           = Worker::where('status', 1)->with('multipleImages')->get();
        $data['reviews']           =  CustomerReview::with(['multipleImages'])->get();

        return view('frontend.about_us')->with($data);
    }


    public function contactUs(){
         return view('frontend.contact_us');
    }


    public function mailStore(Request $request)
    {
        $data = $request->validate([
            'name'    => 'nullable|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            Mail::create($data);
            return back()->with('success', 'Mail send successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error storing mail', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to save mail.']);
        }
    }

    
    public function ourTeam(){
        $data['workers']           = Worker::where('status', 1)->with('multipleImages')->paginate(6);
        return view('frontend.our_team')->with($data);
    }

    
}
