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
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card m-2 p-3 hp-zoom shadow-sm">
                            <div class="text-center h2 ps-3">
                                <b>{{ $event->event_title }}</b>
                            </div>
                            <div class="text-start ps-3">
                                <h4>Date :
                                    <b>{{ $event->date }}</b>
                                </h4>
                            </div>
                            <div class="text-start ps-3">
                                {{ $event->event_text }}
                            </div>
                            <div class="text-start ps-3">
                                <a href="{{ $event->link }}" target="_blank">Check it out</a>
                            </div>
                            <div class="text-center m-2">
                                <img class="img-thumbnail eu-event-img"
                                    src="{{ asset('/storage/images/events/' . $event->event_image) }}" alt="event image">
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="m-3 text-center">
                    {{ $events->appends(['events' => $events->currentPage()])->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="text-center h1 mt-4">
            <b> Your Events </b>
        </div>

        <div class="container-sm">
            <div class="row">
                @foreach ($events_own as $event)
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card m-2 p-3 hp-zoom shadow-sm">
                            <div class="text-center h2 ps-4">
                                <b>{{ $event->event_title }}</b>
                            </div>
                            <div class="text-start ps-4">
                                <h4>Date :
                                    <b>{{ $event->date }}</b>
                                </h4>
                            </div>
                            <div class="text-start ps-4">
                                {{ $event->event_text }}
                            </div>
                            <div class="text-start ps-4">
                                <a href="{{ $event->link }}" target="_blank">Your Link</a>
                            </div>
                            <div class="text-center m-2">
                                <img class="img-thumbnail eu-event-img"
                                    src="{{ asset('/storage/images/events/' . $event->event_image) }}" alt="event image">
                            </div>
                            <div class="m-3 text-center">
                                <a href="{{ route('events.show', ['id' => $event->id]) }}"
                                    style="text-decoration: none; color: black;">
                                    <button class="rounded button2">
                                        Show
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $events_own->appends(['events_own' => $events_own->currentPage()])->links('pagination::bootstrap-4') }}
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
