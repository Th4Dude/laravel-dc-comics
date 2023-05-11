@extends('layout.app')

@section('page.up_title')
{{ $comic->title}}
@endsection
@section('page.title')
<div class="container">
  <h1>{{ $comic->title}}</h1>
</div>
@endsection

@section('page.main')
<div class="container">    
    <div class="card mb-3">
      <div class="text-center">
        <img src="{{ $comic->thumb}}" class="card-img-top  w-25" alt="{{ $comic->title}}">
      </div>
        <div class="card-body">
          <h5 class="card-title">{{ $comic->title}}</h5>
          <p class="card-text">{{ $comic->description}}</p>
          <p class="card-text"><small class="text-body-secondary">Artisti: {{ $comic->artists}}</small></p>
          <p class="card-text"><small class="text-body-secondary">Scrittori: {{ $comic->writers}}</small></p>
          <a href="{{ route('comics.index') }}" class="btn btn-success btn-sm">Torna all'elenco</a>
          <div class="mt-4">
            <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-primary">Modifica</a>
            <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
          </div>
        </div>
    </div>
</div>  

@endsection 