@extends('index')
@section('section')
<h2>Mes livres</h2> 
<table class="table table-striped">
    <thead>
        <tr><th>Titre</th><th>Prix</th><th>Resumé</th></tr>
    </thead>
    @foreach ($livres as $livre)
    <tr>
     <td>{{ $livre->titre }}</td><td>{{ $livre->prix }}</td><td>{{ $livre->resume }}</td><td><a class="btn btn-primary" href="modifier?idlivre={{ $livre->id }}">Modifier</a></td><td><a class="btn btn-primary" href="supprimer?idlivre={{ $livre->id }}">Supprimer</a></td>
    </tr>
    @endforeach
</table>
@stop