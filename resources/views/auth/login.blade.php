@extends('layouts.frontend')

@section('title')
Écoles Togo | Connexion
@endsection
@section('content')

{{-- <div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="{{route('frontend')}}">Accueil</a></li>
                        <li>Connexion</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div> --}}
<section class="padding-bottom-50 padding-top-50">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {{-- <h3 class="text-center">Connectez-vous</h3> --}}

        <!--Tabs -->
         <!-- Section -->
         <div class="add-listing-section">

        <!-- Headline -->
        <div class="add-listing-headline">
            <h3><i class="sl sl-icon-login"></i>Connexion</h3>
        </div>
        <div class="notification notice large closeable margin-bottom-55">
            <h4>Avez-vous un compte ? 🙂</h4>
            <p>Avant d'ajouter une école vous devez vous connecter.</p> 
            <p>Si vous n'avez pas de compte, créez pour poursuivre l'ajout de votre école.</p>
            <a class="close" href="#"></a>
        </div>

        <div class="sign-in-form style-1">

            <ul class="tabs-nav">
                <li class=""><a href="#tab1">{{ __('Se connecter') }}</a></li>
                <li><a href="#tab2">{{ __('Créer un compte') }}</a></li>
            </ul>

            <div class="tabs-container alt">

                <!-- Login -->
                <div class="tab-content" id="tab1" style="display: none;">
                     {{-- Login avec les réseaux sociaux --}}
                     <div class="form-row text-center">
                        <a href="{{url('/redirect/google')}}" class="button google"> <i class="fa fa-google"></i> Connexion Google</a> 
                        <a href="{{url('/redirect/facebook')}}" class="button login-facebook"><i class="fa fa-facebook-square"></i>Connexion Facebook</a>								
                        <hr>
                    </div>
                    <form action="{{ route('login') }}" method="POST" class="login">
                        @csrf
                        <p class="form-row form-row-wide">
                            <label for="username">{{ __('Votre adresse mail') }}
                                <i class="im im-icon-Male"></i>
                                <input type="text" class="input-text @error('email') is-invalid @enderror" name="email" id="username" value="{{ old('email') }}" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="password">{{ __('Mot de passe :') }}
                                <i class="im im-icon-Lock-2"></i>
                                <input class="input-text  @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" id="password"/>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </label>
                            @if (Route::has('password.request'))
                            <span class="lost_password">
                                <a href="{{ route('password.request') }}">{{ __('Mot de passe oublié ?') }}</a>
                            </span>
                                @endif	
                        </p>

                        <div class="form-row">
                            <button class="button" type="submit">{{ __('Se connecter') }}</button>
                            <div class="checkboxes margin-top-10">
                                <input id="remember-me" type="checkbox" name="check">
                                <label for="remember-me">{{ __('Se souvenir de moi') }}</label>										
                            </div>
                        </div>
                       
                        
                    </form>
                </div>

                <!-- Register -->
                <div class="tab-content" id="tab2" style="display: none;">
                    <div class="form-row text-center">
                        <a href="{{url('/redirect/google')}}" class="button google"> <i class="fa fa-google"></i> Connexion Google</a> 
                        <a href="{{url('/redirect/facebook')}}" class="button login-facebook"><i class="fa fa-facebook-square"></i>Connexion Facebook</a>															
                        <hr>
                    </div>
                    <form action="{{ route('register') }}" method="POST" class="register">
                        @csrf
                        
                    <p class="form-row form-row-wide">
                        <label for="username2">{{ __('Votre nom complet :') }}
                            <i class="im im-icon-Male"></i>
                            <input type="text" class="input-text @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                        </label>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </p>
                        
                    <p class="form-row form-row-wide">
                        <label for="email2">{{ __('Adresse mail :') }}
                            <i class="im im-icon-Mail"></i>
                            <input type="text" class="input-text @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email"/>
                        </label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="password1">{{ __('Mot de passe') }}
                            <i class="im im-icon-Lock-2"></i>
                            <input class="input-text @error('password') is-invalid @enderror" type="password" name="password" id="password" required autocomplete="new-password"/>
                        </label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="password2">{{ __('Confirmez votre mot de passe') }}
                            <i class="im im-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password_confirmation" id="password-confirmation" required autocomplete="new-password"/>
                        </label>
                    </p>

                    <button type="submit" class="button">
                        {{ __('S\'enrégistrer') }}
                    </button>
                    
                    </form>
                </div>

            </div>
        </div>
    <!-- Sign In Popup / End -->
        </div>
        
        </div>

    </div>
</div>
</section>
    
@endsection