@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <section>
        <div class="text-center h1" style="background-color: #77b5b3;display=block; width=100%">
            EventUp
        </div>

        <div class="container-sm">
            <div class="row">
                @foreach ($events as $event)
                    <div class="m3 col-sm-12 col-md-6 col-lg-6">
                        <div class="text-center m-2">
                            <img class="img-thumbnail eu-event-img"
                                src="{{ asset('/storage/images/events/' . $event->event_image) }}" alt="event image">
                        </div>
                        <div class="card m-2 p-3 ">
                            <div class="text-center h4"
                                style="text-transform: Uppercase; font-weight:bold; font-family: 'cursive', Monospace;">
                                {{ $event->event_title }}
                            </div>
                            <div class="text-left">
                                <div class="description">
                                    WHAT IS IT ABOUT? <br>
                                    <p>{{ $event->event_text }} </p>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section> <br><br>
        <div class="text-center h1" style="background-color: #77b5b3;display=block; width=100%">
            Your Events
        </div>

        <div class="container-sm">
            <div class="row">
                @foreach ($events_own as $event)
                    <div class="col-sm-12 col-md-6 col-lg-6">
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
                                <div class="text-center m-2">
                                    <img class="img-thumbnail eu-event-img"
                                        src="{{ asset('/storage/images/events/' . $event->event_image) }}"
                                        alt="event image">
                                </div>
                                <div class="card-body ">
                                    <h4 class="text-center style="text-transform: Uppercase; font-weight:bold;
                                        font-family: 'cursive' , Monospace;">
                                        {{ $event->event_title }}</h4>


                                </div>
                                <div class="text-center">
                                    <button class="rounded button-style ">
                                        <a href="{{ route('events.show', ['id' => $event->id]) }}"> Show Details </a>
                                    </button>
                                </div>

                                <style>
                                    .button-style {
                                        padding: 5px 10px;
                                        background-color: "grey";
                                        color: "black";
                                        border: none;
                                        border-radius: 5px;
                                        text-decoration: none;
                                        font-weight: ;
                                    }

                                    .button-style:hover {
                                        background-color: "dark grey";
                                    }
                                </style>

                            </div>
                        </div>
                @endforeach
            </div>
        </div>

        <div class="text-center mt-2">
            <button class="button rounded">
                <a href="{{ route('events.create') }}"> Add Event </a>
            </button>
        </div>
    </section>
@endsection
