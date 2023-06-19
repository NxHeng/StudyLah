@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <section>
        <div class="text-center h1">
            <b>EventUp</b>
        </div>

        <div class="container-sm">
            <div class="row">
                @foreach ($events as $event)
                    <div class="m3 col-sm-12 col-md-6 col-lg-6">
                        <div class="card m-2 p-3 ">
                            <div class="text-center h4">
                                <b>{{ $event->event_title }}</b>
                            </div>
                            <div class="text-center">
                                {{ $event->event_text }}
                            </div>
                            <div class="text-center m-2">
                                <img class="img-thumbnail eu-event-img"
                                    src="{{ asset('/storage/images/events/' . $event->event_image) }}" alt="event image">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <div class="text-center h1 mt-4">
            <b> Events </b>
        </div>

        <div class="container-sm">
            <div class="row">
                @foreach ($events_own as $event)
                    <div class="m3 col-sm-12 col-md-6 col-lg-6">
                        <div class="card m-2 p-3">
                            <div class="text-center h4">
                                <b>{{ $event->event_title }}</b>
                            </div>
                            <div class="text-center">
                                {{ $event->event_text }}
                            </div>
                            <div>
                                <br>
                            </div>
                            <div class="text-center">
                                Event Date :<br>
                                <b>{{ $event->date }}</b>
                            </div>
                            <div class="text-center">
                                <a href="{{ $event->link }}">Event Link</a>
                            </div>
                            <div class="text-center m-2">
                                <img class="img-thumbnail eu-event-img"
                                    src="{{ asset('/storage/images/events/' . $event->event_image) }}" alt="event image">
                            </div>
                            <div class="mt-2 text-center m-5" >
                            <a href="{{ route('events.show', ['id' => $event->id]) }}" style="text-decoration: none; color: black;">
                                <button class="rounded button2">
                                Show 
                                </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="text-center m-5">
        <a href="{{ route('events.create') }}" style="color: black; text-decoration: none; ">  
            <button class="button2">
            Add Event
            </button>
        </a>
        </div>
    </section>
@endsection
