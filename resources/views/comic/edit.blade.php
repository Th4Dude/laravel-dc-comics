@extends('layout.app')

@section('page.up_title')
  Modifica Fumetto
@endsection

@section('page.title')
<div class="container">
    <h1>Modifica Fumetto</h1>
</div>  
@endsection

@section('page.main')
<div class="container">
  <form action="{{ route('comics.update', $comic->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}">
    </div>
    <div class="form-group">
      <label for="description">Descrizione</label>
      <textarea class="form-control" id="description" name="description" rows="3">{{ $comic->description }}</textarea>
    </div>
    <div class="form-group">
      <label for="thumb">Thumb</label>
      <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}">
    </div>
    <div class="form-group">
      <label for="price">Prezzo</label>
      <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}">
    </div>
    <div class="form-group">
      <label for="type">Serie</label>
      <input type="text" class="form-control" id="type" name="type" value="{{ $comic->series }}">
    </div>
    <div class="form-group">
      <label for="sale_date">Data di uscita</label>
      <input type="text" class="form-control" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}">
    </div>
    <div class="form-group">
      <label for="artists">Artisti</label>
      <input type="text" class="form-control" id="artists" name="artists" value="{{ $comic->artists }}">
    </div>
    <div class="form-group">
      <label for="writers">Scrittori</label>
      <input type="text" class="form-control" id="writers" name="writers" value="{{ $comic->writers }}">
    </div>
    <button type="submit" class="btn btn-primary">Salva modifiche</button>
  </form>
</div>

@endsection