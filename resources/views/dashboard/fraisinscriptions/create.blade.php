@extends('layouts.dashboard')

@section('content')
   <!-- Section -->
   <div class="add-listing-section margin-top-45">
						
    <!-- Headline -->
    <div class="add-listing-headline">
        <h3><i class="sl sl-icon-book-open"></i> Ajoutez un frais d'inscription</h3>
        <!-- Switcher -->
        {{-- <label class="switch"><input type="checkbox" checked><span class="slider round"></span></label> --}}
    </div>
    @include('partials.errors')
    <!-- Switcher ON-OFF Content -->

    @if ($schools->count() > 0)
    <form action="{{ route('fraisinscriptions.store')}}" method="POST">	
    @csrf	
    <div class="row">
        <div class="col-md-12">
            <table id="frais-list-container">
                <tr class="frais-list-item pattern">
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
                        <div class="fm-input frais-name">
                        <div class="fm-input"><input type="text" name="niveau_etude[]" value="" placeholder="Saisissez le niveau d'étude" required/></div>
                        </div>
                        <div class="fm-input frais-price"><input type="text" name="frais[]" value="" placeholder="Montant du frais d'inscription" data-frais="F CFA" required /></div>
                        </div>
                        <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
                    </td>
                </tr>
            </table>
            <a href="#" class="button add-frais-list-item">Ajoutez d'autre</a>
        </div>
    </div>
    <button class="button preview" type="submit">Ajoutez<i class="fa fa-arrow-circle-right"></i></button>
</form>	
@else
<p class="text-center">Vous devez ajouter une école avant d'ajouter une frais d'inscription. <a class="button" href="{{ route('schools.create') }}">Ajouter une école</a>  </p>
@endif	
<!-- Switcher ON-OFF Content / End -->

</div>
<!-- Section / End -->
@endsection
