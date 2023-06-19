@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1">
        Edit Profile
    </div>
    <div class="container">
    <form action="{{ route('profile.update', ['id' => $profileDetails->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="text-start h2 m-2 mt-4 text-info">
            Basic Information
        </div>
        <div class="form-group row mx-2">
            <label class="h4 col-md-2 py-3 text-md-end" for="name">Username:</label>
            <div class="col-md-10">
                <input class="form-control h4" type="text" id="name" name="name" value="{{ $profileDetails->name }}">
            </div>
        </div>
        <div class="form-group row m-2">
            <label class="h4 col-md-2 py-3 text-md-end" for="bio">Bio:</label>
            <div class="col-md-10">
                <textarea class="form-control h5" type="text" id="bio" name="bio">{{ $profileDetails->bio }}</textarea>
            </div>
        </div>
        <div class="form-group row m-2">
            <label class="h4 col-md-2 py-3 text-md-end" for="gender">Gender:</label>
            <div class="col-md-10">
                <select class="form-control h5" id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                </select>
            </div>
        </div>
        <div class="form-group row m-2">
            <label class="h4 col-md-2 py-3 text-md-end" for="dob">Date of Birth:</label>
            <div class="col-md-10">
                <input class="form-control h5" type="date" id="dob" name="dob" value="">
            </div>
        </div>
        <div class="text-start h2 m-2 mt-4 text-info">
            Contact
        </div>
        <div class="form-group row m-2">
            <label class="h4 col-md-2 py-3 text-md-end" for="email">E-mail:</label>
            <div class="col-md-10">
                <div class="h5 py-3">{{ $profileDetails->email }}</div>
            </div>
        </div>
        <div class="form-group row m-2">
            <label class="h4 col-md-2 py-3 text-md-end" for="phone">Phone:</label>
            <div class="col-md-10">
                <input class="form-control h5" type="text" id="phone" name="phone" value="{{ $profileDetails->phone }}">
            </div>
        </div>
        <div class="form-group row m-2">
            <label class="h4 col-md-2 py-3 text-md-end" for="location">Location:</label>
            <div class="col-md-10">
                <input class="form-control h5" type="text" id="location" name="location" value="{{ $profileDetails->location }}">
            </div>
        </div>
        <div class="text-start h2 m-2 mt-4 text-info">
            Education
        </div>
        <div class="form-group row m-2">
            <label class="h4 col-md-2 py-3 text-md-end" for="major">Major:</label>
            <div class="col-md-10">
                <input class="form-control h5" type="text" id="major" name="major" value="{{ $profileDetails->major }}">
            </div>
        </div>
        <div class="form-group row m-2">
            <label class="h4 col-md-2 py-3 text-md-end" for="institute">Institute:</label>
            <div class="col-md-10">
                <input class="form-control h5" type="text" id="institute" name="institute" value="{{ $profileDetails->institute }}">
            </div>
        </div>
        <div class="text-center">
            <input class="rounded btn btn-info btn-lg btn-block text-white" type="submit" value="Save">
        </div>
    </form>
</div>
@endsection
