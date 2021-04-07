@extends('layouts.app')

@section('title', 'create post')

@section('content')
    
  <div class="container">
    <form method="POST" action="{{ route('post.store') }}">
      @method('POST')
      @csrf
      <div class="form-group">
        <label for="exampleFormControlInput1">title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Content</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='content'></textarea>      
      </div>
      @foreach ($tags as $tag)
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="tags[]" value="{{ $tag->id }}">
          <label class="form-check-label" for="exampleCheck1">{{ $tag->name }}</label>
        </div>
      @endforeach

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

@endsection






