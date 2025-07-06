<?php

namespace App\Services\ServiceSection;

use App\Models\ServiceSection;
use Illuminate\Support\Facades\Log;

class ServiceSectionService
{
    public function getAllServiceSection(
        $paginatePluckOrGet = null,
        array $relationships = []
    ) {
        $query = ServiceSection::query();
        !empty($relationships) ? $query->with($relationships) : $query->with([]);

        if (is_null($paginatePluckOrGet)) {
            return $query->pluck('id', 'title');
        }

        return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
    }

    public function getAServiceSection($id)
    {
        try {
            return ServiceSection::findOrFail($id);
        } catch (\Throwable $exception) {
            Log::error('Error fetching Service Section', [
                'exception' => $exception
            ]);
            throw $exception;
        }
    }

    public function storeServiceSection($request)
    {
        try {
            $data = $request->validated();
            $data['status'] = 1;
            $section = ServiceSection::create($data);

            Log::info("Service Section created\n" . json_encode([
                'data' => $section,
            ], JSON_PRETTY_PRINT));

            return $section;
        } catch (\Throwable $exception) {
            Log::error('Error creating Service Section', [
                'exception' => $exception
            ]);
            throw $exception;
        }
    }

    public function updateServiceSection($request, $id)
    {
        try {
            $section = $this->getAServiceSection($id);
            $updated = $section->update($request->validated());

            Log::info("Service Section updated\n" . json_encode([
                'id' => $id,
                'data' => $request->validated(),
            ], JSON_PRETTY_PRINT));

            return $updated;
        } catch (\Throwable $exception) {
            Log::error('Error updating Service Section', [
                'exception' => $exception
            ]);
            throw $exception;
        }
    }

    public function destroyServiceSection($id)
    {
        try {
            $section = $this->getAServiceSection($id);
            $section->delete();

            Log::info("Service Section deleted\n" . json_encode([
                'id' => $id
            ], JSON_PRETTY_PRINT));

            return true;
        } catch (\Throwable $exception) {
            Log::error('Error deleting Service Section', [
                'exception' => $exception
            ]);
            return false;
        }
    }
}

