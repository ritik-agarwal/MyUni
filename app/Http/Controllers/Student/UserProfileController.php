<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('student.user-profile');
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
        ]);

        auth()->guard('student')->user()->update([
            'first_name' => $request->get('firstname'),
            'last_name' => $request->get('lastname'),
        ]);
        return back()->with('succes', 'Profile succesfully updated');
    }
}
