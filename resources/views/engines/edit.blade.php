@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Modifier engin</h1>
    <form action="{{ route("engins.update", $engin->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="matricule">Matricule</label>
            <input type="text" class="form-control" id="matricule" placeholder="Matricule" name="matricule" value="{{ $engin->matricule }}">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom" value="{{ $engin->nom }}">
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="PU">PU</label>
            <input type="number" step="0.01" class="form-control" id="PU" placeholder="PU" name="PU" value="{{ $engin->PU }}">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="unite">Unité</label>
            <select class="form-control" id="unite" name="unite">
              <option value="none" disabled>Séléctionner</option>
              <option value="J" {{ $engin->unite === "J" ? "selected" : "" }}>Jour</option>
              <option value="H" {{ $engin->unite === "H" ? "selected" : "" }}>Heure</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="is_location" name="is_location" value="true" {{ $engin->fournisseur === "GM" ? "": "checked" }}>
              <label class="custom-control-label" for="is_location">Engin de location</label>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="fournisseur_container" @if($engin->fournisseur === "GM")style="display: none;"@endif>
        <div class="col">
          <div class="form-group">
            <label for="fournisseur">Fournisseur</label>
            <input type="text" class="form-control" id="fournisseur" placeholder="Fournisseur" name="fournisseur">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Modifier</button>
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
