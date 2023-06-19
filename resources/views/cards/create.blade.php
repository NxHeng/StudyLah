@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1" style="font-family: 'Arial', sans-serif; color: black; background-color: #f9f9f9; letter-spacing: 2px; text-shadow: 1px 1px 1px #000000;">
        Add Card
    </div>
    <div class="text-center h2" style="font-family: 'Arial', sans-serif; color: black; background-color: #f9f9f9; letter-spacing: 2px; text-shadow: 1px 1px 1px #000000;">
        Deck: {{ $deck->deck_name }}
    </div>

    <div class="container-sm text-center">
        <form action="/deck/{{ $deck->id }}/card" method="POST">
            @csrf
            <div class="form-group m-2">
                <label for="front">Front: </label>
                <textarea class="form-control fc-form-control-lg" type="text" id="front" name="front"></textarea>
            </div>
            <div class="form-group m-2">
                <label for="back">Back: </label>
                <textarea class="form-control fc-form-control-lg" type="text" id="back" name="back"></textarea>
            </div>
            <input type="submit" value="Add" class="rounded">
        </form>
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
</style>
