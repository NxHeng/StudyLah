@extends('layouts.app')

@section('content')
    <section>
        <div class="h1 text-center">
            EventUp
        </div>
        <div id="carouselEvent" class="carousel carousel-dark slide">
            <div class="carousel-inner">
                <div class="carousel-item active hp-zoom">
                    <div class="cards-wrapper d-flex justify-content-center">
                        <div class="card m-2 w-50">
                            <img src="/images/dummy-img.jpg" class="card-img-top hp-event-img img-fluid">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
                @for ($i = 0; $i < 2; $i++)
                    <div class="carousel-item hp-zoom">
                        <div class="cards-wrapper d-flex justify-content-center">
                            <div class="card m-2 w-50">
                                <img src="/images/dummy-img.jpg" class="card-img-top hp-event-img img-fluid">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk
                                        of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
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
                NoteHub
            </div>
            @for ($i = 0; $i < 2; $i++)
                <div class="row d-flex justify-content-center">
                    @for ($j = 0; $j < 4; $j++)
                        <div class="col-12 col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="card mb-3 hp-card-height shadow hp-zoom">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="/images/dummy-img.jpg" class="rounded-start img-fluid hp-note-img">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a
                                                natural
                                                lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                                    ago</small>
                                            </p>
                                            <div class="d-flex justify-content-start">
                                                <button class="button rounded border border-3 hp-note-btn">
                                                    Download
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            @endfor
    </section>

    <section>
        <div class="container-sm mt-5">
            <div class="h1 text-center mb-3">
                FlashCards
            </div>
            @for ($i = 0; $i < 3; $i++)
                <button
                    class="hp-deck d-flex justify-content-center border border-2 rounded p-3 m-2 bg-body-secondary w-100 shadow-sm hp-zoom"
                    href="#">
                    <div class="display-6 me-5">
                        Deck Title {{ $i + 1 }}
                    </div>
                    <div class="text-center p-2 ms-5">
                        Deck Topic
                    </div>
                </button>
            @endfor
        </div>
    </section>
@endsection
