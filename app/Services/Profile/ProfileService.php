<?php

namespace App\Services\Profile;

use Illuminate\Support\Str;
use App\Models\MultipleImage;
use App\Models\Profile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileService
{
    public function updateProfile($request)
    {
        try {
            $admin = Auth::user();
            $data = $request->validated();

            // Update admin name
            $admin->name = $data['name'];
            $admin->save();


            $profile = Profile::where('user_id',$admin->id)->first();

            if($profile){
                $profile->profession = $data['profession'] ?? null;
                $profile->phone      = $data['phone'] ?? null;
                $profile->bio        = $data['bio'] ?? null;
                $profile->save();
            }else{
                Profile::create([
                $profile->user_id =>  $admin->id,
                $profile->profession => $data['profession'] ?? null,
                $profile->phone      => $data['phone'] ?? null,
                $profile->bio        => $data['bio'] ?? null,
                ]);
            }

            // Handle profile image
            if ($request->hasFile('image')) {
                MultipleImage::where('user_id', $admin->id)
                    ->where('type', 'profile_image')
                    ->delete();

                $imagePath = singlePhotoUpload($request->file('image'), 'admin/profile/images');

                MultipleImage::create([
                    'user_id' => $admin->id,
                    'image'    => $imagePath,
                    'type'     => 'profile_image',
                    'purpose'  => 'admin_profile'
                ]);
            }

            return true;
        } catch (\Throwable $e) {
            Log::error('Error updating profile', ['exception' => $e]);
            throw $e;
        }
    }
}
