@extends('index')
@section('section')
<h3>Modification d'un livre</h3>
<form action="modifier_valid" method="get">
    <div class="mb-3">
      <label for="titre" class="form-label">Titre du livre</label>
      <input type="text" value="{{ $livre->titre }}" class="form-control" id="titre" name="titre" aria-describedby="titre">
    </div>
    <div class="mb-3">
      <label for="resume" class="form-label">Resumé</label>
      <input type="text" value="{{ $livre->resume }}" class="form-control" id="resume" name="resume">
    </div>
    <div class="mb-3">
      <label for="prix" class="form-label">Prix du livre</label>
      <input type="text" value="{{ $livre->prix }}" class="form-control" id="prix" name="prix">
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Catégorie</label>
        <select name="categorie_id" class="form-select">
        @foreach ($categories as $categ)
            <option @if ($categ->id == $livre->categorie_id) selected @endif
            value="{{ $categ->id }}">{{ $categ->libelle }}</option>
        @endforeach    
        </select>
      </div>
    <input type="hidden" value="{{ $livre->id }}" id="idlivre" name="idlivre">

    <button type="submit" class="btn btn-primary">Valider</button>
  </form>
@stop
