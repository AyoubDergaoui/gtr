@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      <div class="form-group row">
                        <label for="mat" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de matricule') }}</label>

                        <div class="col-md-6">
                          <input id="mat" type="text" class="form-control @error('mat') is-invalid @enderror" name="mat" value="{{ old('mat') }}" required>

                          @error('mat')
                          <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="centre" class="col-md-4 col-form-label text-md-right">{{ __('Centre') }}</label>

                        <div class="col-md-6">
                          <select name="centre" id="centre" class="form-control @error('centre') is-invalid @enderror" required>
                            <option value="-1" disabled {{ empty(old('centre')) || old('centre') == "-1" ? "selected" : "" }}>Séléctionner votre centre</option>
                            <option value="Agadir" {{ old('centre') === "Agadir" ? "selected" : "" }}>Agadir</option>
                            <option value="Casablanca" {{ old('centre') === "Casablanca" ? "selected" : "" }}>Casablanca</option>
                            <option value="Fes" {{ old('centre') === "Fes" ? "selected" : "" }}>Fes</option>
                            <option value="Rabat" {{ old('centre') === "Rabat" ? "selected" : "" }}>Rabat</option>
                            <option value="Tanger" {{ old('centre') === "Tanger" ? "selected" : "" }}>Tanger</option>
                          </select>
                          @error('centre')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
