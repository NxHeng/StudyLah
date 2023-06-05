@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1">
        Add Event
    </div>

    <div class="container-sm text-center">
        <form action="/event" method="POST">
            @csrf
            <div class="form-group m-2">
                <label for="title">Event Title: </label>
                <input class="form-control" type="text" id="title" name="title">
            </div>
            <div class="form-group m-2">
                <label for="descr">Event Description: </label>
                <textarea class="form-control" type="text" id="descr" name="descr"></textarea>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection
