@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    {{-- Decks --}}
    <div class="text-center h1">
        Your Decks
    </div>
    <div class="container-sm">
        @foreach ($decks_own as $decks)
            <div class="d-flex justify-content-between">
                <div class="w-100">
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

                <div class=" p-4">
                    <form action="{{ route('decks.destroy', ['id' => $decks->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
        <div class="text-center m-3">
            <a href="{{ route('decks.create') }}">
                <button class="rounded">
                    Create New Deck
                </button>
            </a>
        </div>
    </div>
@endsection
