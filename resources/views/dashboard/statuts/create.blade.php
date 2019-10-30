
@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="add-listing-section">
        <!-- Headline -->
        <div class="add-listing-headline">
            <h3>{!! isset($statut) ? '<i class="sl sl-icon-note"></i> Modifier ce statut' : "<i class='sl sl-icon-plus'></i> Ajout de statut d'écoles" !!} </h3>
        </div>

        @include('partials.errors')
        
        <form action="{{ isset($statut) ? route('statuts.update', $statut) : route('statuts.store') }}" method="POST">
            
            @csrf

            @if( isset($statut))
                @method('PUT')
            @endif
            <!-- Title -->
            <div class="row with-forms">
                <div class="col-md-12">
                    <h5>Nom <i class="tip" data-tip-content="Nom du statut">
                        <div class="tip-content">Nom du statut</div></i></h5>
                    <input class="search-field" name="name" type="text" value="{{ isset($statut)? $statut->name : '' }}" placeholder="Nom du statut">
                </div>
            </div>
            <button type="submit" class="button preview">
                {{ isset($statut) ? 'Modifiez' : 'Ajoutez '}}
                <i class="fa fa-arrow-circle-right"></i>
            </button>
        </form>
       
    </div>
</div>
@endsection
