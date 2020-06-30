@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/home" class="btn btn-secondary">Exit</a>

    <div class="row justify-content-center mb-4">
        <div class="card w-50">
            <form action="/post/{{$post->id}}/update" method="POST" enctype="multipart/form-data">

                @method('POST')
                @csrf
                <h5 class="card-header">Edit Post</h5>
                <div class="card-body">
                    <input value="{{$post->title}}" class="form-control form-control-lg mb-2" name="title" id="title" type="text" placeholder="Title">
                    <input value="{{$post->author}}" class="form-control form-control-lg mb-2" name="author" id="author" type="text" placeholder="Author">
                    <div id="editor-container">
                        
                    </div>
                    <input type="hidden" name="about">
                    <!-- <textarea class="form-control mb-2" name="body" id="body" rows="4" placeholder="Tell a story or share your thoughts on these pictures.">{{$post->body}}</textarea> -->
                    <button type="submit" value="upload" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
    <div class="row justify-content-center mb-4">
        <div class="card w-50">
            <form action="/post/{{$post->id}}/photo" method="POST" enctype="multipart/form-data">

                @method('POST')
                @csrf
                <h5 class="card-header">Add Photo</h5>
                <div class="card-body">
                    <div class="custom-file mb-2">
                        <input type="file" name="photo" multiple class="custom-file-input" id="custom-file-input">
                        <label class="custom-file-label" for="custom-file-input">Choose Photo</label>
                    </div>
                    <button type="submit" value="upload" class="btn btn-primary">Save Photo</button>
                </div>
            </form>

        </div>
        


    </div>
    
</div>
<div class="flex-wrap row justify-content-center">
        @if($media)
            @foreach($media as $img)
            <div class="">
                <img class="mb-2 mx-1 img-fluid" src="{{$img->getUrl('small')}}" alt="">
            </div>
                
            @endforeach
        @endif
    </div>

</div>
@endsection