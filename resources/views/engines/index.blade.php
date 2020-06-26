@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Tous les engins</h1>
    <a href="{{ route("engins.create") }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Ajouter engin</a>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
        <tr>
          <th scope="col">Matricule</th>
          <th scope="col">Nom</th>
          <th scope="col">PU</th>
          <th scope="col">Unité</th>
          <th scope="col">Fournisseur</th>
          <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($engines as $engine)
          <tr>
            <th scope="row">{{ $engine->matricule }}</th>
            <td>{{ $engine->nom }}</td>
            <td>{{ $engine->PU }}</td>
            <td>{{ ["J" => "Jour", "H" => "Heure"][$engine->unite] }}</td>
            <td>{{ $engine->fournisseur }}</td>
            <td>
              <a href="{{ route("engins.edit", $engine->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
              <button class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer {{ $engine->nom }}?')) document.getElementById('delete-engine-{{ $engine->id }}').submit();"><i class="fas fa-trash"></i></button>
              <form method="post" action="{{ route("engins.destroy", $engine->id) }}" id="delete-engine-{{ $engine->id }}" style="display: none;">
                @csrf
                @method("DELETE")
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center text-secondary">Pas d'engins</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
