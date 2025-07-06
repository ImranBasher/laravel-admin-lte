<?php

namespace App\Services\Comment;

use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class CommentService
{
public function getAllComment($paginatePluckOrGet = null, array $relationships = [])
    {
        $query = Comment::query();

        !empty($relationships) ? $query->with($relationships) : $query->with([]);

        if (is_null($paginatePluckOrGet)) {
            return $query->pluck('id', 'message');
        }

        return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
    }

    public function getAComment($id)
    {
        return Comment::findOrFail($id);
    }

    public function storeComment($request)
    {
        try {
            
            return Comment::create($request->validated());
        } catch (\Throwable $e) {
            Log::error('Error storing comment', ['exception' => $e]);
            throw $e;
        }
    }

    public function updateComment($request, $id)
    {
        try {
            $comment = $this->getAComment($id);
            $comment->update($request->validated());
            return $comment;
        } catch (\Throwable $e) {
            Log::error('Error updating comment', ['exception' => $e]);
            throw $e;
        }
    }

    public function destroyComment($id)
    {
        $comment = Comment::find($id);
        if (!$comment) return false;
        return $comment->delete();
    }
}

