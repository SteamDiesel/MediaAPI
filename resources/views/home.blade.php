@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        
        <x-new-post/>
    </div>
</div>



    @if($posts)
    <div class="row row-cols-1 row-cols-md-2">
    
    @foreach ($posts as $post)  
        <div class="card" style="width: 18rem;">
            <img src="{{$post->getFirstMediaUrl('default', 'small')}}" class="card-img-top">
            <div class="card-body">
                <h2>
                    {{$post->title}}
                </h2>

                <p>{{$post->body}}</p>
                <p>-{{$post->author}}</p>
                
                <a class="btn btn-sm btn-primary" href="/post/{{$post->id}}/edit">edit</a>
            </div>
        </div>
    @endforeach
  
        
    </div>
    @endif

@endsection