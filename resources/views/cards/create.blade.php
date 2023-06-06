@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1">
        Add Card
    </div>
    <div class="text-center h2">
        Deck: {{ $deck->deck_name }}
    </div>

    <div class="container-sm text-center">
        <form action="/deck/{{ $deck->id }}/card" method="POST">
            @csrf
            <div class="form-group m-2">
                <label for="front">Front: </label>
                <textarea class="form-control" type="text" id="front" name="front"></textarea>
            </div>
            <div class="form-group m-2">
                <label for="back">Back: </label>
                <textarea class="form-control" type="text" id="back" name="back"></textarea>
            </div>
            <input type="submit" value="Add">
        </form>
    </div>
@endsection
