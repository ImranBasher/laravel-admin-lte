<?php

namespace App\Services\FrequentlyAskQuestion;

use Illuminate\Support\Facades\Log;
use App\Models\FrequentlyAskQuestion;

class FrequentlyAskQuestionService
{
        public function getAllFAQ(
            $paginatePluckOrGet = null,
            array $relationships = []
        )
        {
            $query = FrequentlyAskQuestion::query();
            !empty($relationships) ? $query->with($relationships) : $query->with([]);

            if(is_null($paginatePluckOrGet)){
                return $query->pluck('id','question');
            }

            return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
        }






    public function getAFAQ($id)
    {
        try {
            return FrequentlyAskQuestion::with('subServiceCategory')->findOrFail($id);
        } catch (\Throwable $exception) {
            Log::error('Error fetching a FAQ', ['exception' => $exception]);
        }
    }

    public function storeFAQ($request)
    {
        try {
            $data = $request->validated();
            $data['status'] = 1;
            return FrequentlyAskQuestion::create($data);
        } catch (\Throwable $exception) {
            Log::error('Error storing FAQ', ['exception' => $exception]);
        }
    }

    public function updateFAQ($request, $id)
    {
        try {
            $faq = $this->getAFAQ($id);
            $faq->update($request->validated());
            return $faq;
        } catch (\Throwable $exception) {
            Log::error('Error updating FAQ', ['exception' => $exception]);
        }
    }

    public function destroyFAQ($id)
    {
        try {
            $faq = $this->getAFAQ($id);
            if (!$faq) {
                return false;
            }
            return $faq->delete();
        } catch (\Throwable $exception) {
            Log::error('Error deleting FAQ', ['exception' => $exception]);
            return false;
        }
    }
}

