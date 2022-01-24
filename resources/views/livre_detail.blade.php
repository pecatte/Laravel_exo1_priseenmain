@extends('index')
@section('section')
<h2>Détail sur un livre</h2>
<table class="table table-striped">
    <tr><th>Titre</th><td>{{ $livre->titre }}</td></tr>
    <tr><th>Résumé</th><td>{{ $livre->resume }}</td></tr>
    <tr><th>Prix</th><td>{{ $livre->prix }}</td></tr>
    <tr><th>Categorie</th><td>{{ $livre->categorie ? $livre->categorie->libelle : "" }}</td></tr>
    <tr><th>Image</th><td><img src="" alt="{{ $livre->titre }}"/></td></tr>  
</table>
@stop