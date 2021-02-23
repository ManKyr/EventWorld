<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.index', compact('users'));
    }


    public function update(Request $request, $id)
    {
        $users = User::find($id);

        $users->firstname = request('firstname');
        $users->lastname = request('lastname');
        $users->city = request('city');
        $users->phone = request('phone');
        $users->email = request('email');
        $users->save();
        return response()->json(['success' => true]);
    }


    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('admin');
    }
}
