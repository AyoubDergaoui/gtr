@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Tous les personnels</h1>
    <a href="{{ route("personnels.create") }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Ajouter personnel</a>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
        <tr>
          <th scope="col">Matricule</th>
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>
          <th scope="col">Contrat</th>
          <th scope="col">Début</th>
          <th scope="col">Fin</th>
          <th scope="col">PU</th>
          <th scope="col">Unité</th>
          <th scope="col">Désignation</th>
          <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($personnels as $personnel)
          <tr>
            <th scope="row">{{ $personnel->matricule }}</th>
            <td>{{ $personnel->nom }}</td>
            <td>{{ $personnel->prenom }}</td>
            <td>{{ $personnel->contrat }}</td>
            <td>{{ ($personnel->debut != "") ? $personnel->debut : "N/A" }}</td>
            <td>{{ ($personnel->fin != "") ? $personnel->fin : "N/A" }}</td>
            <td>{{ $personnel->PU }}</td>
            <td>{{ ["J" => "Jour", "H" => "Heure"][$personnel->unite] }}</td>
            <td>{{ $personnel->designation }}</td>
            <td>
              <a href="{{ route("personnels.edit", $personnel->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
              <button class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer {{ $personnel->nom . ' ' . $personnel->prenom }}?')) document.getElementById('delete-personnel-{{ $personnel->id }}').submit();"><i class="fas fa-trash"></i></button>
              <form method="post" action="{{ route("personnels.destroy", $personnel->id) }}" id="delete-personnel-{{ $personnel->id }}" style="display: none;">
                @csrf
                @method("DELETE")
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="10" class="text-center text-secondary">Pas de personnels</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
