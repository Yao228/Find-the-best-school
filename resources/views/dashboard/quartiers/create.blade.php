
@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="add-listing-section">
        <!-- Headline -->
        <div class="add-listing-headline">
            <h3>{!! isset($quartier) ? '<i class="sl sl-icon-note"></i> Modifier ce quartier' : "<i class='sl sl-icon-plus'></i> Ajout de quartier d'écoles" !!} </h3>
        </div>

        @include('partials.errors')
        
        <form action="{{ isset($quartier) ? route('quartiers.update', $quartier->id) : route('quartiers.store') }}" method="POST">
            
            @csrf

            @if( isset($quartier))
                @method('PUT')
            @endif
            <!-- Title -->
            <div class="row with-forms">
                <div class="col-md-6">
                    <h5>Chosissez une ville<i class="tip" data-tip-content="Le quartier que vous voulez ajouter se trouve dans quelle ville ?"></i>  <span>(requis)</span></h5>
                    @if ($villes->count() > 0)
                    <select name="ville" data-placeholder="Sélectionnez une ville" class="chosen-select">
                        <option label="blank"></option>	
                        @foreach ($villes as $ville)
                        <option value="{{ $ville->id }}"
                            @if(isset($quartier))
                            @if($ville->id == $quartier->ville_id)
                                selected
                            @endif
                            @endif
                            >
                            {{ $ville->name }}
                        </option>
                        @endforeach	
                    </select>
                    @endif
                </div>
                <div class="col-md-6">
                    <h5>Nom <i class="tip" data-tip-content="Nom du quartier">
                        <div class="tip-content">Nom du quartier</div></i> <span>(requis)</span></h5>
                    <input class="search-field" name="name" quartier="text" value="{{ isset($quartier) ? $quartier->name : '' }}" placeholder="Nom du quartier">
                </div>
            </div>
            <button type="submit" class="button preview">
                {{ isset($quartier) ? 'Modifiez' : 'Ajoutez '}}
                <i class="fa fa-arrow-circle-right"></i>
            </button>
        </form>
       
    </div>
</div>
@endsection
