@extends('layouts.app')

@section('content')
    {{-- Content Starts Here. Header, Navbar, Footer in /layouts/app.blade.php --}}
    <div class="container-sm text-left ">
        <div class="row">
            <div class="col">
                <h1 class="text-left">Edit Your Note</h1>
            </div> 
        </div>

        <form action="{{ route('notes.update', ['id' => $noteDetails->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row m-2 border mt-4">
            <label for="title" class="col-sm-2 mt-4 col-form-label" style="font-weight: bold;  ">Title:</label>
            <div class="col-sm-10 mt-4">   
                <input class="form-control" type="text" id="title" name="title"
                    value="{{ $noteDetails->note_title }}">
            </div>
            <label for="topic" class="col-sm-2 mt-3 col-form-label" style="font-weight: bold;">Topic:</label>
            <div class="col-sm-10 mt-4">  
                <input class="form-control" type="text" id="topic" name="topic"
                    value="{{ $noteDetails->note_topic }}">
            </div>
            
            <label for="topic" class="col-sm-2 mt-3 col-form-label" style="font-weight: bold;">Caption:</label>
            <div class="col-sm-10 mt-4"> 
                <textarea class="form-control" type="text" id="caption" name="caption">{{ $noteDetails->note_caption }}
                </textarea>
            </div>

           <label for="image" class="col-sm-2 mt-3 col-form-label text-left" style="font-weight:bold;">Image:</label>
             <div class="col-sm-10 mt-3">
            <input class="form-control" type="file" id="image" name="image"><br>
            </div>
            <div class="text-center mt-3">
    <input type="submit" value="Update Note" class="btn btn-primary" style="background-color: #77b5b3;">
</div>
<div class="col-sm-10 mt-2">
</div>
        </form>
    </div>
@endsection
