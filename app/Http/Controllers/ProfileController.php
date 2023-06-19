<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile.index');
    }

    public function show($id)
    {
        $profileDetails = ModelsUser::find($id);

        return view('profile.show', ['profileDetails' => $profileDetails]);
    }

    public function edit($id)
    {
        $profileDetails = ModelsUser::findOrFail($id);
        return view('profile.edit', ['profileDetails' => $profileDetails]);
    }

    public function update(Request $request, $id)
    {
        $user = ModelsUser::findOrFail($id);

        $user->name = $request->input('name');
        // $user->event_text = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->location = $request->input('location');
        $user->phone = $request->input('phone');
        $user->institute = $request->input('institute');
        $user->major = $request->input('major');
        $user->bio = $request->input('bio');
        // $user->event_text = $request->input('pfp');

        $user->save();

        return redirect()->route('profile.show', ['id' => $id]);
    }

    public function updateDuration(Request $request)
    {
        $duration = $request->input('duration');

        // Update the study duration in the users table
        $user = ModelsUser::findOrFail(Auth::user()->id);
        $user->study_duration += $duration;

        $user->save();

        // You can return a response if needed
        return response()->json(['message' => 'Study duration updated successfully']);
    }

    public function lastLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = ModelsUser::findOrFail(auth()->user()->id);
            $user->last_login_at = Carbon::now();
            $user->save();

            // Redirect the user to the intended destination or home page
            return redirect()->intended('/home');
        }

        // Authentication failed, redirect back with error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
