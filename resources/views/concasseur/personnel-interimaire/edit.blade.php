@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Modifier une entrée</h1>
    <form action="{{ route("concasseur.personnel-interimaire.update", $entry->id) }}" method="post">
      @csrf
      @method('PUT')
      <h2 class="mb-4 mt-3">{{ $entry->personnel_nom . ' ' . $entry->personnel_prenom }}</h2>
      <input type="hidden" name="personnel" value="{{ $entry->personnel_id }}">
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="should_copy" name="should_copy" value="true">
              <label class="custom-control-label" for="should_copy">Copier le PU et l'unité du personnel</label>
            </div>
          </div>
        </div>
      </div>

      <div class="row personnel_info">
        <div class="col">
          <div class="form-group">
            <label for="PU">PU</label>
            <input
              type="number"
              step="0.01"
              class="form-control"
              id="personnel_PU"
              name="personnel_PU"
              value="{{ $entry->personnel_PU }}">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="unite">Unité</label>
            <select class="form-control" id="personnel_unite" name="personnel_unite">
              <option value="none" disabled>Séléctionner</option>
              <option value="J" {{ $entry->personnel_unite === "J" ? "selected" : "" }}>Jour</option>
              <option value="H" {{ $entry->personnel_unite === "H" ? "selected" : "" }}>Heure</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $entry->date }}">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="heures">Heures</label>
            <input
              type="number"
              step="0.01"
              class="form-control"
              id="heures"
              placeholder="Heures"
              value="{{ $entry->heures }}"
              name="heures">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="atelier">Atelier</label>
            <select class="form-control" id="atelier" name="atelier">
              <option value="none" disabled>Séléctionner</option>
              <option value="STM1" {{ $entry->atelier === "STM1" ? "selected" : ""}}>STM1</option>
              <option value="STM2" {{ $entry->atelier === "STM2" ? "selected" : ""}}>STM2</option>
            </select>
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
      $('#should_copy').change(function () {
        if (!this.checked) {
          $('.personnel_info').slideDown();
        } else {
          $('.personnel_info').slideUp();
        }
      });
    })();
  </script>
@endsection
