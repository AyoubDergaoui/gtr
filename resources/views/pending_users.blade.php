@extends('layouts.app')

@section('content')
  <div class="container">
    <h2 class="mb-4">Utilisateurs en attente d'approbation</h2>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
        <tr>
          <th scope="col">Matricule</th>
          <th scope="col">Nom</th>
          <th scope="col">Email</th>
          <th scope="col">Centre</th>
          <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
          <tr>
            <th scope="row">{{ $user->mat }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->centre }}</td>
            <td>
              <button
                class="btn btn-success"
                onclick="if(confirm('Voulez-vous vraiment accepter {{ $user->name }}?')) document.getElementById('accept-user-{{ $user->id }}').submit();"
              ><i class="fas fa-check"></i></button>

              <button
                class="btn btn-danger"
                onclick="if(confirm('Voulez-vous vraiment rejeter {{ $user->name }}?')) document.getElementById('delete-user-{{ $user->id }}').submit();"
              ><i class="fas fa-times"></i></button>

              <form method="post" action="{{ route("accept_user", $user->id) }}" id="accept-user-{{ $user->id }}" style="display: none;">
                @csrf
              </form>
              <form method="post" action="{{ route("reject_user", $user->id) }}" id="delete-user-{{ $user->id }}" style="display: none;">
                @csrf
                @method("DELETE")
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center text-secondary">Pas d'utilisateurs</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
