@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="container-sm text-center">
        <div class="h2">
            Title
        </div>
        <div class="h5 p-3 border rounded">
            {{ $noteDetails->note_title }}
        </div>
        <div class="h2">
            Caption
        </div>
        <div class="h5 p-3 border rounded">
            {{ $noteDetails->note_caption }}
        </div>
        <div>
            <object data="{{ asset('/storage/documents/' . $noteDetails->note_file) }}" type="application/pdf" width="100%"
                height="600px"> <a href="{{ asset('/storage/documents/' . $noteDetails->note_file) }}">test.pdf</a></object>
        </div>
        <div>
            <button class="button rounded">
                <a href="{{ route('notes.edit', ['id' => $noteDetails->id]) }}"> Edit </a>
            </button>
        </div>
        <div class="m-2">
            <form action="/note/{{ $noteDetails->id }}" method="POST">
                @csrf
                @method('DELETE')
                <input class="button rounded" type="submit" value="Delete Note">
            </form>
        </div>
    </div>
@endsection
