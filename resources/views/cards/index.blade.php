@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    {{-- Cards --}}
    <div class="text-center h1"
        style="font-family: 'Arial', sans-serif; color: black; background-color: #f9f9f9; letter-spacing: 2px; text-shadow: 1px 1px 1px #000000;">
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

                <!-- icon -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

                <div class="p-5">
                    <form action="{{ route('cards.destroy', ['id' => $deck->id, 'card_id' => $card->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center m-3">
        <a href="{{ route('cards.study', ['id' => $deck->id]) }}">
            <button class="rounded">
                Study
            </button>
        </a>
    </div>

    <div class="text-center m-3">
        <a href="{{ route('cards.create', ['id' => $deck->id]) }}">
            <button class="rounded">
                Add New Card
            </button>
        </a>
    </div>
@endsection

<style>
    .rounded {
        background-color: #00000;
        color: #fffff;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
    }

    .rounded:hover {
        background-color: #30D5C8;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
    }

    .rounded:active {
        transform: scale(0.95);
    }

    .card {
        flex: 1;
        min-width: 0;
    }
</style>
