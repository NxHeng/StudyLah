@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="container-sm text-center">
        <div class="h2">
            {{ $noteDetails->note_title }}
        </div>

        <div class="h6 p-3 mt-2 border rounded">
            {{ $noteDetails->note_caption }}
        </div>
        <div>
            <object class="rounded shadow" data="{{ asset('/storage/documents/' . $noteDetails->note_file) }}"
                type="application/pdf" width="100%" height="600px"> <a
                    href="{{ asset('/storage/documents/' . $noteDetails->note_file) }}">test.pdf</a></object>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button class="button rounded">
                <a href="{{ route('notes.edit', ['id' => $noteDetails->id]) }}"> Edit </a>
            </button>

            <form action="/note/{{ $noteDetails->id }}" method="POST">
                @csrf
                @method('DELETE')
                <input class="button rounded" type="submit" value="Delete Note">
            </form>
        </div>

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
