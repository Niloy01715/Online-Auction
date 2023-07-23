<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Intervention\Image\Facades\Image as Image;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // return view('profile.edit', [
        //     'user' => $request->user(),
        // ]);
        return view('backend.profile.index',[
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        //  $this->image_upload($request,$product->id);
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // public function image_upload($request,$user_id)
    // {
    //     if($request->hasFile('profile_image'))
    //     {
    //         $user = User::find($user_id);
    //         //check if already exists previous image
    //         if($user->image != null){
    //             // delete old photo
    //             $old_photo_path = 'public/uploads/user/'.$user->profile_image;
    //             unlink(base_path($old_photo_path));
    //         }

    //         $photo_location = 'public/uploads/user/';
    //         $uploaded_photo = $request->file('profile_image');
    //         $new_photo_name = $user_id.'.'.$uploaded_photo->getClientOriginalExtension(); // 1.jpg
    //         $new_photo_location = $photo_location.$new_photo_name; //public/uploads/profile_images/1.jpg
    //         //Save Image
    //         Image::make($uploaded_photo)->resize(600,600)->save(base_path($new_photo_location));
    //         $user->update([
    //             'profile_image' => $new_photo_name,
    //         ]);
    //     }
    // }
}
