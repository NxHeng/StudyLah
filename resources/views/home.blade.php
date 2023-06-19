@extends('layouts.app')

@section('content')
    <section>
        <div class="h1 text-center">
            What's Going On?
        </div>
        <div id="carouselEvent" class="carousel carousel-dark slide">
            <div class="carousel-inner">
                @foreach ($events as $key => $event)
                    <div class="carousel-item hp-zoom @if ($key == 0) active @endif">
                        <div class="cards-wrapper d-flex justify-content-center">
                            <div class="card m-2 w-50 shadow-sm">
                                <img src="{{ asset('/storage/images/events/' . $event->event_image) }}"
                                    class="card-img-top hp-event-img img-fluid">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event->event_title }}</h5>
                                    <h5 class="card-title">12/12/2023</h5>
                                    <h5 class="card-title">09:00 AM</h5>
                                    <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                                    <p class="card-text">{{ $event->event_text }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev bg-body-secondary rounded" type="button" data-bs-target="#carouselEvent"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next bg-body-secondary rounded" type="button" data-bs-target="#carouselEvent"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section>
        <div class="container-sm mt-5">
            <div class="h1 text-center mb-3">
                Sharing is Caring
            </div>
            {{-- @for ($i = 0; $i < 2; $i++) --}}
            <div class="row d-flex justify-content-center">
                @for ($j = 0; $j < 8; $j++)
                    <div class="col-12 col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="card mb-3 hp-card-height shadow hp-zoom">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="{{ asset('/storage/images/notes/' . $notes[$j]->note_img) }}"
                                        class="rounded-start img-fluid hp-note-img">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $notes[$j]->note_title }}</h5>
                                        <p class="card-text">{{ Str::limit($notes[$j]->note_caption, 185, ' ...') }}</p>
                                        {{-- <p class="card-text"><small class="text-body-secondary">Last updated {{}}</small> --}}
                                        </p>
                                        <div class="d-flex">
                                            <button class="rounded">
                                                <a
                                                    href="{{ route('notes.download', ['filename' => $notes[$j]->note_file]) }}">
                                                    Download </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            {{-- @endfor --}}
    </section>

    <section>
        <div class="container-sm mt-5">
            <div class="h1 text-center mb-3">
                Study Your Cards
            </div>
            @foreach ($decks_own as $decks)
                <div class="d-flex justify-content-center">
                    <div class="w-75">
                        <a href="{{ route('cards.index', ['id' => $decks->id]) }}" style="text-decoration: none;">
                            <button
                                class="hp-deck d-flex justify-content-center border border-2 rounded p-3 m-2 bg-body-secondary w-100 shadow-sm hp-zoom">
                                <div class="display-6 me-5">
                                    {{ $decks->deck_name }}
                                </div>
                                <div class="text-center p-2 ms-5">
                                    {{ $decks->deck_topic }}
                                </div>
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
