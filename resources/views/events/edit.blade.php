@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}

    <div class="container-sm text-left ">
        <div class="row">
            <div class="col">
                <h1 class="text-left">Edit Your Event</h1>
            </div>
        </div>
        <form action="{{ route('events.update', ['id' => $eventDetails->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group m-2">
                <label class="h2" for="title">Title: </label>
                <input class="form-control" type="text" id="title" name="title"
                    value="{{ $eventDetails->event_title }}">
            </div>
            <label for="descr" class="col-sm-2 mt-3 col-form-label">Event Description:</label>
            <div class="col-sm-10 mt-3">
                <textarea class="form-control" type="text" id="descr" name="descr">{{ $eventDetails->event_text }}</textarea>
            </div> <br>
            <label for="image" class="col-sm-2 mt-3 col-form-label text-left">Event Image:</label>
            <div class="col-sm-10 mt-3">
                <input class="form-control" type="file" id="image" name="image"><br>
            </div>
            <div class="text-center mt-3">
                <input type="submit" value="Update Event" class="btn btn-primary" style="background-color: #77b5b3;">
            </div>
            <div class="col-sm-10 mt-2">
            </div>
        </form>
    </div>
@endsection
