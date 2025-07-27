<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $data['blogs'] = Blog::where('status', 1)->with(['multipleImages'])->paginate(6);;
        $data['recentPosts'] = Blog::inRandomOrder()->with(['multipleImages'])->take(3)->get();
        return view('frontend.blog.blog_list')->with($data);
    }

    public function show($id)
    {
    $blog = Blog::with('multipleImages')->findOrFail($id);
    $recentPosts = Blog::inRandomOrder()->with('multipleImages')->take(3)->get();

    return view('frontend.blog.blog_details', compact('blog', 'recentPosts'));
    }



}
