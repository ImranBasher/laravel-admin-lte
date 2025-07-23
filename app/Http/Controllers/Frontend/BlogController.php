<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $data['blogs'] = Blog::where('status', 1)->get();

        return view('frontend.blog.blog_list')->with($data);
    }
}
