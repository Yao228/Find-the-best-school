
@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="add-listing-section">
        <!-- Headline -->
        <div class="add-listing-headline">
            <h3>{!! isset($ville) ? '<i class="sl sl-icon-note"></i> Modifier ce ville' : "<i class='sl sl-icon-plus'></i> Ajout de ville d'écoles" !!} </h3>
        </div>

        @include('partials.errors')
        
        <form action="{{ isset($ville) ? route('villes.update', $ville->id) : route('villes.store') }}" method="POST">
            
            @csrf

            @if( isset($ville))
                @method('PUT')
            @endif
            <!-- Title -->
            <div class="row with-forms">
                <div class="col-md-12">
                    <h5>Nom <i class="tip" data-tip-content="Nom du ville">
                        <div class="tip-content">Nom de la ville</div></i></h5>
                    <input class="search-field" name="name" ville="text" value="{{ isset($ville)? $ville->name : '' }}" placeholder="Nom de la ville">
                </div>
            </div>
            <button type="submit" class="button preview">
                {{ isset($ville) ? 'Modifiez' : 'Ajoutez '}}
                <i class="fa fa-arrow-circle-right"></i>
            </button>
        </form>
       
    </div>
</div>
@endsection
