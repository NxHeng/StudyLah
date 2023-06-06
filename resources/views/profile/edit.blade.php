@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1">
        Edit Profile
    </div>
    <div class="container-sm">
        <form action="{{ route('profile.update', ['id' => $profileDetails->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="text-start h2 m-2 mt-4">
                Basic Information
            </div>
            <div class="form-group m-2 d-flex justify-content-start">
                <label class="h4 py-3" for="name">Username: </label>
                <input class="form-control h5 m-2" type="text" id="name" name="name"
                    value="{{ $profileDetails->name }}">
            </div>
            <div class="form-group m-2 d-flex justify-content-start">
                <label class="h4 py-3" for="bio">Bio: </label>
                <textarea class="form-control h5 m-2" type="text" id="bio" name="bio">{{ $profileDetails->bio }}</textarea>
            </div>
            <div class="form-group m-2 d-flex justify-content-start">
                <label class="h4 py-3" for="name">Gender: </label>
                <select class="form-control h5 m-2" id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                </select>
            </div>
            <div class="form-group m-2 d-flex justify-content-start">
                <label class="h4 py-3" for="dob">Date of Birth: </label>
                <input class="form-control h5 m-2" type="date" id="dob" name="dob" value="">
            </div>
            <div class="text-start h2 m-2 mt-4">
                Contact
            </div>
            <div class="d-flex justify-content-start">
                <div class="h4 m-2">
                    E-mail:
                </div>
                <div class="h5 m-2">
                    {{ $profileDetails->email }}
                </div>
            </div>
            <div class="form-group m-2 d-flex justify-content-start">
                <label class="h4 py-3" for="phone">Phone: </label>
                <input class="form-control h5 m-2" type="text" id="phone" name="phone"
                    value="{{ $profileDetails->phone }}">
            </div>
            <div class="form-group m-2 d-flex justify-content-start">
                <label class="h4 py-3" for="location">Location: </label>
                <input class="form-control h5 m-2" type="text" id="location" name="location"
                    value="{{ $profileDetails->location }}">
            </div>
            <div class="text-start h2 m-2 mt-4">
                Education
            </div>
            <div class="form-group m-2 d-flex justify-content-start">
                <label class="h4 py-3" for="major">Major: </label>
                <input class="form-control h5 m-2" type="text" id="major" name="major"
                    value="{{ $profileDetails->major }}">
            </div>
            <div class="form-group m-2 d-flex justify-content-start">
                <label class="h4 py-3" for="institute">Institute: </label>
                <input class="form-control h5 m-2" type="text" id="institute" name="institute"
                    value="{{ $profileDetails->institute }}">
            </div>
            <div class="text-center">
                <input class="rounded" type="submit" value="Save">
            </div>
        </form>
    </div>
@endsection
