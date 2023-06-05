@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <section>
        <div class="text-center h1">
            EventUp
        </div>

        <div class="container-sm">
            <div class="row">
                @foreach ($events as $event)
                    <div class="m3 col-sm-12 col-md-6 col-lg-6">
                        <div class="card m-2 p-3 ">
                            <div class="text-center h4">
                                Title: {{ $event->event_title }}
                            </div>
                            <div class="text-center">
                                Description: {{ $event->event_text }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <div class="text-center h1 mt-4">
            Your Events
        </div>

        <div class="container-sm">
            <div class="row">
                @foreach ($events_own as $event)
                    <div class="m3 col-sm-12 col-md-6 col-lg-6">
                        <div class="card m-2 p-3">
                            <div class="text-center h4">
                                Title: {{ $event->event_title }}
                            </div>
                            <div class="text-center">
                                Description: {{ $event->event_text }}
                            </div>
                            <div>
                                <button class="rounded">
                                    <a href="{{ route('events.show', ['id' => $event->id]) }}"> Show </a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="text-center m-5">
            <button class="button rounded">
                <a href="{{ route('events.create') }}"> Add Event </a>
            </button>
        </div>
    </section>
@endsection
