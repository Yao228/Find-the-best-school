@extends('layouts.frontend')

@section('content')
<section class="padding-bottom-50 padding-top-50">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">

                     <!-- Section -->
         <div class="add-listing-section">

            <!-- Headline -->
            <div class="add-listing-headline">
                <h3><i class="sl sl-icon-login"></i>{{ __('Modifier le mot de passe') }}</h3>
            </div>
        
            <div class="sign-in-form style-1">
    
                <div class="tabs-container alt">
    
                    <!-- Login -->
                    <div class="tab-content" id="tab1" style="display: none;">
                        
                    </div>
                    <form method="POST" action="{{ route('password.update') }}">
                            @csrf
    
                            <input type="hidden" name="token" value="{{ $token }}">
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
    
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
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="button">
                                        {{ __('Modifier') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
            <!-- Sign In Popup / End -->  
        </div>
    </div>
</div>
</section>
@endsection
