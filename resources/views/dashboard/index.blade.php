@extends('layouts.dashboard')

@section('content')
 
  <!-- Titlebar -->
  <div id="titlebar">
      <div class="row">
        <div class="col-md-12">
          <h2>Bonjour, {{ Auth::user()->name }}</h2>
          <!-- Breadcrumbs -->
          <nav id="breadcrumbs">
            <ul>
              <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li>Accueil</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-md-12">
              <div class="notification success closeable margin-bottom-30">
                <p>Merci pour votre confiance en la plateforme <strong>Écoles.tg</strong>, le premier annuaire scholaire au Togo. 🙂</p>
                <a class="close" href="#"></a>
              </div>
            </div>
          </div>
    </div>
  <!-- Content -->
  @if(auth()->user()->isAdmin())
  <div class="row">
    <!-- Item -->
    <div class="col-lg-3 col-md-6">
      <div class="dashboard-stat color-1">
        <div class="dashboard-stat-content"><h4>{{$users->count()}}</h4> <span>Utilisateurs</span></div>
        <div class="dashboard-stat-icon"><i class="sl sl-icon-people"></i></div>
      </div>
    </div>

    <!-- Item -->
    <div class="col-lg-3 col-md-6">
      <div class="dashboard-stat color-2">
        <div class="dashboard-stat-content"><h4>{{$schools->count()}}</h4> <span>Écoles</span></div>
        <div class="dashboard-stat-icon"><i class="im im-icon-Students"></i></div>
      </div>
    </div>

    
    <!-- Item -->
    <div class="col-lg-3 col-md-6">
      <div class="dashboard-stat color-3">
        <div class="dashboard-stat-content"><h4>{{$villes->count()}}</h4> <span>Villes</span></div>
        <div class="dashboard-stat-icon"><i class="im im-icon-Warehouse"></i></div>
      </div>
    </div>

    <!-- Item -->
    <div class="col-lg-3 col-md-6">
      <div class="dashboard-stat color-4">
        <div class="dashboard-stat-content"><h4>{{$quartiers->count()}}</h4> <span>Quartiers</span></div>
        <div class="dashboard-stat-icon"><i class="sl sl-icon-home"></i></div>
      </div>
    </div>
  </div>
  @endif
  @if(!auth()->user()->isAdmin())
  <!-- Recent Activity -->
  <div class="col-md-12">
      <div class="dashboard-list-box with-icons margin-top-20">
        @if ($schools->count() > 0)
        <h4>{{$schools->count()}} écoles ajoutées</h4> 
        @elseif($schools->count() == 1)
        <h4>{{$schools->count()}} école ajoutée</h4> 
        @else
        <h4>Aucune école ajoutée</h4> 
        @endif
      
        <ul>
          @if ($schools->count() > 0)
              
            @foreach ($schools as $school)
            <li>
              <i class="list-box-icon im im-icon-Student-Hat"></i> {{$school->name}}
              <div class="star-rating" data-rating="{{isset($school->avgRating) ? $school->avgRating / $school->ratings->count() : 0}}">
                  <div class="rating-counter">({{ isset($school->avgRating) ? $school->avgRating .' votes' : '0 vote' }})</div>
              </div>
            </li>
            @endforeach
          @else
          <div class="notification warning margin-bottom-30">
              <p> 😔 Vous n'avez pas encore ajouté d'école. <a href="{{ route('schools.create') }}" class="button">Ajouter votre école</a> </p>
            </div>
          @endif
         
        </ul>
      </div>
    </div>
  @endif
<!-- Notice -->
@endsection