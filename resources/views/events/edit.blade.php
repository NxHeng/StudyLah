@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1">
        <b>Edit Event</b>
    </div>


    <div class="container-sm text-left border rounded p-3">
        <form action="{{ route('events.update', ['id' => $eventDetails->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group m-2">
                <label class="h2" for="title">Title: </label>
                <input class="form-control" type="text" id="title" name="title"
                    value="{{ $eventDetails->event_title }}">
            </div>
            <div class="form-group m-2">
                <label class="h2" for="descr">Description: </label>
                <textarea class="form-control" id="descr" name="descr" oninput="adjustTextareaHeight(this)">{{ $eventDetails->event_text }}</textarea>
        </div>

        <script>
        function adjustTextareaHeight(textarea) {
            textarea.style.height = 'auto'; // Reset the height to auto
            textarea.style.height = `${textarea.scrollHeight}px`; // Set the height to match the scroll height
        }

        // Adjust the textarea height on page load
        window.addEventListener('DOMContentLoaded', function() {
            const textarea = document.getElementById('descr');
            adjustTextareaHeight(textarea);
        });
        </script>
            
            <div class="form-group m-2">
                <label for="date" class="h2">Date: </label>
                <input class="form-control" type="date" id="date" name="date" value="{{ $eventDetails->date }}">
            </div>
            <div class="form-group m-2">
                <label for="link" class="h2">Link: </label>
                <input class="form-control" type="text" id="link" name="link" value="{{ $eventDetails->link }}">
            </div>
            <div class="form-group m-2">
                <label for="image" class="h2">Image: </label>
                <input class="form-control" type="file" id="image" name="image"input>
            </div>
            <div style="text-align: center; ">
            <br>
            <input class="rounded button2" type="submit" value="Save">
            </div>
            <br>
            </div>
        </form>
    
@endsection
