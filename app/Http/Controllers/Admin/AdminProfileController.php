<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;
use App\Services\Profile\ProfileService;
use App\Models\User;

class AdminProfileController extends Controller
{
   protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function edit()
    {
         /** @var User $admin */
        //   $admin = User::find(Auth::id())->load('profile');
        $admin = User::with(['profile','multipleImages'])->find(Auth::id());

        // dd($admin);
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        try {
            $this->profileService->updateProfile($request);

             return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
        } catch (\Throwable $e) {
            report($e);
            return back()->withErrors(['error' => 'Failed to update profile.']);
        }
    }   
}
