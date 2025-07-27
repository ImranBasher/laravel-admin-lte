<?php

namespace App\Http\Controllers\Frontend;

use App\Models\MainBanner;
use App\Models\Motivation;
use Illuminate\Http\Request;
use App\Models\ServiceSection;
use App\Models\ScrollingHeading;
use App\Models\SubServiceCategory;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\WhyChoose;

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


        return view('frontend.index')->with($data);
    }



    public function aboutUs(){
        $data['aboutus'] = AboutUs::where('status', 1)->with('multipleImages')->first();
        return view('frontend.about_us')->with($data);
    }


    
}
