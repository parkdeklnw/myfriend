<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255|unique:profiles',
                'tel' => 'required|max:255',
                'email' => 'required|max:255|email|unique:profiles',
                'detail' => 'required',
            ]
        );

        $profile = new Profile();
        $profile->name = $request->name;
        $profile->tel = $request->tel;
        $profile->email = $request->email;
        $profile->detail = $request->detail;
        $profile->save();

        return redirect()->route('profile.index');
    }
}
