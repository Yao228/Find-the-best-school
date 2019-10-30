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
                <h3><i class="sl sl-icon-login"></i>Modifiez votre mot de passe</h3>
            </div>
            
                <div class="sign-in-form style-1">
        
                    <div class="tabs-container alt">
        
                        <!-- Login -->
                        <div class="tab-content" id="tab1" style="display: none;">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <form method="POST" action="{{ route('password.email') }}">
                                @csrf
        
                                <p class="form-row form-row-wide">
                                    <label for="username">{{ __('Votre adresse e-mail') }}
                                        <i class="im im-icon-Email"></i>
                                        <input id="email" type="email" class="input-text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </label>
                                </p>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="button">
                                            {{ __('M\'envoyer le lien de modification') }}
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
