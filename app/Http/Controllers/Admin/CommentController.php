<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Services\Comment\CommentService;

class CommentController extends Controller
{
protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index()
    {
        $data['comments'] = $this->commentService->getAllComment(true);
        return view('admin.comments.index')->with($data);
    }

    public function create()
    {
        return view('admin.comments.add');
    }

    public function store(CommentRequest $request)
    {
        try {
            $this->commentService->storeComment($request);
            return redirect()->route('admin.comments.index')->with('success', 'Comment saved successfully.');
        } catch (\Throwable $e) {
            Log::error('Error storing comment', ['exception' => $e]);
            return back()->withErrors(['error' => 'Failed to store comment.']);
        }
    }

    public function edit($id)
    {
        $data['comment'] = $this->commentService->getAComment($id);
        return view('admin.comments.edit')->with($data);
    }

    public function update(CommentRequest $request, $id)
    {
        try {
            $this->commentService->updateComment($request, $id);
            return redirect()->route('admin.comments.index')->with('success', 'Comment updated successfully.');
        } catch (\Throwable $e) {
            Log::error('Error updating comment', ['exception' => $e]);
            return back()->withErrors(['error' => 'Failed to update comment.']);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->commentService->destroyComment($id);
            if (!$deleted) {
                return back()->withErrors(['error' => 'Comment not found.']);
            }
            return redirect()->route('admin.comments.index')->with('success', 'Comment deleted successfully.');
        } catch (\Throwable $e) {
            Log::error('Error deleting comment', ['exception' => $e]);
            return back()->withErrors(['error' => 'Failed to delete comment.']);
        }
    }
}
