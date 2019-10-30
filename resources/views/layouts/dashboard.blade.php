<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Écoles Togo Dashbord') }}</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main-color.css') }}" id="colors">
  
  @yield('css')

</head>

<body>

 <!-- Wrapper -->
<div id="wrapper">

  <!-- Header Container
  ================================================== -->
  <header id="header-container" class="fixed fullwidth dashboard">
  
    <!-- Header -->
    <div id="header" class="not-sticky">
      <div class="container">
        
        <!-- Left Side Content -->
        <div class="left-side">
          
          <!-- Logo -->
          <div id="logo">
            <a href="{{ route('frontend') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
            <a href="{{ route('frontend') }}" class="dashboard-logo"><img src="{{ asset('images/logo2.png') }}" alt=""></a>
          </div>
  
          <!-- Mobile Navigation -->
          <div class="mmenu-trigger">
            <button class="hamburger hamburger--collapse" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
  
       
          <div class="clearfix"></div>
          <!-- Main Navigation / End -->
          
        </div>
        <!-- Left Side Content / End -->
  
        <!-- Right Side Content / End -->
        <div class="right-side">
          <!-- Header Widget -->
          <div class="header-widget">
            
            <!-- User Menu -->
            <div class="user-menu">
              <div class="user-name"><span><img src="{{ Gravatar::src(Auth::user()->email) }}" alt=""></span> {{ Auth::user()->name }} </div>
              <ul>
                <li><a href="{{ route('users.edit-profile') }}"><i class="sl sl-icon-user"></i> Mon profile</a></li>
                <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="sl sl-icon-power"></i> Deconnexion
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </li>
              </ul>
            </div>
            </div>
          <!-- Header Widget / End -->
        </div>
        <!-- Right Side Content / End -->
  
      </div>
    </div>
    <!-- Header / End -->
  
  </header>
  <div class="clearfix"></div>
  <!-- Header Container / End -->
  
  
  <!-- Dashboard -->
  <div id="dashboard">
  
    <!-- Navigation
    ================================================== -->
  
    <!-- Responsive Navigation Trigger -->
    <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>
  
    <div class="dashboard-nav">
      <div class="dashboard-nav-inner">
  
        <ul data-submenu-title="Tableauxde bord">
          <li class="active"><a href="{{ route('dashboard')}}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
    
        </ul>
        
        <ul data-submenu-title="Menus">
          <li><a><i class="sl sl-icon-graduation"></i>Mes écoles</a>
            <ul>
              <li><a href="{{ route('schools.create') }}"><i class="sl sl-icon-plus"></i>Ajoutez votre école</a></li>
              <li><a href="{{ route('schools.index') }}"><i class="sl sl-icon-list"></i>Vos Écoles</a></li>
              @if(auth()->user()->isAdmin())
              <li><a href="{{ route('trashed-schools.index') }}"><i class="im im-icon-Trash-withMen"></i>Écoles supprimées</a></li>
              @endif
            </ul>	
          </li>
          <li><a><i class="im im-icon-Notepad"></i>Taux de réussite</a>
            <ul>
              <li><a href="{{ route('examens.create') }}"><i class="sl sl-icon-plus"></i>Ajoutez</a></li>
              <li><a href="{{ route('examens.index') }}"><i class="sl sl-icon-list"></i>Liste</a></li>
            </ul>	
          </li>
          <li><a><i class="im im-icon-Money-2"></i>Frais d'inscription</a>
            <ul>
              <li><a href="{{ route('fraisinscriptions.index') }}"><i class="sl sl-icon-list"></i>Liste des frais</a></li>
              <li><a href="{{ route('fraisinscriptions.create') }}"><i class="sl sl-icon-plus"></i>Ajoutez</a></li>
            </ul>	
          </li>
          <li><a><i class="im im-icon-Photos"></i>Galeries photo</a>
            <ul>
              <li><a href="{{ route('galeries.index') }}"><i class="sl sl-icon-list"></i>Les photos</a></li>
              <li><a href="{{ route('galeries.create') }}"><i class="sl sl-icon-plus"></i>Ajoutez</a></li>
            </ul>	
          </li>
          @if(auth()->user()->isAdmin())
          <li><a><i class="sl sl-icon-grid"></i>Statuts d'école</a>
            <ul>
              <li><a href="{{ route('statuts.index') }}"><i class="sl sl-icon-list"></i>Statuts</a></li>
              <li><a href="{{ route('statuts.create') }}"><i class="sl sl-icon-plus"></i>Ajoutez</a></li>
            </ul>	
          </li>
          <li><a><i class="sl sl-icon-layers"></i>Types d'école</a>
            <ul>
              <li><a href="{{ route('types.index') }}"><i class="sl sl-icon-list"></i>Types</a></li>
              <li><a href="{{ route('types.create') }}"><i class="sl sl-icon-plus"></i>Ajoutez</a></li>
            </ul>	
          </li>
          <li><a><i class="im im-icon-Warehouse"></i>Villes</a>
            <ul>
              <li><a href="{{ route('villes.index') }}"><i class="sl sl-icon-list"></i>Liste des villes</a></li>
              <li><a href="{{ route('villes.create') }}"><i class="sl sl-icon-plus"></i>Ajoutez</a></li>
            </ul>	
          </li>
          <li><a><i class="im im-icon-Home"></i>Quartiers</a>
            <ul>
              <li><a href="{{ route('quartiers.index') }}"><i class="sl sl-icon-list"></i>Liste des quartiers</a></li>
              <li><a href="{{ route('quartiers.create') }}"><i class="sl sl-icon-plus"></i>Ajoutez</a></li>
            </ul>	
         </li>
          <li><a><i class="im im-icon-Students"></i>Les examens</a>
            <ul>
              <li><a href="{{ route('lesexamens.index') }}"><i class="sl sl-icon-list"></i>Liste des examens</a></li>
              <li><a href="{{ route('lesexamens.create') }}"><i class="sl sl-icon-plus"></i>Ajoutez</a></li>
            </ul>	
          </li>
          <li><a><i class="fa fa-users"></i>Utilisateurs</a>
            <ul>
              <li><a href="#"><i class="sl sl-icon-plus"></i>Ajoutez un utilisateur</a></li>
              <li><a href="{{ route('users.index') }}"><i class="sl sl-icon-list"></i>Liste des utilisateurs</a></li>
            </ul>	
          </li>
          @endif
        </ul>	
  
        <ul data-submenu-title="Compte">
          <li><a href="{{ route('users.edit-profile')}}"><i class="sl sl-icon-user"></i> Mon profile</a></li>
         
          <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="sl sl-icon-power"></i> Deconnexion</a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </ul>
        
      </div>
    </div>
    <!-- Navigation / End -->
  
  
    <!-- Content
    ================================================== -->
    <div class="dashboard-content">
        
      @if(session()->has('success'))
      <div class="notification success closeable margin-bottom-30">
          <p> {{ session()->get('success') }} </p>
          <a class="close" href="#"></a>
      </div>
        @endif
        
        @if(session()->has('error'))
        <div class="notification error closeable margin-bottom-30">
            <p> {{ session()->get('error') }} </p>
            <a class="close" href="#"></a>
        </div>
        @endif

      
      @yield('content')
  
     <div class="row">
        <!-- Copyrights -->
        <div class="col-md-12">
          <div class="copyrights">© 2019 Écoles Togo. Tous droits réservés.</div>
        </div>
      </div>
    </div>
    <!-- Content / End -->
  
  
  </div>
  <!-- Dashboard / End -->
  
  
  </div>
  <!-- Wrapper / End -->

  <!-- Bootstrap core JavaScript-->
{{--   <script src="{{ asset('js/app.js') }}" ></script>
 --}}

  
  <!-- Scripts
================================================== -->
<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-migrate-3.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/mmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/chosen.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rangeslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/tooltips.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>


<script>
  function flashy(message, link) {
      var template = $($("#flashy-template").html());
      $(".flashy").remove();
      template.find(".flashy__body").html(message).attr("href", link || "#").end()
       .appendTo("body").hide().fadeIn(300).delay(2800).animate({
          marginRight: "-100%"
      }, 300, "swing", function() {
          $(this).remove();
      });
  }
</script>

@if(Session::has('flashy_notification.message'))
<script id="flashy-template" type="text/template">
  <div class="flashy flashy--{{ Session::get('flashy_notification.type') }}">
      <a href="#" class="flashy__body" target="_blank"></a>
  </div>
</script>

<script>
  flashy("{{ Session::get('flashy_notification.message') }}", "{{ Session::get('flashy_notification.link') }}");
</script>
@endif

  @yield('scripts')
  @include('flashy::message')

</body>

</html>
