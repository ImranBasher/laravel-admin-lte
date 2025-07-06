<?php

namespace App\Services\Author;

use App\Models\Author;
use App\Models\MultipleImage;
use Illuminate\Support\Facades\Log;

class AuthorService
{
public function getAllAuthor($paginatePluckOrGet = null, array $relationships = [])
    {
        $query = Author::query();
        !empty($relationships) ? $query->with($relationships) : $query->with([]);

        if (is_null($paginatePluckOrGet)) {
            return $query->pluck('id', 'name');
        }

        return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
    }

    public function getAAuthor($id)
    {
        return Author::with('multipleImages')->findOrFail($id);
    }

    public function storeAuthor($request)
    {
        try {
            $data   = $request->validated();
            $author = Author::create($data);

            if ($request->hasFile('author_photos')) {
                foreach ($request->file('author_photos') as $file) {
                    $path = singlePhotoUpload($file, 'blog/author/author_photos');

                    MultipleImage::create([
                        'author_id' => $author->id,
                        'image'     => $path,
                        'type'      => 'author_photos',
                        'purpose'   => 'author'
                    ]);
                }
            }
            return $author;

        } catch (\Throwable $e) {
            Log::error('Error storing author', ['exception' => $e]);
            throw $e;
        }
    }

    public function updateAuthor($request, $id)
    {
        try {
            $author = $this->getAAuthor($id);
            $data = $request->validated();
            


            if ($request->hasFile('author_photos')) {
                MultipleImage::where('author_id', $author->id)
                    ->where('type', 'author_photos')->delete();

                foreach ($request->file('author_photos') as $file) {
                    $path = singlePhotoUpload($file, 'blog/author/author_photos');

                    MultipleImage::create([
                        'author_id' => $author->id,
                        'image'     => $path,
                        'type'      => 'author_photos',
                        'purpose'   => 'author'
                    ]);
                }
            }

            $author->update($data);
            return $author;
        } catch (\Throwable $e) {
            Log::error('Error updating author', ['exception' => $e]);
            throw $e;
        }
    }

    public function destroyAuthor($id)
    {
        $author = $this->getAAuthor($id);

        if (!$author) return false;

        foreach ($author->multipleImages as $image) {
            deleteSingleImage($image);
        }

        $author->delete();
        return true;
    }
}

