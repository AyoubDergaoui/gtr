@extends('layouts.app')

@section('content')
{{--  <div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--      <div class="col-md-8">--}}
{{--        <div class="card">--}}
{{--          <div class="card-header">Dashboard</div>--}}

{{--          <div class="card-body">--}}
{{--            @if (session('status'))--}}
{{--              <div class="alert alert-success" role="alert">--}}
{{--                {{ session('status') }}--}}
{{--              </div>--}}
{{--            @endif--}}

{{--            You are logged in!--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-10 mx-auto">
        <div class="home-card">
          <ul>
            <li><a href="{{ route('concasseur') }}"><div class="home-icon text-danger"><i class="fas fa-memory"></i></div> Atelier Concasseur</a></li>
            <li><a href="#"><div class="home-icon text-warning"><i class="fas fa-flask"></i></div>  Atelier Centrale à béton</a></li>
            <li><a href="#"><div class="home-icon text-dark"><i class="fas fa-road"></i></div>  Atelier Post d'enrobé</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
