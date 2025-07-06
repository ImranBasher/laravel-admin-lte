<?php

namespace App\Services\Blog;

use App\Models\Blog;
use App\Models\MultipleImage;
use Illuminate\Support\Facades\Log;

class BlogService
{
public function getAllBlog($paginatePluckOrGet = null, array $relationships = [])
    {
        $query = Blog::query();
        !empty($relationships) ? $query->with($relationships) : $query->with([]);

        if (is_null($paginatePluckOrGet)) {
            return $query->pluck('id', 'title');
        }

        return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
    }

    public function getABlog($id)
    {
        return Blog::with(['author', 'multipleImages'])->findOrFail($id);
    }

    public function storeBlog($request)
    {
        try {
            $data = $request->validated();
            $blog = Blog::create($data);

            if ($request->hasFile('blog_images')) {

                foreach ($request->file('blog_images') as $file) {
                    $path = singlePhotoUpload($file, 'blog/blog/blog_images');

                    MultipleImage::create([
                        'blog_id' => $blog->id,
                        'image'   => $path,
                        'type'    => 'blog_images',
                        'purpose' => 'blog'
                    ]);
                }
            }

            return $blog;
        } catch (\Throwable $e) {
            Log::error('Error storing blog', ['exception' => $e]);
            throw $e;
        }
    }

    public function updateBlog($request, $id)
    {
        try {
            $blog = $this->getABlog($id);
            $data = $request->validated();
            $blog->update($data);



            if ($request->hasFile('blog_images')) {
                MultipleImage::where('sub_service_category_id', $blog->id)
                    ->where('type', 'blog_images')->delete();

                foreach ($request->file('blog_images') as $file) {
                    $path = singlePhotoUpload($file, 'blog/blog/blog_images');

                    MultipleImage::create([
                        'blog_id' => $blog->id,
                        'image'   => $path,
                        'type'    => 'blog_images',
                        'purpose' => 'blog'
                    ]);
                }
            }

            return $blog;
        } catch (\Throwable $e) {
            Log::error('Error updating blog', ['exception' => $e]);
            throw $e;
        }
    }

    public function destroyBlog($id)
    {
        try {
            $blog = $this->getABlog($id);
            foreach ($blog->multipleImages as $image) {
                deleteSingleImage($image);
            }
            $blog->delete();
            return true;
        } catch (\Throwable $e) {
            Log::error('Error destroying blog', ['exception' => $e]);
            return false;
        }
    }
}

