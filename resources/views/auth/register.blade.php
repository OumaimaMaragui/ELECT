@extends('layouts.app')

@section('content')
<div >
    <br>
    <div class="row justify-content-between w-100">
        <div class="col-md-3">
            <br><br>
            <img src="{{asset('img/login.jpg')}}" alt="">
        </div>
        <div class="col-md-6">
            <h3 class="text-center mb-5">Rejoingez la famille ELECT !</h3>
            <div class="card">
                <div class="card-body py-5 px-0">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('prenom') }}</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cin" class="col-md-4 col-form-label text-md-right">{{ __('cin') }}</label>

                            <div class="col-md-6">
                                <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror" name="cin" value="{{ old('cin') }}" required autocomplete="cin" autofocus>

                                @error('cin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="compteur" class="col-md-4 col-form-label text-md-right">{{ __('Numéro du compteur') }}</label>

                            <div class="col-md-6">
                                <input id="compteur" type="text" class="form-control @error('compteur') is-invalid @enderror" name="compteur" value="{{ old('compteur') }}" required autocomplete="compteur" autofocus>

                                @error('compteur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
 
                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('telephone') }}</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('ville') }}</label>

                            <div class="col-md-6">
                                <select id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville" autofocus>
                                    <option value="temara">Temara</option>
                                    <option value="fes">Fès</option>
                                    <option value="casablanca">Casablanca</option>
                                    <option value="rabat">Rabat</option>
                                    <option value="marrakech">Marrakech</option>
                                    <option value="tanger">Tanger</option>
                                    <option value="tetouan">Tetouan</option>
                                    <option value="Meknes">Meknes</option>
                                  </select>

                                @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rue" class="col-md-4 col-form-label text-md-right">{{ __('rue') }}</label>

                            <div class="col-md-6">
                                <input id="rue" type="text" class="form-control @error('rue') is-invalid @enderror" name="rue" value="{{ old('rue') }}" required autocomplete="rue" autofocus>

                                @error('rue')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="abonnement" class="col-md-4 col-form-label text-md-right">{{ __("Type d'abonnement") }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="exampleFormControlSelect1" @error('abonnement') is-invalid @enderror name="abonnement" value="{{ old('abonnement') }}" required autocomplete="abonnement" autofocus>
                                    <option value="residentiel">Résidentiel</option>
                                    <option value="professionnel">Professionnel</option>
                                  </select>
                                @error('abonnement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="client" class="col-md-4 col-form-label text-md-right">{{ __("Type client") }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="exampleFormControlSelect1" @error('client') is-invalid @enderror name="client" value="{{ old('client') }}" required autocomplete="client" autofocus>
                                    <option value="particulier">Particulier</option>
                                    <option value="administration">Administration</option>
                                    <option value="grande">Entreprise (Grande)</option>
                                    <option value="moyenne">Entreprise (Moyenne)</option>
                                    <option value="petite">Entreprise (Petite)</option>
                                  </select>
                                @error('client')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse Email') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer MotdePasse') }}</label>

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
