@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">

            <h1 class="mb-3"> {{ $post->title }} </h1>
            <h5>By. {{ $post->author->name }}</h5>

            <a href="/bulletin/posts/{{ $post->slug }}/edit" class="btn btn-warning">Edit</a>

            <div class="row justify-content mb-3">
                <div class="col-md-6">
                   <form action="/bulletin/posts/{{ $post->slug }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger mb-3" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>

            <h5>By. {{ $post->author->name }} {{ $post->created_at->diffForHumans() }}</h5>
            {{-- <p>{{ $post->body }}</p> --}}
            
            {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}"> --}}
            
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
                        
            <a href="/bulletin"class="text-decoration-none d-block mt-3">Back</a>
        </div>
    </div>
</div>
   
@endsection

