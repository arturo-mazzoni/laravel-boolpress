@extends('layouts.app')

@section('title', 'index cars')

@section('content')

  <h1>Elenco Automobili</h1>
  <a href="{{ route('cars.create') }}">Inserisci una nuova auto</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tile</th>
        <th scope="col">user Id</th>
        <th scope="col">Created at</th>
        <th scope="col">Updated at</th>
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
            <a href="{{ route('cars.show', $automobile->id) }}" class="btn btn-info">Dettagli</a>
            <a href="{{ route('cars.edit', $automobile->id) }}" class="btn btn-warning">Modifica</a>
            <form action="{{ route('cars.destroy', $automobile->id) }}" method="post" class="d-inline-block">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
