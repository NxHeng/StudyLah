@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <section>
        <div class="text-center h1">
            NoteHub
        </div>

        <div class="container-sm">
            <div class="row">
                @foreach ($notes as $note)
                    <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                        <div class="card m-2 p-3 hp-zoom shadow-sm">
                            <div class="text-center h4">
                                {{ $note->note_title }}
                            </div>
                            <div class="text-center">
                                {{ $note->note_caption }}
                            </div>
                            <div class="text-center m-2">
                                <img class="img-thumbnail eu-event-img"
                                    src="{{ asset('/storage/images/notes/' . $note->note_img) }}" alt="event image">
                            </div>
                            <div class="text-center mt-2">
                                <a href="{{ route('notes.preview', ['id' => $note->id]) }}">
                                    <button class="button rounded">
                                        View
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="m-3 text-center">
                {{ $notes->appends(['section1' => $notes->currentPage()])->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
    <section>
        <div class="text-center h1 mt-4">
            Your Notes
        </div>

        <div class="container-sm">
            <div class="row">
                @foreach ($notes_own as $note)
                    <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                        <div class="card m-2 p-3 hp-zoom shadow-sm">
                            <div class="text-center h4">
                                {{ $note->note_title }}
                            </div>
                            <div class="text-center">
                                {{ $note->note_caption }}
                            </div>
                            <div class="text-center m-2">
                                <img class="img-thumbnail eu-event-img"
                                    src="{{ asset('/storage/images/notes/' . $note->note_img) }}" alt="event image">
                            </div>
                            <div class="text-center mt-2">
                                <a href="{{ route('notes.show', ['id' => $note->id]) }}">
                                    <button class="button rounded">
                                        Show
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="m-3 text-center">
                {{ $notes_own->appends(['notes_own' => $notes_own->currentPage()])->links('pagination::bootstrap-4') }}
            </div>
        </div>

        <div class="text-center m-5">
            <button class="button rounded hp-zoom">
                <a href="{{ route('notes.create') }}"> Share Note </a>
            </button>
        </div>
    </section>

    <style>
        .button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #77b5b3;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        .button a {
            color: white;
            text-decoration: none;
        }
    </style>
@endsection
