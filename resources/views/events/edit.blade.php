@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1">
        Edit Event
    </div>

    <div class="container-sm text-center">
        <form action="{{ route('events.update', ['id' => $eventDetails->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group m-2">
                <label class="h2" for="title">Title: </label>
                <input class="form-control" type="text" id="title" name="title"
                    value="{{ $eventDetails->event_title }}">
            </div>
            <div class="form-group m-2">
                <label class="h2" for="descr">Description: </label>
                <textarea class="form-control" type="text" id="descr" name="descr">{{ $eventDetails->event_text }}</textarea>
            </div>
            <div class="form-group m-2">
                <label for="date">Date: </label>
                <input class="form-control" type="date" id="date" name="date" value="{{ $eventDetails->date }}">
            </div>
            <div class="form-group m-2">
                <label for="link">Link: </label>
                <input class="form-control" type="text" id="link" name="link" value="{{ $eventDetails->link }}">
            </div>
            <div class="form-group m-2">
                <label for="image">Image: </label>
                <input class="form-control" type="file" id="image" name="image"input>
            </div>
            <input class="rounded" type="submit" value="Save">
        </form>
    </div>
@endsection
