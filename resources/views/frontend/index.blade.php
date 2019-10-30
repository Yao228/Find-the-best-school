@extends('layouts.frontend')

@section('title')
	Écoles Togo
@endsection

@section('content')
<!-- Banner
================================================== -->
<div class="main-search-container" data-background-image="images/main-search-background-02.jpg">
	<div class="main-search-inner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center white">Trouvez votre école aujourd'hui</h2>
					{{-- <h4>Expolore top-rated attractions, activities and more</h4> --}}

				<form action="{{ route('liste-ecoles') }}" method="GET" class="main-search-form">
					<div class="main-search-input">

							<div class="main-search-input-item">
							<input id="search" name="query" type="text" placeholder="Nom de l'école" value="{{ request()->query('query')}}"/>
							</div>

							<div class="main-search-input-item location">
								<div id="">
								<input id="location" name="location" type="text" value="{{ request()->query('location')}}" placeholder="Ville ou quartier">
								</div>
								<a href="#"><i class="fa fa-map-marker"></i></a>
							</div>

							<div class="main-search-input-item">
								<select name="type" data-placeholder="Tous les types" class="chosen-select" >
									<option label="Choisissez un statut"></option>
									@foreach ($types as $type)
										<option value="{{ $type->id}}">{{ $type->name}}</option>	
									@endforeach
								</select>
							</div>

							<button type="submit" class="button">Go</button>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Content
================================================== -->

<!-- Content
================================================== -->
<div class="container">
	<div class="row">

		<div class="col-md-8 col-md-offset-2 text-center">
			<div class="padding-top-75">
			<h3 class="headline centered headline-extra-spacing">
				<strong class="headline-with-separator">Écoles Togo</strong>
			</h3>
			<p>
				<span class="margin-top-25">
						Ecoles.tg est une plateforme en ligne qui vous permet de trouver  et de contacter facilement tous les établissements d’enseignement scolaire et professionnel du Togo. Vous y trouverez toute les informations concernant les établissements tels que : localisation,  année de création, les frais Scolaires, les résultats des différents examens…
				</span>
			</p>
			</div>	
		</div>
	</div>
</div>
<!-- Category Boxes / End -->
<!-- Fullwidth Section -->
<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">

	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-45">
					<strong class="headline-with-separator">Dernières écoles</strong>
					<span>Les dernières écoles qui nous ont rejoint</span>
				</h3>
			</div>

			<div class="col-md-12">
				<div class="simple-slick-carousel dots-nav">
				@foreach ($schools as $school)
					<!-- Listing Item -->
				<div class="carousel-item">
					<a href="{{ route('details', $school)}}" class="listing-item-container">
						<div class="listing-item">
								@if (isset($school->logo))
								<img src="{{ asset("storage/$school->logo") }}" alt="{{ $school->name }}">
								@else
								<img src="{{ asset("storage/logos/logo.jpg") }}" alt="{{ $school->name }}">
								@endif
							<div class="listing-badge now-open">{{$school->statut->name}}</div>
							
							<div class="listing-item-content">
								<span class="tag">{{$school->statut->name}}</span>
								<h3>{{$school->name}}<i class="verified-icon"></i></h3>
								<span>{{$school->ville->name}}, {{$school->quartier->name}}</span>
							</div>
							{{-- <span class="like-icon"></span> --}}
						</div>
						<div class="star-rating" data-rating="{{isset($school->avgRating) ? $school->avgRating / $school->ratings->count() : 0}}">
							<div class="rating-counter">{{ isset($school->avgRating) ? $school->avgRating .' votes' : '0 vote' }}</div>
						</div>
					</a>
				</div>
				@endforeach
				
				</div>
				
			</div>

		</div>
	</div>

</section>
<!-- Fullwidth Section / End -->
<!-- Info Section -->
<section class="fullwidth padding-bottom-70">
<!-- Container -->
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-bottom-35 margin-top-70">
				<strong class="headline-with-separator">Statuts d'écoles</strong>
				<span>Découvrez les écoles par leur statut</span></h3>
		</div>

		@foreach ($statuts as $statut)	
		<div class="col-md-4">
			<!-- Image Box -->
			<a href="{{ route('statuts', $statut)}}" class="img-box alternative-imagebox" data-background-image="images/statuts-ecole-togo.jpg">
				<div class="img-box-content visible">
					<h4>{{$statut->name}}</h4>
					<span>{{$statut->school()->count()}}</span>
				</div>
			</a>
		</div>
		@endforeach	

	</div>
</div>
<!-- Container / End -->
</section>
<section class="fullwidth padding-bottom-70" data-background-color="#fcfdff">
		<hr>
		<div class="container">
				<div class="row">
			
					<div class="col-md-12">
						<h3 class="headline centered margin-top-75">
							<strong class="headline-with-separator">Niveau d'étude</strong>
						</h3>
						<p class="text-center">
							<span>
								Trouvez votre école par le niveau d'étude
							</span>
						</p>
					</div>
			
					<div class="col-md-12">
						<div class="categories-boxes-container margin-top-5 margin-bottom-30">
							
							<!-- Box -->
							@foreach ($types as $type)						
							<a href="{{ route('types', $type)}}" class="category-small-box">
								<i class="im im-icon-Student-Hat"></i>
								<h4>{{$type->name}}</h4>
								<span class="category-box-counter">{{$type->schools()->count()}}</span>
							</a>			
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<!-- Category Boxes / End -->
</section>
<!-- Info Section -->
{{-- <section class="fullwidth padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">
	<div class="container">
	
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="headline centered headline-extra-spacing">
					<strong class="headline-with-separator">Notre vision</strong>
					<span class="margin-top-25">
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi labore quia sint dicta, quisquam sed magnam, architecto doloribus eveniet
						 quibusdam impedit et optio dolore quasi autem atque neque.
					</span>
				</h3>
			</div>
		</div>
	
		<div class="row icons-container">
			<!-- Stage -->
			<div class="col-md-4">
				<div class="icon-box-2 with-line">
					<i class="im im-icon-Map2"></i>
					<h3>Find Interesting Place</h3>
					<p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut, convallis eros sollicitudin.</p>
				</div>
			</div>
	
			<!-- Stage -->
			<div class="col-md-4">
				<div class="icon-box-2 with-line">
					<i class="im im-icon-Mail-withAtSign"></i>
					<h3>Contact a Few Owners</h3>
					<p>Maecenas pulvinar, risus in facilisis dignissim, quam nisi hendrerit nulla, id vestibulum metus nullam viverra purus.</p>
				</div>
			</div>
	
			<!-- Stage -->
			<div class="col-md-4">
				<div class="icon-box-2">
					<i class="im im-icon-Checked-User"></i>
					<h3>Make a Reservation</h3>
					<p>Faucibus ante, in porttitor tellus blandit et. Phasellus tincidunt metus lectus sollicitudin feugiat consectetur.</p>
				</div>
			</div>
		</div>
	
	</div>
</section> --}}
<!-- Info Section / End -->
@endsection

@section('scripts')
<script src="{{ asset('js/jquery-ui.js')}}"></script>
<script type="text/javascript">
 $(document).ready(function() {

	 // Filtre par ville ou quartier
    $( "#location" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: "{{url('location')}}",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    console.log(obj.name);
                    return obj.name;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 2
 });

// Ville par type ou nom d'ecole
	$( "#search" ).autocomplete({
	
	source: function(request, response) {
		$.ajax({
		url: "{{url('schoolname')}}",
		data: {
				term : request.term
		},
		dataType: "json",
		success: function(data){
			var resp = $.map(data,function(obj){
				console.log(obj.name);
				return obj.name;
			}); 

			response(resp);
		}
	});
	},
	minLength: 2
	});

});

</script>	
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">
<style>
.ui-menu .ui-menu-item-wrapper {
    position: relative;
	padding: 3px 1em 3px .4em;
	border-bottom: 1px solid #ddd;
	font-family: "Raleway";
}
.ui-widget.ui-widget-content {
    border: 1px solid #ddd;
}
</style>
@endsection