@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1">
        Profile
    </div>
    <div class="container-sm ">
        <div class="text-start h2 m-2 mt-4 text-info">
            Basic Information
        </div>
        <div class="d-flex justify-content-start">
            <div class="h4 m-2">
                Username:
            </div>
            <div class="h5 m-2">
                {{ $profileDetails->name }}
            </div>
        </div>
        <div class="d-flex justify-content-start">
            <div class="h4 m-2">
                Bio:
            </div>
            <div class="h5 m-2">
                {{ $profileDetails->bio }}
            </div>
        </div>
        <div class="d-flex justify-content-start">
            <div class="h4 m-2">
                Gender:
            </div>
            <div class="h5 m-2">
                {{ $profileDetails->gender }}
            </div>
        </div>
        <div class="d-flex justify-content-start">
            <div class="h4 m-2">
                Date of Birth:
            </div>
            <div class="h5 m-2">
                {{ $profileDetails->dob }}
            </div>
        </div>
        <div class="text-start h2 m-2 mt-4 text-info">
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
        <div class="d-flex justify-content-start">
            <div class="h4 m-2">
                Phone:
            </div>
            <div class="h5 m-2">
                {{ $profileDetails->phone }}
            </div>
        </div>
        <div class="d-flex justify-content-start">
            <div class="h4 m-2">
                Location:
            </div>
            <div class="h5 m-2">
                {{ $profileDetails->location }}
            </div>
        </div>
        <div class="text-start h2 m-2 mt-4 text-info">
            Education
        </div>
        <div class="d-flex justify-content-start">
            <div class="h4 m-2">
                Major:
            </div>
            <div class="h5 m-2">
                {{ $profileDetails->major }}
            </div>
        </div>
        <div class="d-flex justify-content-start">
            <div class="h4 m-2">
                Institute:
            </div>
            <div class="h5 m-2">
                {{ $profileDetails->institute }}
            </div>
        </div>
        <div>
            <button class="rounded btn btn-info btn-lg btn-block ">
                <a href="{{ route('profile.edit', $profileDetails->id) }}" class="text-decoration-none text-white" >Edit</a>
            </button>
        </div>
    </div>
@endsection
