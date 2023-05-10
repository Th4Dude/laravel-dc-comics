@extends('layout.app')

@section('page.main')

<div class="container">

<table>
    <thead>
      <tr>
        <th scope="col">Titolo</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Uscita</th>
        <th scope="col">Dettaglio</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($comics as $comic)
    <tr>
        <td>{{ $comic->title}}</td>
        <td>{{ $comic->price}}$</td>
        <td>{{ $comic->sale_date}}</td>
    </tr>  
    @endforeach
    </tbody>
    </table>
    
</div>

@endsection