@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1">
        Add Deck
    </div>

    <div class="container-sm text-center">
        <form action="/deck" method="POST">
            @csrf
            <div class="form-group m-2">
                <label for="name">Deck Name: </label>
                <input class="form-control" type="text" id="name" name="name">
            </div>
            <div class="form-group m-2">
                <label for="topic">Deck Topic: </label>
                <input class="form-control" type="text" id="topic" name="topic">
            </div>
            <input type="submit" value="Add">
        </form>
    </div>
@endsection
