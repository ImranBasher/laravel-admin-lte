<?php

namespace App\Services\Worker;

use App\Models\Worker;
use App\Models\MultipleImage;
use Illuminate\Support\Facades\Log;

class WorkerService
{
public function getAllWorker($paginatePluckOrGet = null)
    {
        $query = Worker::query();

        return is_null($paginatePluckOrGet)
            ? $query->pluck('id', 'name')
            : ($paginatePluckOrGet ? $query->paginate(20) : $query->get());
    }

    public function getAWorker($id)
    {
        return Worker::with('multipleImages')->findOrFail($id);
    }

    public function storeWorker($request)
    {
        try {
            $data = $request->validated();
            $data['status'] = 1;
            $worker = Worker::create($data);

            if ($request->hasFile('photo')) {
                $data['photo'] = singlePhotoUpload($request->file('photo'), 'workers/photo');

                MultipleImage::create([
                    'worker_id' => $worker->id,
                    'image'     => $data['photo'],
                    'type'      => 'photo',
                    'purpose'   => 'worker_profile'
                ]);
            }

            return $worker;
        } catch (\Throwable $exception) {
            Log::error('Error storing worker in service', ['exception' => $exception]);
        }
    }

    public function updateWorker($request, $id)
    {
        try {
            $worker = $this->getAWorker($id);
            $data = $request->validated();

            if ($request->hasFile('photo')) {
                foreach ($worker->multipleImages->where('type', 'photo') as $image) {
                    $imagePath = storage_path('app/public/' . $image->image);
                    if (file_exists($imagePath)) {
                        @unlink($imagePath);
                    }
                    $image->delete();
                }

                $data['photo'] = singlePhotoUpload($request->file('photo'), 'workers/photo');

                MultipleImage::create([
                    'worker_id' => $worker->id,
                    'image'     => $data['photo'],
                    'type'      => 'photo',
                    'purpose'   => 'worker_profile'
                ]);
            }

            $worker->update($data);
            return $worker;
        } catch (\Throwable $exception) {
            Log::error('Error updating worker in service', ['exception' => $exception]);
        }
    }

    public function destroyWorker($id)
    {
        $worker = $this->getAWorker($id);

        if (!$worker) return false;

        foreach ($worker->multipleImages as $image) {
            deleteSingleImage($image);
        }

        $worker->delete();
        return true;
    }
}

