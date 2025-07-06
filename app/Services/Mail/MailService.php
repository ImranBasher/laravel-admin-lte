<?php

namespace App\Services\Mail;

use App\Models\Mail;
use Illuminate\Support\Facades\Log;

class MailService
{
public function getAllMail($paginatePluckOrGet = null, array $relationships = [])
    {
        $query = Mail::query();

        !empty($relationships) ? $query->with($relationships) : $query->with([]);

        if (is_null($paginatePluckOrGet)) {
            return $query->pluck('id', 'subject');
        }

        return $paginatePluckOrGet ? $query->paginate(20) : $query->get();
    }

    public function getAMail($id)
    {
        return Mail::findOrFail($id);
    }

    public function storeMail($request)
    {
        try {
            $data = $request->validated();
            return Mail::create($data);
        } catch (\Throwable $exception) {
            Log::error('Error storing Mail', ['exception' => $exception]);
        }
    }

    public function updateMail($request, $id)
    {
        try {
            $mail = $this->getAMail($id);
            $mail->update($request->validated());
            return $mail;
        } catch (\Throwable $exception) {
            Log::error('Error updating Mail', ['exception' => $exception]);
        }
    }

    public function destroyMail($id)
    {
        $mail = $this->getAMail($id);
        if (!$mail) {
            return false;
        }
        return $mail->delete();
    }
}

