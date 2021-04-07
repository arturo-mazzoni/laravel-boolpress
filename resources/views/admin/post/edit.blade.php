@extends('layouts.app')

@section('title', 'create post')

@section('content')

  <div class="container">
    <form method="post" action="{{ route('post.update',$post->id) }}">

      @method('PUT')
      @csrf

      <div class="form-group">
        <label for="exampleFormControlInput1">title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" value='{{ $post->title }}' name='title'>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Content</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='content'>{{ $post->content }}</textarea>
      </div>

      @foreach ($tags as $tag)
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="tags[]" value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'checked' : '' }}>
          <label class="form-check-label" for="exampleCheck1">{{ $tag->name }}</label>
        </div>
      @endforeach

      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </div>
    
@endsection




