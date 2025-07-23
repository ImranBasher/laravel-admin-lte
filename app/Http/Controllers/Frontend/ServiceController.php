<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\CustomerReview;
use App\Models\SubServiceCategory;
use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;

class ServiceController extends Controller
{
        public function showSubService($sub_service_category)
        {
            $data['subService'] = SubServiceCategory::with(['serviceCategory', 'multipleImages', 'fAQs' ])
                ->findOrFail($sub_service_category);

                $data['reviews'] = CustomerReview::with(['multipleImages'])->get();

                $data['relative_services'] = SubServiceCategory::where('service_category_id',$data['subService']->service_category_id)->where('id', '!=', $sub_service_category)->get();

               // return $data;

            return view('frontend.services.sub_service')->with($data);
        }
}
