@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="container-sm text-center">
        <div class="h2">
            Title
        </div>
        <div class="h5 p-3 border rounded">
            {{ $eventDetails->event_title }}
        </div>
        <div class="h2">
            Description
        </div>
        <div class="h5 p-3 border rounded">
            {{ $eventDetails->event_text }}
        </div>
        <div class="h2">
            Image
        </div>
        <div class="text-center m-2">
            <img class="img-thumbnail w-50" src="{{ asset('/storage/images/events/' . $eventDetails->event_image) }}"
                alt="event image">
        </div>
        <div>
            <button class="button rounded">
                <a href="{{ route('events.edit', ['id' => $eventDetails->id]) }}"> Edit </a>
            </button>
        </div>
        <div class="m-2">
            <form action="/event/{{ $eventDetails->id }}" method="POST">
                @csrf
                @method('DELETE')
                <input class="button rounded" type="submit" value="Delete Event">
            </form>
        </div>
    </div>
@endsection
