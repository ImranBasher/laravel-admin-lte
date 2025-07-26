<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Services\Blog\BlogService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        $data['blogs'] = $this->blogService->getAllBlog(true, ['author', 'multipleImages']);
        return view('admin.blogs.blog.index', $data);
    }

    public function create()
    {
        // $data['authors'] = getAuthors();
        return view('admin.blogs.blog.add');
    }

    public function store(BlogRequest $request)
    {
        try {
            $this->blogService->storeBlog($request);
            return redirect()->route('admin.blogs.index')->with('success', 'Blog saved successfully.');
        } catch (\Throwable $e) {
            Log::error('Error saving blog', ['exception' => $e]);
            return back()->withErrors(['error' => 'Failed to save blog.']);
        }
    }

    public function edit($id)
    {
        $data['blog'] = $this->blogService->getABlog($id);
        // $data['authors'] = getAuthors();
        return view('admin.blogs.blog.edit', $data);
    }

    public function update(BlogRequest $request, $id)
    {
        try {
            $this->blogService->updateBlog($request, $id);
            return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
        } catch (\Throwable $e) {
            Log::error('Error updating blog', ['exception' => $e]);
            return back()->withErrors(['error' => 'Failed to update blog.']);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->blogService->destroyBlog($id);
            if (!$deleted) {
                return back()->withErrors(['error' => 'Blog not found.']);
            }
            return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
        } catch (\Throwable $e) {
            Log::error('Error deleting blog', ['exception' => $e]);
            return back()->withErrors(['error' => 'Failed to delete blog.']);
        }
    }

    public function deleteImage($id, BlogService $blogService)
    {
        try {
            DB::beginTransaction();
            $blogService->deleteImageById($id);
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Image deleted successfully.'
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => 'Failed to delete image.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
