@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Ajouter personnel</h1>
    <form action="{{ route("personnels.store") }}" method="post">
      @csrf
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="matricule">Matricule</label>
            <input type="text" class="form-control" id="matricule" placeholder="Matricule" name="matricule">
          </div>
        </div>
        <div class="col">
          <label for="contrat">Contrat</label>
          <select class="form-control" id="contrat" name="contrat">
            <option value="none" selected disabled>Séléctionner</option>
            <option value="GTR">GTR</option>
            <option value="Adecco">Adecco</option>
            <option value="Tectra">Tectra</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="debut">Début</label>
            <input type="date" class="form-control" id="debut" placeholder="Début" name="debut">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="fin">Fin</label>
            <input type="date" class="form-control" id="fin" placeholder="Fin" name="fin">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="PU">PU</label>
            <input type="number" step="0.01" class="form-control" id="PU" placeholder="PU" name="PU">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="unite">Unité</label>
            <select class="form-control" id="unite" name="unite">
              <option value="none" selected disabled>Séléctionner</option>
              <option value="J">Jour</option>
              <option value="H">Heure</option>
            </select>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="designation">Désignation</label>
            <input type="text" class="form-control" id="designation" placeholder="Désignation" name="designation">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Ajouter</button>
    </form>
  </div>
@endsection
