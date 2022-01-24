@extends('index')
@section('section')
Profil de l'utilisateur
<table class="table table-striped">
    <tr><th>Nom</th><td>{{ $user->name }}</td><th>Mail</th><td>{{ $user->email }}</td></tr>
    <tr><th>Livres proposés : </th><td>
    <ul>
    @foreach ($user->livres as $livre)
    <li>{{ $livre->titre }}</li>
    @endforeach    
    </ul>
    </td></tr>
</table>
@stop