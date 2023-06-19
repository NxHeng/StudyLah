@extends('layouts.app')

@section('content')
    <div class="text-center h1 m-4">
        {{ $deck->deck_name }}
    </div>
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
                    <div class="scene scene--card">
                        <div class="card border">
                            <div class="card__face card__face--front">{{ $card->card_front }}</div>
                            <div class="card__face card__face--back card-word-wrap">
                                <div class=" my-auto">
                                    {{ $card->card_back }}
                                </div>
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
    <input type="hidden" id="studyDuration" value="{{ $user->study_duration }}">

    <script>
        var cards = document.querySelectorAll('.card');

        [...cards].forEach((card) => {
            card.addEventListener('click', function() {
                card.classList.toggle('is-flipped');
            });
        });

        document.addEventListener("DOMContentLoaded", () => {
            const start = new Date().getTime();
            const studyDurationElement = document.getElementById('studyDuration');
            let totalDuration = parseFloat(studyDurationElement.textContent) || 0;
            window.addEventListener("beforeunload", () => {
                const end = new Date().getTime();
                const currentDuration = (end - start) / 1000;
                totalDuration += currentDuration;
                // Send AJAX request to update the total study duration in the database
                const url = '/duration';
                const data = {
                    duration: totalDuration
                };
                fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add Laravel CSRF token
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => {
                        // Handle the response if needed
                    })
                    .catch(error => {
                        // Handle errors if any
                    });
            });
        });
    </script>
@endsection
