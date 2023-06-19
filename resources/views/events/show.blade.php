@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="container-sm text-center">

        <div class="text-center m-2">
            <img class="img-thumbnail w-50" src="{{ asset('/storage/images/events/' . $eventDetails->event_image) }}"
                alt="event image">
        </div>
        <div class="h2">
            {{ $eventDetails->event_title }}
        </div>
    
        <div class="h5 p-2 border rounded text-justify text-right">
            {{ $eventDetails->event_text }}
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            <button class="button rounded">
                <a href="{{ route('events.edit', ['id' => $eventDetails->id]) }}">Edit</a>
            </button>
        
            <form action="/event/{{ $eventDetails->id }}" method="POST">
                @csrf
                @method('DELETE')
                <input class="button rounded" type="submit" value="Delete Event">
            </form>
        </div>

        <style>
            .button {
                display: inline-block;
                padding: 5px 10px;
                background-color: #77b5b3;
                color: white;
                border: none;
                border-radius: 5px;
                text-decoration: none;
                font-weight: bold;
                margin-right: 10px;
            }

            .button a {
                color: white;
                text-decoration: none;
            }
        </style>

    </div>
@endsection
