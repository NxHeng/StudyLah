@extends('layouts.app')

@section('content')
<div class = "d-flex justify-content-center align-items-center" style="height: 100vh;">
<div class = "card-container">
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
                    <div class="d-flex justify-content-center align-items-center" style="height:100%">
                        <div class="card m-2 w-75 fc-study-card">
                            <div class = "fc-flip-inner">
                            <div class = "card_front"> 
                            <div class="card-face card-front h1 text center">{{ $card->card_front }}</div>
                            </div>
                            <div class = "card_back"> 
                            <div class="card-face card-back h1 text-center d-none ">{{ $card->card_back }}</div>
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
</div>
</div>
<!--javascript -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const start = new Date().getTime();
            const studyDurationElement = document.getElementById('studyDuration');
            let totalDuration = parseFloat(studyDurationElement.value) || 0;

            const carousel = new bootstrap.Carousel(document.getElementById('carouselEvent'), {
                interval: false
            });

            const flipCard = document.querySelector('.fc-study-card');
            const cardFrontElement = flipCard.querySelector('.card-front');
            const cardBackElement = flipCard.querySelector('.card-back');
            let currentIndex = 0;

            carousel.on('slide.bs.carousel', (event) => {
                const nextIndex = event.to;
                currentIndex = nextIndex;
                const nextCard = document.querySelector(`#carouselEvent .carousel-item:nth-child(${nextIndex + 1}) .fc-study-card`);
                const nextCardFront = nextCard.querySelector('.card-front');
                const nextCardBack = nextCard.querySelector('.card-back');

                cardFrontElement.textContent = nextCardFront.textContent;
                cardBackElement.textContent = nextCardBack.textContent;
            });


            const nextButton = document.querySelector('[data-bs-slide="next"]');
            nextButton.addEventListener('click', () => {
                const nextIndex = (currentIndex + 1) % {{ count($cards) }};
                carousel.to(nextIndex);
            });

            flipCard.addEventListener('click', () => {
                cardFrontElement.classList.toggle('d-none');
                cardBackElement.classList('d-none');
            });

            window.addEventListener("beforeunload", () => {
                const end = new Date().getTime();
                const currentDuration = (end - start) / 1000;
                totalDuration += currentDuration;

                const url = '/duration';
                const data = {
                    duration: totalDuration
                };

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
	
	$("#card-flip").flip();
	
	function showIndex(){
		$('.cards').slick('slickGoTo', 3);
		var currentSlide = $('.cards').slick('slickCurrentSlide');
	}
    </script>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/nnattawat/flip/v1.0.20/dist/jquery.flip.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
