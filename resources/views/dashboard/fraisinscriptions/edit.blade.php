@extends('layouts.dashboard')

@section('content')
   <!-- Section -->
   <div class="add-listing-section margin-top-45">
						
    <!-- Headline -->
    <div class="add-listing-headline">
        <h3><i class="sl sl-icon-book-open"></i> Modifiez ce frais</h3>
        <!-- Switcher -->
        {{-- <label class="switch"><input type="checkbox" checked><span class="slider round"></span></label> --}}
    </div>
    @include('partials.errors')
    <!-- Switcher ON-OFF Content -->
    <form action="{{ route('fraisinscriptions.update', $fraisinscription->id)}}" method="POST">	
        @csrf
        @if (isset($fraisinscription))
        @method('PUT')
        @endif		
        <div class="row">
            <div class="col-md-12">
                <table id="frais-list-container">
                    <tr class="frais-list-item pattern">
                        <td>
                            <div class="fm-input frais-name">
                            <div class="fm-input"><input type="text" name="niveau_etude" value="{{$fraisinscription->niveau_etude}}" placeholder="Saisissez le niveau d'étude" /></div>
                            </div>
                            <div class="fm-input frais-price"><input type="text" name="frais" value="{{$fraisinscription->frais}}" placeholder="Montant du frais d'inscription" data-frais="F CFA" /></div>
                            </div>
                           {{--  <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div> --}}
                        </td>
                    </tr>
                </table>
                {{-- <a href="#" class="button add-frais-list-item">Ajoutez d'autre</a> --}}
            </div>
        </div>
        <button class="button preview" type="submit">Modifiez<i class="fa fa-arrow-circle-right"></i></button>
    </form>		
    <!-- Switcher ON-OFF Content / End -->

</div>
<!-- Section / End -->
@endsection
