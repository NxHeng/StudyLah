@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1">
        Add Event
    </div>

    <div class="container-sm text-center">
        <form action="/event" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group m-2">
                <label for="title">Event Title: </label>
                <input class="form-control" type="text" id="title" name="title">
            </div>
            <div class="form-group m-2">
                <label for="descr">Event Description: </label>
                <textarea class="form-control" type="text" id="descr" name="descr"></textarea>
            </div>
            <div>
                <label for="descr">Event Date: </label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div>
                <label for="descr">Event Profile Link: </label>
                <textarea class="form-control" type="text" id="link" name="link"></textarea>
            </div>
            <div class="form-group m-2">
                <label for="image">Event Image: </label>
                <input class="form-control" type="file" id="image" name="image"input>
            </div>
            
            <div>

            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection
