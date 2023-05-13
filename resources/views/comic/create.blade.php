@extends('layout.app')

@section('page.up_title')
Creazione
@endsection

@section('page.title')
<div class="container">
  <h1>Inserisci i dati</h1>
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
    <a href="{{ route('comics.index') }}" class="btn btn-primary btn-sm">Torna all'elenco</a>

    <form action="{{ route('comics.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="src" class="form-label">Immagine</label>
          <input type="text" class="form-control" id="src" name="thumb" value="{{ old('thumb') }}"> 
        </div>

        <div class="mb-3">
            <label for="descrizione" class="form-label">Descrizione</label>
            <textarea class="form-control" id="descrizione" rows="2" name="description" value="{{ old('description') }}"></textarea>
        </div>
        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="titolo" name="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="prezzo" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="prezzo" name="price" min="5" max="20" value="{{ old('price') }}">
        </div>
        <div class="mb-3">
            <label for="serie" class="form-label">Serie</label>
            <input type="text" class="form-control" id="serie" name="series" value="{{ old('series') }}">
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data di uscita</label>
            <input type="date" class="form-control" id="data" name="sale_date" value="{{ old('sale_date') }}">
        </div>
        <div class="mb-3">
            <label for="serie" class="form-label">Genere</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}">
        </div>
        <div class="mb-3">
            <label for="artists" class="form-label">Artisti</label>
            <textarea class="form-control" id="artists" rows="2" name="artists">{{ old('artists') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="writers" class="form-label">Scrittori</label>
            <textarea class="form-control" id="writers" rows="2" name="writers">{{ old('writers') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>  

@endsection



<script>
    // Funzione per chiudere la finestra
    function closeAlert() {
      document.querySelector('.alert').style.display = 'none';
    }
  </script>