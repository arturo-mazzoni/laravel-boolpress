@extends('layouts.app')

@section('title','elenco posts')

@section('content')

  <h1>Elenco posts</h1>
  
  <div class="container">

    @foreach ($posts as $post)
      <div class="card">
        <div class="card-header">
          {{ $post->title }}
        </div>
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">{{ $post->content }}</p>
          <p>{{ $post->user->name }}</p>
          <a href="{{ route('guests.posts.show', $post->slug) }}" class="btn btn-primary">Dettagli</a>
        </div>
      </div>
    @endforeach
    
  </div>
 
@endsection
