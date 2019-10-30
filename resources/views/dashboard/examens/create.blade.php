
@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="add-listing-section">
        <!-- Headline -->
        <div class="add-listing-headline">
            <h3><i class='sl sl-icon-book-open'></i> Ajoutez le taux de réussite des examens</h3>
        </div>

        @include('partials.errors')
    @if ($schools->count() > 0)   
    <form action="{{ route('examens.store')}}" method="POST">
            @csrf
	<!-- Switcher ON-OFF Content -->					
                <div class="row">
                    <div class="col-md-12">
                        <table id="pricing-list-container">
                            <tr class="pricing-list-item pattern">
                                <td>
                                <div class="fm-input pricing-name">
                                       
                                        <select name="school_id[]" data-placeholder="Choisissez votre école" class="mon-select">
                                            @foreach ($schools as $school)
                                            <option value="{{ $school->id }}">
                                                {{ $school->name }}
                                            </option>
                                            @endforeach	
                                        </select>
                            
                                    </div>
                                    <div class="fm-input pricing-name">
                                        @if ($lesexamens->count() > 0)
                                        <select name="exam_name[]" data-placeholder="Choisissez un examen" class="mon-select" required>
                                            <option label="Type d'examen"></option>	
                                            @foreach ($lesexamens as $lesexamen)
                                            <option value="{{ $lesexamen->name }}">
                                                {{ $lesexamen->name }}
                                            </option>
                                            @endforeach	
                                        </select>
                                        @endif
                                    </div>
                                    <div class="fm-input pricing-ingredients"><input type="text" name="year_exam[]" value="" placeholder="Année de l'examen" required /></div>
                                    <div class="fm-input pricing-price"><input type="text" name="exam_percentage[]" value="" placeholder="Taux d'admis" data-unit="%" required /></div>
                                    <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
                                </td>
                            </tr>
                        </table>
                        <a href="#" class="button add-pricing-list-item">Ajoutez d'autre</a>
                    </div>
                </div>
            <!-- Switcher ON-OFF Content / End -->
        
            <button type="submit" class="button preview">
                Ajoutez
                <i class="fa fa-arrow-circle-right"></i>
            </button>
        </form>           
       @else
           <p class="text-center">Vous devez ajouter une école avant d'ajouter un examen. <a class="button" href="{{ route('schools.create') }}">Ajouter une école</a>  </p>
       @endif
       
    </div>
</div>
@endsection
