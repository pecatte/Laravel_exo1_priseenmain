@extends('index')
@section('section')
<h2>Liste des livres</h2> 
<table class="table table-striped">
    <thead>
        <tr><th>Titre</th><th>Categorie</th><th>Proposé par</th></tr>
    </thead>
    @foreach ($livres as $livre)
    <tr>
     <td><a href="livredetail?id={{ $livre->id}}">{{ $livre->titre }}</a></td><td>{{ $livre->categorie ? $livre->categorie->libelle : "" }}</td><td><a class="btn btn-secondary" href="proposepar?id={{ $livre->user->id}}">{{ $livre->user->name }}</a></td>
    </tr>
    @endforeach
</table>
@stop