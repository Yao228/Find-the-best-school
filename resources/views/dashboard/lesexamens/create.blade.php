
@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="add-listing-section">
        <!-- Headline -->
        <div class="add-listing-headline">
            <h3>{!! isset($lesexamen) ? '<i class="sl sl-icon-note"></i> Modifiez cet examen' : "<i class='sl sl-icon-plus'></i> Ajoutez un examen " !!} </h3>
        </div>

        @include('partials.errors')
        
        <form action="{{ isset($lesexamen) ? route('lesexamens.update', $lesexamen->id) : route('lesexamens.store') }}" method="POST">
            
            @csrf

            @if( isset($lesexamen))
                @method('PUT')
            @endif
            <!-- Title -->
            <div class="row with-forms">
                <div class="col-md-12">
                    <h5>Nom <i class="tip" data-tip-content="Nom de l'examen">
                        <div class="tip-content">Nom</div></i></h5>
                    <input class="search-field" name="name" type="text" value="{{ isset($lesexamen)? $lesexamen->name : '' }}" placeholder="Nom de l'examen">
                </div>
            </div>
            <button type="submit" class="button preview">
                {{ isset($lesexamen) ? 'Modifiez' : 'Ajoutez '}}
                <i class="fa fa-arrow-circle-right"></i>
            </button>
        </form>
       
    </div>
</div>
@endsection
