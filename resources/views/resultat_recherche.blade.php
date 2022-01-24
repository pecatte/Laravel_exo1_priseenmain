@extends('index')
@section('section')
<h2>Resultat recherche</h2>
@if (count($livres) == 0)
    <p>Pas de livre trouvé</p>
@else 
<table class="table table-striped">
    <thead>
        <tr><th>Titre</th><th>Prix</th><th>Resumé</th></tr>
    </thead>
    @foreach ($livres as $livre)
    <tr>
     <td>{{ $livre->titre }}</td><td>{{ $livre->prix }}</td><td>{{ $livre->resume }}</td>
    </tr>
    @endforeach
</table>
@endif 
@stop