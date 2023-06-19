@extends('layouts.app')

@section('content')
    <section>
        <div id="HeroCarousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/community.jpg" class="d-block w-100 wp-carousel" alt="image">
                    <div class="carousel-caption">
                        <h5 class="h1">StudyLah</h5>
                        <p class="h5">A peer-to-peer learning platform designed to facilitate knowledge sharing and
                            collaboration among
                            students.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/events.jpg" class="d-block w-100 wp-carousel" alt="image">
                    <div class="carousel-caption">
                        <h5 class="h2">EventUp</h5>
                        <p class="h5">A place to share, discover, and participate in educational events.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/notes.jpg" class="d-block w-100 wp-carousel" alt="image">
                    <div class="carousel-caption">
                        <h5 class="h2">NoteHub</h5>
                        <p class="h5">A place to facilitate the sharing and obtaining of notes among students.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/cards.jpg" class="d-block w-100 wp-carousel" alt="image">
                    <div class="carousel-caption">
                        <h5 class="h2">Flashcards</h5>
                        <p class="h5">A convenient and efficient way to review and reinforce knowledge in a flashcard
                            format.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#HeroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#HeroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section>
        <div class="text-center h1 p-4">
            Our Team
        </div>
        <div class="text-center fs-4 fst-italic mb-4 p-2">
            We are a team of 5 students from Universiti Malaya, currently pursuing a Computer Science degree in Information
            Systems.
        </div>
        <div class="container-sm">
            <div class="m-4">
                <div class="container-sm border rounded-5 d-flex bg-body-secondary shadow hp-zoom w-75">
                    <div class="p-3">
                        <img src="images/tessa.png" class="wp-profile-pic img-thumbnail" alt="image">
                    </div>
                    <div class="d-flex justify-content-between w-100 my-auto">
                        <div class="my-auto">
                            <div class="h1">
                                Tessa Shalini Pradeep
                            </div>
                            <div class="h5">
                                2nd Year Student
                            </div>
                        </div>
                        <div class="h4 my-auto ms-3 me-5">
                            Frontend Developer
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-4">
                <div class="container-sm border rounded-5 d-flex bg-body-secondary shadow hp-zoom w-75">
                    <div class="d-flex justify-content-between w-100 my-auto">
                        <div class="h4 my-auto ms-4">
                            Frontend Developer
                        </div>
                        <div class="my-auto justify-content-end">
                            <div class="h1 text-end">
                                Lee Tian Sien
                            </div>
                            <div class="h5 text-end">
                                2nd Year Student
                            </div>
                        </div>
                    </div>
                    <div class="p-3">
                        <img src="images/ts.png" class="wp-profile-pic img-thumbnail" alt="image">
                    </div>
                </div>
            </div>
            <div class="m-4">
                <div class="container-sm border rounded-5 d-flex bg-body-secondary shadow hp-zoom w-75">
                    <div class="p-3">
                        <img src="images/shirley1.png" class="wp-profile-pic img-thumbnail" alt="image">
                    </div>
                    <div class="d-flex justify-content-between w-100 my-auto">
                        <div class="my-auto">
                            <div class="h1">
                                Mah Shirley
                            </div>
                            <div class="h5">
                                3rd Year Student
                            </div>
                        </div>
                        <div class="h4 my-auto ms-3 me-5">
                            Frontend Developer
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-4">
                <div class="container-sm border rounded-5 d-flex bg-body-secondary shadow hp-zoom w-75">
                    <div class="d-flex justify-content-between w-100 my-auto">
                        <div class="h4 my-auto ms-4">
                            Frontend Developer
                        </div>
                        <div class="my-auto justify-content-end">
                            <div class="h1 text-end">
                                Alvin Lee Kuan Fatt
                            </div>
                            <div class="h5 text-end">
                                2nd Year Student
                            </div>
                        </div>
                    </div>
                    <div class="p-3">
                        <img src="images/alvin.png" class="wp-profile-pic img-thumbnail" alt="image">
                    </div>
                </div>
            </div>
            <div class="m-4">
                <div class="container-sm border rounded-5 d-flex bg-body-secondary shadow hp-zoom w-75">
                    <div class="p-3">
                        <img src="images/nxh.png" class="wp-profile-pic img-thumbnail" alt="image">
                    </div>
                    <div class="d-flex justify-content-between w-100 my-auto">
                        <div class="my-auto">
                            <div class="h1">
                                Ng Xian Heng
                            </div>
                            <div class="h5">
                                2nd Year Student
                            </div>
                        </div>
                        <div class="h4 my-auto ms-3 me-5">
                            Backend Developer
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
