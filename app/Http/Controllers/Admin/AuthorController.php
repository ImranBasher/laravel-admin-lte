<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Services\Author\AuthorService;

class AuthorController extends Controller
{
protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        $data['authors'] = $this->authorService->getAllAuthor(true, ['multipleImages']);
        return view('admin.blogs.authors.index', $data);
    }

    public function create()
    {
        return view('admin.blogs.authors.add');
    }

    public function store(AuthorRequest $request)
    {
        try {
            $this->authorService->storeAuthor($request);
            return redirect()->route('admin.authors.index')->with('success', 'Author created successfully.');
        } catch (\Throwable $e) {
            Log::error('Error storing author', ['exception' => $e]);
            return back()->withErrors(['error' => 'Failed to store author.']);
        }
    }

    public function edit($id)
    {
        $data['author'] = $this->authorService->getAAuthor($id);
        return view('admin.blogs.authors.edit', $data);
    }

    public function update(AuthorRequest $request, $id)
    {
        try {
            $this->authorService->updateAuthor($request, $id);
            return redirect()->route('admin.authors.index')->with('success', 'Author updated successfully.');
        } catch (\Throwable $e) {
            Log::error('Error updating author', ['exception' => $e]);
            return back()->withErrors(['error' => 'Failed to update author.']);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->authorService->destroyAuthor($id);
            if (!$deleted) {
                return back()->withErrors(['error' => 'Author not found.']);
            }
            return redirect()->route('admin.authors.index')->with('success', 'Author deleted successfully.');
        } catch (\Throwable $e) {
            Log::error('Error deleting author', ['exception' => $e]);
            return back()->withErrors(['error' => 'Failed to delete author.']);
        }
    }
}
