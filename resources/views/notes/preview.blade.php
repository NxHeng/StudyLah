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
            <button class="rounded">
                <a href="{{ route('notes.download', ['filename' => $noteDetails->note_file]) }}"> Download </a>
            </button>
        </div>
    </div>
@endsection
