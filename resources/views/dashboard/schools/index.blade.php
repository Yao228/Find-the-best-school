@extends('layouts.dashboard')

@section('content')
 
  <!-- Content -->
  <div class="row">
			
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Liste de vos écoles</h4>
					<ul>
						@if ($schools->count() > 0)
						@foreach ($schools as $school)
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img">
									<a href="#">
										@if (isset($school->logo))
											<img src="{{ asset("storage/$school->logo") }}" alt="{{ $school->name }}">
										@else
										<img src="{{ asset("storage/logos/logo.jpg") }}" alt="{{ $school->name }}">
										@endif
										
									</a>
								</div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3><a href="#">{{ $school->name }}</a></h3>
										<span>{{ $school->quartier->name }}, {{ $school->ville->name }}</span>
										<br>
										<span>N° de téléphone: {{ $school->phone }} <br>Adresse mail : {{ isset($school->email)? $school->email : 'Non fournis' }}</span>
										<div class="star-rating" data-rating="{{isset($school->avgRating) ? $school->avgRating / $school->ratings->count() : 0}}">
											<div class="rating-counter">({{ isset($school->avgRating) ? $school->avgRating .' votes' : '0 vote' }})</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								@if ($school->trashed())
								<form action="{{ route('restore-schools', $school) }}" method="POST">
									@csrf
									@method('PUT')
									<button type="submit" class="button gray" style="margin-bottom : 20px;"><i class="sl sl-icon-note"></i> Restorer</button>
								</form>	
								@else
								<a href="{{ route('schools.edit', $school) }}" class="button gray"><i class="sl sl-icon-note"></i> Modifier</a>
								@endif
						
								
							<form action="{{ route('schools.destroy', $school)}}" method="POST">
								@csrf
								@method('DELETE')
								<button type="submit" class="button gray"><i class="sl sl-icon-close"></i>
									 {{ $school->trashed() ? 'Supprimer définitivement' : 'Supprimer' }}
									</button>
							</form>
							
							</div>
						</li>
						@endforeach
						@else
						<p class="text-center padding-top-20 padding-bottom-20">						
							<strong> <i class="im im-icon-Angry"></i> Pas d'école actuelement</strong> <a class="button" href="{{ route('schools.create') }}">Ajouter une école</a>
						</p>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
				{{ $schools->links() }}
      		</div>
		</div>

@endsection