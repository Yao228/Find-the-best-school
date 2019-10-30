@extends('layouts.dashboard')

@section('content')
   <!-- Section -->
   <div class="add-listing-section margin-top-45">
						
    <!-- Headline -->
    <div class="add-listing-headline">
        <h3><i class="sl sl-icon-book-open"></i> Modifiez ce résultat</h3>
        <!-- Switcher -->
        {{-- <label class="switch"><input type="checkbox" checked><span class="slider round"></span></label> --}}
    </div>

    <!-- Switcher ON-OFF Content -->
<form action="{{ route('examens.update', $examen->id)}}" method="POST">	
        @csrf
        @if (isset($examen))
        @method('PUT')
        @endif		
        <div class="row">
            <div class="col-md-12">
                <table id="pricing-list-container">
                    <tr class="pricing-list-item pattern">
                        <td>
                        <div class="fm-input pricing-name">
                            @if ($schools->count() > 0)    
                            <select name="school_id" data-placeholder="Choisissez votre école" class="mon-select">
                                @foreach ($schools as $school)
                                <option value="{{ $school->id }}"
                                    @if(isset($school))
                                    @if($examen->school_id == $school->id)
                                        selected
                                    @endif
                                    @endif
                                    >
                                    {{ $school->name }}
                                </option>
                                @endforeach	
                            </select>
                            @endif
                            </div>
                            <div class="fm-input pricing-name">
                                @if ($lesexamens->count() > 0)
                                <select name="exam_name" data-placeholder="Choisissez un examen" class="mon-select">
                                    <option label="Type d'examen"></option>	
                                    @foreach ($lesexamens as $lesexamen)
                                    <option value="{{ $lesexamen->name }}"
                                        @if(isset($examen))
                                        @if($lesexamen->name == $examen->exam_name)
                                            selected
                                        @endif
                                        @endif
                                        >
                                        {{ $lesexamen->name }}
                                    </option>
                                    @endforeach	
                                </select>
                                @endif
                            </div>
                        <div class="fm-input pricing-ingredients"><input type="text" name="year_exam" value="{{ $examen->year_exam }}" placeholder="Année de l'examen" /></div>
                            <div class="fm-input pricing-price"><input type="text" name="exam_percentage" value="{{ $examen->exam_percentage }}" placeholder="Taux d'admis" data-unit="%" /></div>
                            {{-- <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div> --}}
                        </td>
                    </tr>
                </table>
                {{-- <a href="#" class="button add-pricing-list-item">Ajoutez d'autre</a> --}}
            </div>
        </div>
        <button class="button preview" type="submit">Modifiez<i class="fa fa-arrow-circle-right"></i></button>
    </form>		
    <!-- Switcher ON-OFF Content / End -->

</div>
<!-- Section / End -->
@endsection
