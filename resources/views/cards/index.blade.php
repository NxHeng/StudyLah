@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    {{-- Cards --}}
    <div class="text-center h1">
        {{ $deck->deck_name }}
    </div>

    <div class="container-sm">
        @foreach ($cards as $card)
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-center rounded p-3 m-2 bg-body-secondary w-100">
                    <div class="d-flex">
                        <div class=" font-bold fs-2 me-5 p-3 card">
                            {{ $card->card_front }}
                        </div>
                        <div class="text-center p-2 ms-5 card">
                            {{ $card->card_back }}
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <form action="{{ route('cards.destroy', ['id' => $deck->id, 'card_id' => $card->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center">
        <a href="{{ route('cards.create', ['id' => $deck->id]) }}">
            <button>
                Add New Card
            </button>
        </a>
    </div>
@endsection
