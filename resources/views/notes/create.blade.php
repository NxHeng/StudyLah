@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1">
        Share Note
    </div>

    <div class="container-sm text-center">
        <form action="/note" method="POST">
            @csrf
            <div class="form-group m-2">
                <label for="title">Note Title: </label>
                <input class="form-control" type="text" id="title" name="title">
            </div>
            <div class="form-group m-2">
                <label for="topic">Note Topic: </label>
                <input class="form-control" type="text" id="topic" name="topic">
            </div>
            <div class="form-group m-2">
                <label for="caption">Note Caption: </label>
                <textarea class="form-control" type="text" id="caption" name="caption"></textarea>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection
