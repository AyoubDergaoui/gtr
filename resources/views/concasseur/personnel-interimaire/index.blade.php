@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Suivi des personnels interimaires</h1>
    <a href="{{ route("concasseur.personnel-interimaire.create") }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i>
      Ajouter une entrée</a>
    <form action="{{ route('concasseur.personnel-interimaire.index') }}" method="get" class="mb-3">
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="from">Du</label>
                <input type="date" name="from" id="from" class="form-control" value="{{ $from }}">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="to">À</label>
                <input type="date" name="to" id="to" class="form-control" value="{{ $to }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="personnel">Personnel</label>
                <select name="personnel" id="personnel">
                  <option value="-1">Tous</option>
                  @foreach($personnels as $p)
                    <option value="{{ $p->id }}" @if($p->id == $personnel) selected @endif >{{ $p->nom . ' ' . $p->prenom }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary btn-block" style="margin-top: 1.8rem;">Filtrer</button>
        </div>
      </div>
    </form>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
        <tr>
          <th scope="col">Matricule</th>
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>
          <th scope="col">PU</th>
          <th scope="col">Unité</th>
          <th scope="col">Heures</th>
          <th scope="col">Date</th>
          <th scope="col">Atelier</th>
          <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($entries as $entry)
          <tr>
            <th scope="row">{{ $entry->personnel_matricule }}</th>
            <td>{{ $entry->personnel_nom }}</td>
            <td>{{ $entry->personnel_prenom }}</td>
            <td>{{ $entry->personnel_PU }}</td>
            <td>{{ ["J" => "Jour", "H" => "Heure"][$entry->personnel_unite] }}</td>

            <td>{{ $entry->heures }}</td>
            <td>{{ $entry->date }}</td>
            <td>{{ $entry->atelier }}</td>
            <td>
              <a href="{{ route("concasseur.personnel-interimaire.edit", $entry->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
              <button class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cette entrée?')) document.getElementById('delete-entry-{{ $entry->id }}').submit();"><i class="fas fa-trash"></i></button>
              <form method="post" action="{{ route("concasseur.personnel-interimaire.destroy", $entry->id) }}" id="delete-entry-{{ $entry->id }}" style="display: none;">
                @csrf
                @method("DELETE")
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="10" class="text-center text-secondary">Pas d'entrées</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection

@section('footer')
  <script>
    (function () {
      $('#personnel').selectize();
    })();
  </script>
@endsection
