@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Modifier personnel</h1>
    <form action="{{ route("personnels.update", $personnel->id) }}" method="post">
      @csrf
      @method("PUT")
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="matricule">Matricule</label>
            <input type="text" class="form-control" id="matricule" placeholder="Matricule" name="matricule" value="{{ $personnel->matricule }}">
          </div>
        </div>
        <div class="col">
          <label for="contrat">Contrat</label>
          <select class="form-control" id="contrat" name="contrat">
            <option value="none" disabled>Séléctionner</option>
            <option value="GTR" {{ $personnel->contrat === "GTR" ? "selected" : "" }}>GTR</option>
            <option value="Adecco" {{ $personnel->contrat === "Adecco" ? "selected" : "" }}>Adecco</option>
            <option value="Tectra" {{ $personnel->contrat === "Tectra" ? "selected" : "" }}>Tectra</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom" value="{{ $personnel->nom }}">
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom" value="{{ $personnel->prenom }}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="debut">Début</label>
            <input type="date" class="form-control" id="debut" placeholder="Début" name="debut" value="{{ $personnel->debut }}">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="fin">Fin</label>
            <input type="date" class="form-control" id="fin" placeholder="Fin" name="fin" value="{{ $personnel->fin }}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="PU">PU</label>
            <input type="number" step="0.01" class="form-control" id="PU" placeholder="PU" name="PU" value="{{ $personnel->PU }}">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="unite">Unité</label>
            <select class="form-control" id="unite" name="unite">
              <option value="none" disabled>Séléctionner</option>
              <option value="J" {{ $personnel->unite === "J" ? "selected" : "" }}>Jour</option>
              <option value="H" {{ $personnel->unite === "H" ? "selected" : "" }}>Heure</option>
            </select>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="designation">Désignation</label>
            <input type="text" class="form-control" id="designation" placeholder="Désignation" name="designation" value="{{ $personnel->designation }}">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Modifier</button>
    </form>
  </div>
@endsection
