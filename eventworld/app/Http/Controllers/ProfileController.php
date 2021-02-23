<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

use App\Http\Requests\ChangePasssword;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = auth()->user();
        return view('profile.show', ['user' => $user]);
    }

    public function edit(Request $request)
    {

        $user = auth()->user();
        return view('profile.edit', ['user' => $user]);
    }

    public function password(Request $request)
    {
        $user = auth()->user();
        return view('profile.password', ['user' => $user]);
    }

    public function updatePassword(ChangePasssword $request)
    {

        $user = auth()->user();

        if ($request->newpassword1 != $request->newpassword2) {
            return back();
        }

        $user->update(['password' => bcrypt($request->newpassword1)]);
        session()->flash('success', 'Your password has been changed successfully.');
        return redirect('/profile');
    }

    public function updateProfilePhoto(Request $request)
    {
        $this->validate($request, ['image' => ['required', 'image', 'mimes:jpg,png,jpeg']]);

        //delete old image
        if (auth()->user()->profile_image) {
            @unlink(public_path() . "/assets/img/users/" . auth()->user()->profile_image);
        }

        $image = $request->file('image');
        $extension = $image->extension();
        $newName = base64_encode(microtime()) . "." . $extension;
        $image->move(public_path() .  "/assets/img/users/", $newName);

        auth()->user()->update(['profile_image' => $newName]);

        return response()->json(['url' => '/assets/img/users/' . $newName]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ]);

        $user->update($request->all());

        return redirect('/profile');
    }
}
