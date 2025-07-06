<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkerRequest;
use App\Services\Worker\WorkerService;

class WorkerController extends Controller
{
public $workerService;

    public function __construct(WorkerService $workerService)
    {
        $this->workerService = $workerService;
    }

    public function index()
    {
        try {
            $data['workers'] = $this->workerService->getAllWorker(true, ['multipleImages']);
            return view('admin.workers.index')->with($data);
        } catch (\Throwable $exception) {
            Log::error('Error fetching workers list', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to fetch workers.']);
        }
    }

    public function create()
    {
        try {
            return view('admin.workers.add');
        } catch (\Throwable $exception) {
            Log::error('Error loading create worker form', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to load create form.']);
        }
    }

    public function store(WorkerRequest $request)
    {
        try {
            $this->workerService->storeWorker($request);
            return redirect()->route('admin.workers.index')->with('success', 'Worker created successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error storing worker', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to create worker.']);
        }
    }

    public function edit($id)
    {
        try {
            $data['worker'] = $this->workerService->getAWorker($id);
            return view('admin.workers.edit')->with($data);
        } catch (\Throwable $exception) {
            Log::error('Error loading edit worker form', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to load edit form.']);
        }
    }

    public function update(WorkerRequest $request, $id)
    {
        try {
            $this->workerService->updateWorker($request, $id);
            return redirect()->route('admin.workers.index')->with('success', 'Worker updated successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error updating worker', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to update worker.']);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->workerService->destroyWorker($id);

            if (!$deleted) {
                return back()->withErrors(['error' => 'Worker not found.']);
            }

            return redirect()->route('admin.workers.index')->with('success', 'Worker deleted successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error deleting worker', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to delete worker.']);
        }
    }
}
