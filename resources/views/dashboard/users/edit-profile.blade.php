@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="add-listing-section">
        <!-- Headline -->
        <div class="add-listing-headline">
            <h3>Modifiez votre profile</h3>
        </div>

        @include('partials.errors')
        
        <form action="{{ route('users.update-profile') }}" method="POST">
            
            @csrf
            
            @method('PUT')

            <!-- Title -->
            <div class="row with-forms">
                <div class="col-md-12">
                    <h5>Nom <i class="tip" data-tip-content="Votre nom">
                        <div class="tip-content">Votre nom</div></i></h5>
                    <input class="search-field" name="name" type="text" value="{{ $user->name }}" placeholder="Nom du type d'école">
                </div>
                <div class="col-md-12">
                    <h5>Présentation <i class="tip" data-tip-content="Votre présentation par rapport à l'école"></i></h5>
                    <textarea class="WYSIWYG" name="about" cols="40" rows="3" id="about" spellcheck="true">{{ $user->about }}</textarea>
                    </div>
            </div>
            <button type="submit" class="button preview">
               Modifiez
                <i class="fa fa-arrow-circle-right"></i>
            </button>
        </form>
       
    </div>
</div>
@endsection