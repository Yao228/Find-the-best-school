
@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="add-listing-section">
        <!-- Headline -->
        <div class="add-listing-headline">
            <h3><i class='sl sl-icon-plus'></i> Ajoutez les images pour la galerie</h3>
        </div>

        @include('partials.errors')
        @if ($schools->count() > 0)
        
        <form action="{{ route('galeries.store') }}" method="POST" enctype="multipart/form-data">
            
            @csrf
             <!-- Dropzone -->
            <div class="row with-forms">
                <div class="col-md-3">
                    <h5>Choisissez l'école associée<i class="tip" data-tip-content="Vous devez choisir d'abord l'école associée"></i></h5>
                  
                    <select name="school_id" data-placeholder="Choisissez votre école" class="mon-select">
                        @foreach ($schools as $school)
                        <option value="{{ $school->id }}">
                            {{ $school->name }}
                        </option>
                        @endforeach	
                    </select>
                                           
                </div>
                <div class="col-md-9 offset-md-2">
                    <h5>Photos pour votre galerie<i class="tip" data-tip-content="Télécharger des images de votre établissement pour votre galerie"></i> </h5>
                    <span class="btn btn-default btn-file">
                        <input id="galeries" name="galeries[]" type="file" class="file" multiple data-show-upload="true" data-show-caption="true">
                    </span>
                </div>
            </div>            
            <button type="submit" class="button preview">
                Ajoutez
                <i class="fa fa-arrow-circle-right"></i>
            </button>
        </form>
        @else
        <p class="text-center">Vous devez ajouter une école avant d'ajouter une galerie. <a class="button" href="{{ route('schools.create') }}">Ajouter une école</a>  </p>
        @endif   
       
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/fileinput.js')}}"></script>   
@endsection

@section('css')
<link href="{{ asset('css/fileinput.css') }}" rel="stylesheet">
@endsection
