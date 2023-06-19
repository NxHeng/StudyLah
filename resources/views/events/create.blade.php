@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="text-center h1">
        Add Event
    </div>
    <div class="container-sm text-left border rounded p-3 shadow-sm ">
        <form action="/event" method="POST" enctype="multipart/form-data" id="event-form">
            @csrf

            <div>
                @if (session('message'))
                    <p class="alert alert-success">{{ session('message') }}</p>
                @endif

                @if ($errors->any())
                    <ul class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="form-group m-2">
                <label for="title"; class="h2">Event Title: </label>
                <input class="form-control" type="text" id="title" name="title">
            </div>
            <div class="form-group m-2">
                <label for="descr"; class="h2">Event Description:</label>
                <textarea class="form-control" id="descr" name="descr" oninput="adjustTextareaHeight(this)"></textarea>
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

                document.getElementById("event-form").addEventListener('submit', (e) => {
                    // e.preventDefault();
                })
            </script>

            <div>
                <label for="descr"; class="h2">Event Date: </label>
                <input type="date" class="form-control" id="date" name="date">
                <br>
            </div>
            <div>
                <label for="descr"; class="h2">Event Profile Link: </label>
                <textarea class="form-control" type="text" id="link" name="link"></textarea>
            </div>
            <div class="form-group m-2">
                <label for="image"; class="h2">Event Image: </label>
                <input class="form-control" type="file" id="image" name="image"input>
            </div>

            <div>

            </div>
            <div style="text-align: center">
                <br>
                <input type="submit" value="Submit" class="button2">
            </div>
        </form>
    </div>
@endsection
