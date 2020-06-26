@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Ajouter une entrée</h1>
    <form action="{{ route("concasseur.personnel-interimaire.store") }}" method="post">
      @csrf
      <div class="form-group">
        <label for="personnel">Personnel</label>
        <select class="form-control" size="6" id="personnel" name="personnel">
          @foreach($personnels as $personnel)
            <option value="{{ $personnel->id }}">{{ $personnel->nom . ' ' . $personnel->prenom }}</option>
          @endforeach
        </select>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="heures">Heures</label>
            <input type="number" step="0.01" class="form-control" id="heures" placeholder="Heures" name="heures">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="atelier">Atelier</label>
            <select class="form-control" id="atelier" name="atelier">
              <option value="none" selected disabled>Séléctionner</option>
              <option value="STM1">STM1</option>
              <option value="STM2">STM2</option>
            </select>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Ajouter</button>
    </form>
  </div>
@endsection
