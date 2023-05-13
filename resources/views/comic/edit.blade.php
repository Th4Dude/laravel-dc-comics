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

{{-- Window errors on top  --}}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <a class="close" data-dismiss="alert" href="#" onclick="closeAlert()">×</a>
    </div>
@endif

{{-- Window errors on top  --}}

<div class="container">
  <form action="{{ route('comics.update', $comic->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">

      <div class="form-group">
        <label for="thumb">Immagine</label>
        <input type="text" class="form-control" id="thumb" name="thumb" value="{{ old('thumb'), $comic->thumb }}">
      </div>
      <div class="form-group">
        <label for="description">Descrizione</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description'), $comic->description }}</textarea>
      </div>
      <label for="title">Titolo</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ old('title'), $comic->title }}">
    </div>
    <div class="form-group">
      <label for="price">Prezzo</label>
      <input type="number" class="form-control" id="price" name="price" min="5" max="20" value="{{ old('price'), $comic->price }}">
    </div>
    <div class="form-group">
      <label for="type">Serie</label>
      <input type="text" class="form-control" id="series" name="series" value="{{ old('series'), $comic->series }}">
    </div>
    <div class="form-group">
      <label for="sale_date">Data di uscita</label>
      <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ old('sale_date'), $comic->sale_date }}">
    </div>
    <div class="mb-3">
      <label for="serie" class="form-label">Genere</label>
      <input type="text" class="form-control" id="type" name="type" value="{{ old('type'), $comic->type }}">
  </div>
    <div class="form-group">
      <label for="artists">Artisti</label>
      <input type="text" class="form-control" id="artists" name="artists" value="{{ old('artists'), $comic->artists }}">
    </div>
    <div class="form-group">
      <label for="writers">Scrittori</label>
      <input type="text" class="form-control" id="writers" name="writers" value="{{ old('writers'), $comic->writers }}">
    </div>
    <button type="submit" class="btn btn-primary">Salva modifiche</button>
  </form>
</div>

@endsection


<script>
  // Funzione per chiudere la finestra
  function closeAlert() {
    document.querySelector('.alert').style.display = 'none';
  }
</script>