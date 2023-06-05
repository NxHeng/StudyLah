@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1">
        Edit Event
    </div>

    <div class="container-sm text-center">
        <form action="{{ route('events.update', ['id' => $eventDetails->id]) }}" method="POST">
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
            <input class="rounded" type="submit" value="Save">
        </form>
    </div>
@endsection
