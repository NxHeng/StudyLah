@extends('layouts.app')

@section('content')
    <div id="carouselEvent" class="carousel carousel-dark slide">
        <div class="carousel-inner">
            {{-- $cards is the list of cards
                $card holds a single card
                $key is the index for each card
                @if ($key == 0) active @endif
                this if statement is for the first slide to have .active bootstrap class in order for the carousel to work properly --}}
            @foreach ($cards as $key => $card)
                <div class="carousel-item hp-zoom @if ($key == 0) active @endif">
                    {{-- something like this la, i cannot do XD --}}
                    <div class="d-flex justify-content-center">
                        <div class="card m-2 w-50 fc-study-card">
                            <div class="h1 text-center">{{ $card->card_front }}</div>
                            <div class="h1 text-center">{{ $card->card_back }}</div>
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
    {{-- Copy pasted from https://codepen.io/mondal10/pen/WNNEvjV --}}
    {{-- example of a flip card --}}
    <div class="text-center">
        <div class="scene scene--card @if ($key == 0) active @endif">
            <div class="fc-study-card ">
                <div class="card__face card__face--front">{{ $card->card_front }}</div>
                <div class="card__face card__face--back">{{ $card->card_back }}</div>
            </div>
        </div>
    </div>
@endsection
