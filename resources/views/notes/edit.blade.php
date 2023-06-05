@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1">
        Edit Note
    </div>

    <div class="container-sm text-center">
        <form action="{{ route('notes.update', ['id' => $noteDetails->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group m-2">
                <label class="h2" for="title">Title: </label>
                <input class="form-control" type="text" id="title" name="title"
                    value="{{ $noteDetails->note_title }}">
            </div>
            <div class="form-group m-2">
                <label class="h2" for="topic">Topic: </label>
                <input class="form-control" type="text" id="topic" name="topic"
                    value="{{ $noteDetails->note_topic }}">
            </div>
            <div class="form-group m-2">
                <label class="h2" for="caption">Caption: </label>
                <textarea class="form-control" type="text" id="caption" name="caption">{{ $noteDetails->note_caption }}
                </textarea>
            </div>
            <input class="rounded" type="submit" value="Save">
        </form>
    </div>
@endsection
