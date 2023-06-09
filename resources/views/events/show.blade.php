@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="container-sm text-left border rounded p-3 shadow-sm">
        <div class="container-sm text-left">
            <div class="h2">
                Event Title
            </div>
            <div class="h5 p-3 border rounded">
                {{ $eventDetails->event_title }}
            </div>
            <div class="h2">
                Event Description
            </div>
            <div class="h5 p-3 border rounded">
                {{ $eventDetails->event_text }}
            </div>
            <div class="h2">
                Event Date
            </div>
            <div class="h5 p-3 border rounded">
                {{ $eventDetails->date }}
            </div>
            <div class="h2">
                Event Link
            </div>
            <div class="h5 p-3 border rounded">
                <a href="{{ $eventDetails->link }}">{{ $eventDetails->link }}</a> <br>
            </div>
            <div class="h2">
                Event Poster or Related Image
            </div>
            <div class="text-center m-2">
                <img class="img-thumbnail w-50" src="{{ asset('/storage/images/events/' . $eventDetails->event_image) }}"
                    alt="event image">
            </div>

            <div style="text-align: center" ;>
                <a href="{{ route('events.edit', ['id' => $eventDetails->id]) }}"
                    style="color: black; text-decoration: none";>
                    <button class="button2">
                        Edit
                    </button>
                </a>
            </div>
            <div class="m-2" style="text-align: center";>
                <div class="d-flex justify-content-center mt-4">
                    {{-- <button class="button rounded">
                        <a href="{{ route('events.edit', ['id' => $eventDetails->id]) }}">Edit</a>
                    </button> --}}
                    <form action="/event/{{ $eventDetails->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="button2 bg-danger" type="submit" value="Delete Event">
                    </form>
                </div>
            </div>
        </div>
    @endsection
