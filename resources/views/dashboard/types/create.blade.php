
@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="add-listing-section">
        <!-- Headline -->
        <div class="add-listing-headline">
            <h3>{!! isset($type) ? '<i class="sl sl-icon-note"></i> Modifier ce type' : "<i class='sl sl-icon-plus'></i> Ajout de type d'écoles" !!} </h3>
        </div>

        @include('partials.errors')
        
        <form action="{{ isset($type) ? route('types.update', $type) : route('types.store') }}" method="POST">
            
            @csrf

            @if( isset($type))
                @method('PUT')
            @endif
            <!-- Title -->
            <div class="row with-forms">
                <div class="col-md-12">
                    <h5>Nom <i class="tip" data-tip-content="Nom du type">
                        <div class="tip-content">Nom du type</div></i></h5>
                    <input class="search-field" name="name" type="text" value="{{ isset($type)? $type->name : '' }}" placeholder="Nom du type d'école">
                </div>
            </div>
            <button type="submit" class="button preview">
                {{ isset($type) ? 'Modifiez' : 'Ajoutez '}}
                <i class="fa fa-arrow-circle-right"></i>
            </button>
        </form>
       
    </div>
</div>
@endsection
