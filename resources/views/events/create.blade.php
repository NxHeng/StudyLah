@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="container-sm text-left ">
        <div class="row">
            <div class="col">
                <h1 class="text-left">Create Your New Event</h1>
            </div>
        </div>
        <form action="/event" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row m-2 border">
                <label for="title" class="col-sm-2 col-form-label">Event Title:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="title" name="title"
                        placeholder="Give your event a title!"><br>
                </div>
                <label for="descr" class="col-sm-2 col-form-label">Event Description:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" type="text" id="descr" name="descr"
                        placeholder="Tell us what is your event about!"></textarea><br>
                </div>
                <label for="image" class="col-sm-2 col-form-label text-left">Event Image:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="image" name="image"><br>
                </div>
            </div>
            <br>
            <div class="text-center">
                <input type="submit" value="Create Event" class="btn btn-primary" style="background-color: #77b5b3;">
            </div>
        </form>
    </div>
@endsection
