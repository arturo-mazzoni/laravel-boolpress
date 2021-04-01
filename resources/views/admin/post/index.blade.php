@extends('layouts.app')

@section('title', 'index posts')

@section('content')

  <div class="container">
    <a href="{{ route('post.create') }}">crea un nuovo post</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tile</th>
          <th scope="col">Slug</th>
          <th scope="col">content</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->slug }}</td>
            <td>{{ $post->content }}</td>
            <td>
              <a href="{{ route('post.show', $post->id) }}" class="btn btn-info">Dettagli</a>
              <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">Modifica</a>
              <form action="{{ route('post.destroy', $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
