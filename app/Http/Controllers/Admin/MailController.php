<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
use App\Services\Mail\MailService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
protected $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    public function index()
    {
        try {
            $data['mails'] = $this->mailService->getAllMail(true);

            return view('admin.mails.index', $data);
        } catch (\Throwable $exception) {
            Log::error('Error fetching mail list', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to load mails.']);
        }
    }

    public function create()
    {
        try {
            return view('admin.mails.add');
        } catch (\Throwable $exception) {
            Log::error('Error opening mail create page', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to open create form.']);
        }
    }

    public function store(MailRequest $request)
    {
        try {
            $this->mailService->storeMail($request);
            return redirect()->route('admin.send_mails.index')->with('success', 'Mail saved successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error storing mail', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to save mail.']);
        }
    }

    public function edit($id)
    {
        try {
            $data['mail'] = $this->mailService->getAMail($id);
            return view('admin.mails.edit', $data);
        } catch (\Throwable $exception) {
            Log::error('Error loading mail edit form', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to load mail edit form.']);
        }
    }

    public function update(MailRequest $request, $id)
    {
        try {
            $this->mailService->updateMail($request, $id);
            return redirect()->route('admin.send_mails.index')->with('success', 'Mail updated successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error updating mail', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to update mail.']);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->mailService->destroyMail($id);

            if (!$deleted) {
                return back()->withErrors(['error' => 'Mail not found.']);
            }

            return redirect()->route('admin.send_mails.index')->with('success', 'Mail deleted successfully.');
        } catch (\Throwable $exception) {
            Log::error('Error deleting mail', ['exception' => $exception]);
            return back()->withErrors(['error' => 'Failed to delete mail.']);
        }
    }

    public function getAMail($id)
    {
        $mail = Mail::findOrFail($id);
        
        if (!$mail->read_data) {
            $mail->update(['read_data' => 1]);
        }

        return $mail;
    }


        public function markAsRead($id)
        {
            $mail = Mail::findOrFail($id);
            $mail->read_data = 1;
            $mail->save();

            return response()->json(['success' => true]);
        }

}
