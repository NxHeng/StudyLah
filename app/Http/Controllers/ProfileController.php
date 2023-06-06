<?php

namespace App\Http\Controllers;

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
}
// $table->id();
// $table->string('name');
// $table->string('email')->unique();
// $table->timestamp('email_verified_at')->nullable();
// $table->string('password');
// $table->rememberToken();
// $table->timestamps();
// $table->timestamp('dob')->nullable();
// $table->string('gender')->nullable();
// $table->string('location')->nullable();
// $table->string('phone')->nullable();
// $table->string('institute')->nullable();
// $table->string('major')->nullable();
// $table->string('bio')->nullable();
// $table->string('pfp')->nullable();