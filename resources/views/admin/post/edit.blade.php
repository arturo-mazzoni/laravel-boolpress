@extends('layouts.app')

@section('title', 'create post')

@section('content')

  <div class="container">
    <form method="post" action="{{ route('post.update',$post->id) }}">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="exampleFormControlInput1">title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" value='{{ $post->title }}'>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">slug</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" value='{{ $post->slug }}'>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Content</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $post->content }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </div>
    
@endsection




