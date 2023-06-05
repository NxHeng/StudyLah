@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1">
        Profile
    </div>
    <div class="text-center">
        Username: {{ $profileDetails->name }}
    </div>
    <div class="text-center">
        E-mail: {{ $profileDetails->email }}
    </div>
@endsection
