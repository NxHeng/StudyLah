@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="container-sm text-center">
        <div class="h3 p-3">
            {{ $noteDetails->note_title }}
        </div>
        <div class="h5 p-3">
            {{ $noteDetails->note_caption }}
        </div>
        <div>
            <object class="rounded-3 shadow" data="{{ asset('/storage/documents/' . $noteDetails->note_file) }}"
                type="application/pdf" width="100%" height="1000px">
            </object>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('notes.download', ['filename' => $noteDetails->note_file]) }}">
                <button class="button rounded">
                    Download
                </button>
            </a>
        </div>
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
