@extends('layouts.dashboard')

@section('content')

<!-- Titlebar -->
<div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Ajoutez une école</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li>Ajoutez votre école</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div id="add-listing">
             @include('partials.errors')
            <form action="{{ isset($school) ? route('schools.update', $school) : route('schools.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($school))
                        @method('PUT')
                    @endif
                <!-- Section -->
                <div class="add-listing-section">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-graduation"></i>Informations basiques</h3>
                    </div>

                   
                         <!-- Nom -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <h5>Nom de l'école <i class="tip" data-tip-content="Nom de l'école"></i>  <span>(requis)</span></h5>
                                <input class="search-field" type="text" name="name" value="{{ isset($school) ? $school->name : old('name') }}" placeholder="Nom de l'école"/>
                            </div>
                        </div>

                        <!-- Row -->
						<div class="row with-forms">
							<!-- Status -->
							<div class="col-md-6">
								<h5>Statut de l'école <i class="tip" data-tip-content="Sélectionnez un statut qui conrespond à votre école"></i>  <span>(requis)</span></h5>
                                
                                @if ($statuts->count() > 0)
                                <select name="statut_id" data-placeholder="Sélectionnez un statut" class="chosen-select">
                                    <option label="blank"></option>	
                                    @foreach ($statuts as $statut)
                                    <option value="{{ $statut->id }}"
                                        @if(isset($school))
                                        @if($statut->id == $school->statut_id)
                                            selected
                                        @endif
                                      @endif
                                        >
                                        {{ $statut->name }}
                                    </option>
                                    @endforeach	
                                </select>
                                @endif
                                
							</div>

							<!-- Type -->
							<div class="col-md-6">
								<h5>Type d'école <i class="tip" data-tip-content="Vous pouvez choisir plusieur type"></i>  <span>(requis)</span></h5>
                               
                                @if ($types->count() > 0)
                                <select data-placeholder="Vous pouvez choisir plusieur type" name="type[]" class="chosen-select" multiple>
                                    @foreach ($types as $type)
                                         <option value="{{ $type->id }}"
                                        @if(isset($school))
                                            @if($school->hasType($type->id))
                                            selected
                                            @endif
                                        @endif
                                            >
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @endif
                                
							</div>
						</div>
                        <!-- Row / End -->
                        
                        <!-- Date de création -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <h5>Date de création<i class="tip" data-tip-content="Date de création de votre école"></i>  <span>(requis)</span></h5>
                            <input class="search-field" type="text" id="date_creation" name="date_creation" value="{{ isset($school) ? $school->date_creation : old('date_creation') }}" placeholder="Date de création de votre école"/>
                            </div>
                        </div>
                          <!-- Description -->
                          <div class="row with-forms">
                                <div class="col-md-12">
                                    <h5>Description de votre école<i class="tip" data-tip-content="Présentez votre école en quelque ligne"></i>  <span>(requis)</span></h5>
                                    <input id="description" type="hidden" name="description" value="{{ isset($school) ? $school->description : old('description')}}">
                                    <trix-editor input="description"></trix-editor>
                                </div>
                            </div>
                    </div>
                <!-- Section / End -->

                <div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="im im-icon-Old-Telephone"></i> Information de contact </h3>
						</div>
						<!-- Row -->
						<div class="row with-forms">
                            <br>
							<!-- Phone -->
							<div class="col-md-4">
								<h5>N° de téléphone<i class="tip" data-tip-content="Numéro de téléphone de votre école"></i>  <span>(requis)</span></h5>
                            <input type="text" name="phone" value="{{ isset($school) ? $school->phone : old('phone')}}" placeholder="Numéro de téléphone">
                            </div>
                            
                            <!-- Email Address -->
							<div class="col-md-4">
                                    <h5>E-mail <i class="tip" data-tip-content="Adresse e-mail de votre école"></i>  <span>(optionel)</span></h5>
                                    <input type="email" name="email" value="{{ isset($school) ? $school->email : old('email')}}" placeholder="Adresse e-mail de votre école">
                                </div>

							<!-- Website -->
							<div class="col-md-4">
								<h5>Site web <i class="tip" data-tip-content="Lien du site web de votre école"></i>   <span>(optionel)</span></h5>
								<input type="url" name="website" value="{{ isset($school) ? $school->website : old('website')}}" placeholder="Lien de votre site web">
							</div>
						</div>
						<!-- Row / End -->

						<!-- Row -->
						<div class="row with-forms">
							<!-- Phone -->
							<div class="col-md-4">
								<h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook   <span>(optionel)</span></h5>
								<input type="url" name="facebook" value="{{ isset($school) ? $school->facebook : old('facebook')}}" placeholder="Lien de votre page Facebook">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5 class="twitter-input"><i class="fa fa-twitter"></i> Twitter   <span>(optionel)</span></h5>
								<input type="text" name="twitter" value="{{ isset($school) ? $school->twitter : old('twitter')}}" placeholder="Lien de votre page Twitter">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5 class="gplus-input"><i class="fa fa-linkedin"></i> Linkedin   <span>(optionel)</span></h5>
								<input type="text" name="linkedin" value="{{ isset($school) ? $school->linkedin : old('linkedin')}}" placeholder="Lien de votre page Linkedin">
							</div>

						</div>
						<!-- Row / End -->
                    </div>
                    
                    <div class="add-listing-section margin-top-45">

                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-location"></i> Localisation</h3>
                            </div>
    
                            <div class="submit-section">
    
                                <!-- Row -->
                                <div class="row with-forms">
    
                                    <!-- ville -->
                                    <div class="col-md-6">
                                        <h5>Dans quelle ville se trouve votre école<i class="tip" data-tip-content="Choisissez la ville dans laquelle se trouve votre école"></i>  <span>(requis)</span></h5>
                                        @if ($villes->count() > 0)
                                        <select name="ville_id" data-placeholder="Sélectionnez une ville" class="chosen-select">
                                            @foreach ($villes as $ville)
                                            <option value="{{ $ville->id }}"
                                                @if(isset($school))
                                                @if($ville->id == $school->ville_id)
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
                                    <!-- Quartier -->
                                    <div class="col-md-6">
                                        <h5>Dans quel quartier se trouve votre école<i class="tip" data-tip-content="Choisissez le quartier dans lequel se trouve votre école"></i>  <span>(requis)</span></h5>
                                        @if ($quartiers->count() > 0)
                                        <select name="quartier_id" data-placeholder="Sélectionnez un quartier" class="chosen-select">
                                            @foreach ($quartiers as $quartier)
                                            <option value="{{ $quartier->id }}"
                                                @if(isset($school))
                                                @if($quartier->id == $school->quartier_id)
                                                    selected
                                                @endif
                                              @endif
                                                >
                                                {{ $quartier->name }}
                                            </option>
                                            @endforeach	
                                        </select>
                                        @endif
                                       
                                    </div>
                                    <div class="col-md-12">
                                        <h5>Vidéo de présentation<i class="tip" data-tip-content="Fournissez le lien youtube de la vidéo"></i>  <span>(optionel)</span></h5>
                                        <input type="url" id="video_url" name="video_url" value="{{ isset($school) ? $school->video_url : old('url')}}" placeholder="Lien youtube vidéo de présentation de votre école">
                                    </div>
                                     <!-- Latitude -->
                                     <div class="col-md-6">
                                        <h5>Latitude <i class="tip" data-tip-content="Position géographique de votre école"></i>  <span>(requis)</span></h5>
                                        <input type="text" id="latitude" name="latitude" value="{{ isset($school) ? $school->latitude : old('latitude')}}">
                                    </div>
    
                                    <!-- Longitude -->
                                    <div class="col-md-6">
                                        <h5>Longitude <i class="tip" data-tip-content="Position géographique de votre école"></i>  <span>(requis)</span></h5>
                                        <input type="text" id="longitude" name="longitude" value="{{ isset($school) ? $school->longitude : old('longitude')}}">
                                    </div>

                                    <div class="col-md-12">
                                        <h5>Position de votre école <i class="tip" data-tip-content="Cherchez sur la carte la position de votre école"></i>  <span>(requis)</span></h5>
                                        <div id="map" style="height : 400px"></div>
                                    </div>
    
                                </div>
                                <!-- Row / End -->
                            </div>
                        </div>

                    

                    <div class="add-listing-section margin-top-45">
                          <!-- Headline -->
                        <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-graduation"></i>Scholarité</h3>
                        </div>                        
                        
                        <!--Frais d'inscription -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <h5>Les détails sur les différentes scolarité<i class="tip" data-tip-content="Toutes les informations concernant la scholarité"></i>  <span>(requis)</span></h5>
                                <input id="scholarite_info" type="hidden" name="scholarite_info" value="{{ isset($school) ? $school->scholarite_info : old('scholarite_info')}}">
                                <trix-editor input="scholarite_info"></trix-editor>
                            </div>
                        </div>  

                         <!--Frais d'inscription -->
                         <div class="row with-forms">
                                <div class="col-md-12">
                                    <h5> Les Avantages supplémentaires offerts par l’Ecole<i class="tip" data-tip-content="Toutes les informations concernant la scholarité"></i>  <span>(optionel)</span></h5>
                                    <input id="avantage_sup" type="hidden" name="avantage_sup" value="{{ isset($school) ? $school->avantage_sup : old('avantage_sup')}}">
                                    <trix-editor input="avantage_sup"></trix-editor>
                                </div>
                            </div> 
                    </div>

                    <div class="add-listing-section margin-top-45">
                            <!-- Headline -->
                          <div class="add-listing-headline">
                                  <h3><i class="fa fa-file-image-o"></i>Logo & bannière</h3>
                          </div> 
                          
                          <div class="row with-forms">

                            <div class="col-md-6">

                                <h5>Logo<i class="tip" data-tip-content="Le logo de votre école"></i>  <span>(optionel)</span></h5>
                                
                                <span class="btn btn-default btn-file">
                                    <input id="logo" name="logo" type="file" class="file" data-show-upload="true" data-show-caption="true">
                                </span>
                                
                                @if(isset($school))
                                <div class="form-group">
                                    <br>
                                    <img src="{{ asset("storage/$school->logo") }}" alt="" style="width:50%">
                                </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <h5>Photo de bannière <i class="tip" data-tip-content="Une image pour présenter la bannière de votre école"></i>  <span>(optionel)</span></h5>
                                <span class="btn btn-default btn-file">
                                    <input id="cover" name="cover" type="file" class="file" data-show-upload="true" data-show-caption="true">
                                </span>
                                @if(isset($school))
                                <div class="form-group">
                                    <br>
                                    <img src="{{ asset("storage/$school->cover") }}" alt="" style="width:50%">
                                </div>
                                @endif
                            </div>

                          </div>
                    </div>

                     <!-- Section -->
            <div class="add-listing-section margin-top-45">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-picture"></i> Galerie</h3>
                    </div>
    
                    <!-- Dropzone -->
                    <div class="row with-forms">
                        <div class="col-md-12">
                            <h5>Photos pour votre galerie<i class="tip" data-tip-content="Télécharger des images de votre établissement pour votre galerie"></i>  <span>(optionel)</span></h5>
                            <span class="btn btn-default btn-file">
                                <input id="cover" name="galeries[]" type="file" class="file" multiple data-show-upload="true" data-show-caption="true">
                            </span>
                            {{-- @if(isset($school))
                            <div class="form-group">
                                <br>
                                @if($school->hasGalerie($school->id))
                                <img src="{{ asset("storage/$school->cover") }}" alt="" style="width:50%">
                                @endif   
                            </div>
                            @endif --}}
                        </div>
                    </div>
    
                </div>
                    <!-- Section / End -->

                <button class="button preview" type="submit">{{ isset($school) ? 'Mettre à jour' : 'Soumettre' }}<i class="fa fa-arrow-circle-right"></i></button>
            </form>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
<script src="{{ asset('js/trix.js') }}" ></script>
<script src="{{ asset('js/flatpickr.min.js') }}" ></script>
<script src="{{ asset('js/select2.full.min.js') }}" ></script>
<script src="{{ asset('js/fr.js') }}" ></script>
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script src="{{ asset('js/jquery.ac-form-field-repeater.js')}}"></script>
<script src="{{ asset('js/fileinput.js')}}"></script>

<script>
    /*Flatpeacker pour la date*/
flatpickr('#date_creation', {
        enableTime: false,
        enableSeconds : false,
        "locale": "fr"
    });
    /*select2 pour les sélections mutiples*/
$(document).ready(function() {
    $('.select-type').select2();
});

/*Leaflet pour la récupération des coordonnées*/
function addMapPicker() {
    var mapCenter = [6.1832553, 1.1640979];
   var map = L.map('map', {center : mapCenter, zoom : 12});
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 22,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        id: 'examples.map-i875mjb7',
        noWrap : true
    }).addTo(map);
    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat, lng) {
        marker
            .setLatLng([lat, lng])
            .bindPopup("Coordonnées de votre école :  " + marker.getLatLng().toString())
            .openPopup();
        return false;
    };
    
    map.on('click', function(e) {
        $('#latitude').val(e.latlng.lat);
        $('#longitude').val(e.latlng.lng);
        updateMarker(e.latlng.lat, e.latlng.lng);
    });
    
    
    var updateMarkerByInputs = function() {
	    return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);
}
$(document).ready(function() {
    addMapPicker();
});

</script>
<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="{{ asset('js/dropzone.js') }}"></script>
@endsection

@section('css')
<link href="{{ asset('css/trix.css') }}" rel="stylesheet">
<link href="{{ asset('css/flatpickr.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/fileinput.css') }}" rel="stylesheet">
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
<link href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" rel="stylesheet" >
@endsection
