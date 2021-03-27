@extends('layouts.app')

@section('title','elenco posts')

@section('content')

  <h1>Elenco posts</h1>
  
  <div class="container">

      <div class="card">
        <div class="card-header">
          {{ $post->title }}
        </div>
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">{{ $post->content }}</p>
          <p>{{ $post->user->name }}</p>
        </div>
      </div>
    
  </div>
 
@endsection
