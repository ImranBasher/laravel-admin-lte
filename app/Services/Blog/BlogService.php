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


            $imageFields = [
                'blog_images'                    => 'blogs/blog_images',
                'blog_description_1_images'      => 'blogs/description_1_images',
                'blog_description_3_images'      => 'blogs/description_3_images',
                'blog_description_2_images'      => 'blogs/description_2_images',
                'blog_description_4_images'      => 'blogs/description_4_images',
                'blog_description_5_images'      => 'blogs/description_5_images',
                'blog_description_6_images'      => 'blogs/description_6_images',
                'blog_description_7_images'      => 'blogs/description_7_images',
            ];



                foreach ($imageFields as $field => $directory) {
                    if ($request->hasFile($field)) {
                        foreach ($request->file($field) as $file) {
                            $path = singlePhotoUpload($file, $directory);

                            MultipleImage::create([
                                'blog_id' => $blog->id,
                                'image'   => $path,
                                'type'    => $field,
                                'purpose' => $field
                            ]);
                        }
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


            $imageFields = [
                'blog_images'                    => 'blogs/blog_images',
                'blog_description_1_images'      => 'blogs/description_1_images',
                'blog_description_3_images'      => 'blogs/description_3_images',
                'blog_description_2_images'      => 'blogs/description_2_images',
                'blog_description_4_images'      => 'blogs/description_4_images',
                'blog_description_5_images'      => 'blogs/description_5_images',
                'blog_description_6_images'      => 'blogs/description_6_images',
                'blog_description_7_images'      => 'blogs/description_7_images',
            ];



            foreach ($imageFields as $field => $directory) {
                if ($request->hasFile($field)) {
                    // 🧹 Step 1: Delete old images of this field
                    $oldImages = MultipleImage::where('blog_id', $blog->id)
                                    ->where('type', $field)
                                    ->where('purpose', $field)
                                    ->get();

                    foreach ($oldImages as $oldImage) {
                        deleteSingleImage($oldImage); 
                    }

                    // 📤 Step 2: Upload new images
                    foreach ($request->file($field) as $file) {
                        $path = singlePhotoUpload($file, $directory);

                        MultipleImage::create([
                            'blog_id' => $blog->id,
                            'image'   => $path,
                            'type'    => $field,
                            'purpose' => $field, 
                        ]);
                    }
                }
            }



            return $blog;
        } catch (\Throwable $e) {
            Log::error('Error updating blog', ['exception' => $e]);
            throw $e;
        }
    }

    public function deleteImageById($id)
    {
        try {
            $image = MultipleImage::findOrFail($id);

            // Use your helper function
            deleteSingleImage($image);

            return response()->json(['message' => 'Image deleted successfully.']);
        } catch (\Exception $e) {
            Log::error('Error deleting blog image', ['exception' => $e]);

            return response()->json(['message' => 'Failed to delete image.'], 500);
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

