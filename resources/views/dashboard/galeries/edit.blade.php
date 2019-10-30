@extends('layouts.dashboard')

@section('content')
   <!-- Section -->
   <div class="add-listing-section margin-top-45">
						
    <!-- Headline -->
    <div class="add-listing-headline">
        <h3><i class="sl sl-icon-book-open"></i> Modifiez cette image</h3>
        <!-- Switcher -->
        {{-- <label class="switch"><input type="checkbox" checked><span class="slider round"></span></label> --}}
    </div>
    @include('partials.errors')
    <!-- Switcher ON-OFF Content -->
<form action="{{ route('galeries.update', $galerie->id)}}" method="POST">	
        @csrf
        @if (isset($galerie))
        @method('PUT')
        @endif		
        <div class="row">
            <div class="col-md-12">
                            
                <span class="btn btn-default btn-file">
                    <input id="logo" name="galeries" type="file" class="file" data-show-upload="true" data-show-caption="true">
                </span>
                
                @if(isset($galerie))
                <div class="form-group">
                    <br>
                    <img src="{{ asset("storage/$galerie->images") }}" alt="" style="width:50%">
                </div>
                @endif
            </div>
        </div>
        <button class="button preview" type="submit">Modifiez<i class="fa fa-arrow-circle-right"></i></button>
    </form>		
    <!-- Switcher ON-OFF Content / End -->

</div>
<!-- Section / End -->
@endsection

@section('scripts')
<script src="{{ asset('js/fileinput.js')}}"></script>
@endsection
@section('css')
<link href="{{ asset('css/fileinput.css') }}" rel="stylesheet">
@endsection
