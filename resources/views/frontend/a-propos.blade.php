@extends('layouts.frontend')

@section('title')
Écoles Togo | A Propos
@endsection
@section('content')

<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Écoles Togo</h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="{{route('frontend')}}">Accueil</a></li>
                        <li>A Propos</li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
    <hr>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 about-section">
            <h3 class="margin-bottom-50">Qui sommes-nous ?</h3>
            <p>
               <strong>Ecoles.tg</strong>  est développé par une équipe de développeurs de solutions webs (applications, logiciels, site web) dédiées à l’éducation. Notre mission est de dématérialiser le système des gestions des établissements.
            </p>
            <p>
                Trouver une école adéquate pour son enfant est un besoin crucial pour chaque parent, et nous pensons qu’il est très important qu’un maximum d’informations sérieuses soit accessible pour aider les parents à faire un choix éclairé en fonction de leurs critères. Ecoles.tg met à disposition  donc gratuitement un outils en ligne qui répertorie toutes les écoles du Togo.
            </p>
        </div>
        <div class="col-md-4">
            <h3>Liste des écoles par statut</h3>
            <ul class="about-links">
                @foreach ($statuts as $statut)
                    <li data-label="Statut">
                        <a href="{{ route('statuts', $statut)}}">{{$statut->name}}</a>
                    </li>
                @endforeach
                
            </ul>
            <h3>Liste des écoles par type</h3>
            <ul class="about-links">
                @foreach ($types as $type)
                    <li data-label="Type">
                        <a href="{{ route('types', $type)}}">{{$type->name}}</a>
                    </li>
                @endforeach
                
            </ul>
        </div>
    </div>
</div>
    
@endsection