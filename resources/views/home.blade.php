@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                    <div>
                        You can use an alternative UI if you want to edit the text with headings and paragraphs.
                        <a class="btn btn-sm btn-primary" href="/nova">Use Nova Dashboard</a>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <div class="row justify-content-center mb-4">
        
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
</div>
@endsection