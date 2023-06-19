@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="container-sm text-left ">
        <div class="row">
            <div class="col">
                <h1 class="text-left">Create Your New Note</h1>
            </div>
        </div>

           <form action="/note" method="POST" enctype="multipart/form-data">
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
            <div class="form-group m-2">
                <label for="document">Document: </label>
                <input class="form-control" type="file" id="document" name="document" input>
            </div>
            <div class="form-group m-2">
                <label for="image">Image: </label>
                <input class="form-control" type="file" id="image" name="image" input>
            </div>
            <div class="text-center mt-3">
    <input type="submit" value="Create Note" class="btn btn-primary" style="background-color: #77b5b3;">
</div>
        </form>
    </div>
@endsection