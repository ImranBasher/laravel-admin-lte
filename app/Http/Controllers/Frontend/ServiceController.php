<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\SubServiceCategory;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
        public function showSubService($sub_service_category)
        {
            $subService = SubServiceCategory::with(['serviceCategory', 'multipleImages', 'fAQs' ])
                ->findOrFail($sub_service_category);
            //  return $subService;
            return view('frontend.services.sub_service', compact('subService'));
        }
}
