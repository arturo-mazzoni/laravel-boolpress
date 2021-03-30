@extends('layouts.app')

@section('title', 'dettagli post')

@section('content')

  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tile</th>
          <th scope="col">user Id</th>
          <th scope="col">Content</th>
          <th scope="col">Created at</th>
          <th scope="col">Updated at</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->slug }}</td>
            <td>{{ $post->content }}</td>
          </tr>
      </tbody>
    </table>
  </div>

@endsection