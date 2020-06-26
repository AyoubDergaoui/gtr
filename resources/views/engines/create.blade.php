@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Ajouter engin</h1>
    <form action="{{ route("engins.store") }}" method="post">
      @csrf
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="matricule">Matricule</label>
            <input type="text" class="form-control" id="matricule" placeholder="Matricule" name="matricule">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
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
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="is_location" name="is_location" value="true" checked>
              <label class="custom-control-label" for="is_location">Engin de location</label>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="fournisseur_container">
        <div class="col">
          <div class="form-group">
            <label for="fournisseur">Fournisseur</label>
            <input type="text" class="form-control" id="fournisseur" placeholder="Fournisseur" name="fournisseur">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Ajouter</button>
    </form>
  </div>
@endsection


@section('footer')
  <script>
    (function () {

      $('#is_location').change(function () {
        if (this.checked) {
          $('#fournisseur_container').slideDown();
        } else {
          $('#fournisseur_container').slideUp();
        }
      });


    })();
  </script>
@endsection
