@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1"
        style="font-family: 'Arial', sans-serif; color: black; background-color: #f9f9f9; letter-spacing: 2px; text-shadow: 1px 1px 1px #000000;">
        Add Deck
    </div>

    <div class="container-sm text-center">
        <form action="/deck" method="POST">
            @csrf
            <div class="form-group m-3">
                <label class="h2" for="name">Deck Name: </label>
                <input class="form-control fc-form-control-lg fs-1 shadow-sm" type="text" id="name" name="name">
            </div>
            <div class="form-group m-3">
                <label class="h2" for="topic">Deck Topic: </label>
                <input class="form-control fc-form-control-lg fs-1 shadow-sm" type="text" id="topic" name="topic">
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
