@extends('layouts.frontend')


@section('title')
Écoles Togo | {{$school->name}}
@endsection

@section('content')

{{--  banner single school --}}

<div class="container cover">
    <div class="row">
        <div class="col-md-12">
             <!-- Titlebar -->
            <div id="titlebar" class="listing-titlebar">
                <div class="listing-titlebar-title">
                    <div class="coverlogo text-center">
                        <img src="{{ isset($school->logo) ? asset("storage/$school->logo") : asset("images/default-logo.jpg")  }}" alt="{{ $school->name }}" class="detail-logo">
                    </div>
                    <h2 class=" white">{{$school->name}}<span class="listing-tag">{{$school->statut->name}}</span></h2>
                    <span>
                        <a href="#listing-location" class="listing-address">
                            <i class="fa fa-map-marker"></i>
                            {{$school->ville->name}}, {{$school->quartier->name}}
                        </a>
                    </span>
                  <div class="star-rating" data-rating="{{isset($school->avgRating) ? $school->avgRating / $school->ratings->count() : 0}}">
                    <div class="rating-counter"><a href="#listing-reviews">{{ isset($school->avgRating) ? $school->avgRating .' votes' : '0 vote' }}</a></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 padding-right-30 margin-top-75">
            	<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
                <ul class="listing-nav">
                    <li><a href="#listing-overview" class="active">Description</a></li>
                    <li><a href="#listing-scholarite">Scolarité</a></li>
                    <li><a href="#listing-avantages">Les avantages</a></li>
                    <li><a href="#listing-gallery">Galerie</a></li>
                    <li><a href="#listing-location">Localisation</a></li>
                    <li><a href="#listing-video">Vidéo</a></li>
                    <li><a href="#add-review">Avis</a></li>
                </ul>
            </div>
            	<!-- Overview -->
			<div id="listing-overview" class="listing-section">
                   
                    <!-- Description -->
                    <p>
                        {!! $school->description !!}
                    </p>
                    
                    <!-- Listing Contacts -->
                    <div class="listing-links-container">
    
                        <ul class="listing-links contact-links">
                            <li><a href="tel:{{$school->phone}}" class="listing-links"><i class="fa fa-phone"></i> {{$school->phone}}</a></li>
                            <li><a href="mailto:{{ isset($school->email)? $school->email : '' }}" class="listing-links"><i class="fa fa-envelope-o"></i>{{ isset($school->email)? $school->email : 'Non fournis' }}</a>
                            </li>
                            <li><a href="{{ isset($school->website)? $school->website : '#' }}" target="_blank"  class="listing-links"><i class="fa fa-link"></i> {{ isset($school->website)? $school->website : 'Non fournis' }}</a></li>
                        </ul>
                        <div class="clearfix"></div>
    
                        <ul class="listing-links">
                            @if (isset($school->facebook))
                            <li><a href="{{$school->facebook}}" target="_blank" class="listing-links-fb"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                           @endif
                           @if (isset($school->twitter))
                           <li><a href="{{$school->twitter}}" target="_blank" class="listing-links-tt"><i class="fa fa-twitter"></i> Twitter</a></li>
                           @endif
                           @if (isset($school->linkedin))
                           <li><a href="{{$school->linkedin}}" target="_blank" class="listing-links-ld"><i class="fa fa-linkedin"></i> Linkedin</a></li>
                           @endif
                        </ul>
                        <div class="clearfix"></div>
    
                    </div>
                    <div class="clearfix"></div>
    
    
                    <!-- Amenities -->
                    <h3 class="listing-desc-headline">Niveaux de formation</h3>
                    <ul class="listing-features checkboxes">
                        @foreach ($school->types as $type)
                        <li>{{$type->name}}</li>
                        @endforeach
                    </ul>
                     <!-- Resultats -->
                    <h3 class="listing-desc-headline">Résultats des examens</h3>
                    @if($school->examen->count() > 0)
                    <div style="width:100%">
                        {!!  $chart->container()  !!}
                    </div>
                    @else
                    <div class="notification warning closeable">
                        <p>Les résultats des différents examens ne sont pas soumis.</p>
                            {{-- <a class="close" href="#"></a> --}}
                     </div>
                    @endif
                   
                </div>
                <div id="listing-scholarite" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-70">Scolarité</h3>
                    <p>{!! isset($school->scholarite_info) ? $school->scholarite_info : 'Pas de détails sur la Scolarité'!!}</p>
                </div>
                <div id="listing-avantages" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-70">Les avantages sur les différentes Scolarités</h3>
                    <p>{!! isset($school->avantage_sup) ? $school->avantage_sup : 'Pas de détails sur la Scolarité'!!}</p>
                </div>
                	<!-- Slider -->
			    <div id="listing-gallery" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-70">Galerie</h3>
                    <div class="listing-slider-small mfp-gallery-container margin-bottom-0">
                        @if ($school->galeries->count() > 0)
                            @foreach ($school->galeries as $galery)
                                <a href="{{asset("storage/$galery->images")}}" data-background-image="{{asset("storage/$galery->images")}}" class="item mfp-gallery" title="Title 2"></a>
                            @endforeach
                        @else
                    </div>
                    <div class="notification warning closeable">
                        <p>Pas de galerie photo pour le moment</p>
                            {{-- <a class="close" href="#"></a> --}}
                     </div>
                    @endif
                    
                </div>
                <!-- Location -->
			    <div id="listing-location" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Localisation</h3>
    
                    <div id="map" style="height : 400px"></div>
                </div>

                <!-- Video de présentation -->
			    <div id="listing-video" class="listing-section">
 
                    <h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Vidéo de présentation</h3>
                    @php
                        $url = YoutubeID($school->video_url)
                    @endphp
                    @if ($url)
                    <iframe width="100%" height="390" src="https://www.youtube.com/embed/{{$url}}?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @else
                    <div class="notification warning closeable">
                        <p>Pas de vidéo de présentation pour le moment</p>
                            {{-- <a class="close" href="#"></a> --}}
                     </div>
                    @endif                      
                </div>

                	<!-- Add Review Box -->
			    <div id="add-review" class="add-review-box">

                    <!-- Add Review -->
                    <h3 class="listing-desc-headline margin-bottom-10">Votre avis</h3>
                    <p class="comment-notes">Nous avons besoins de votre avis pour évaluer cette école.</p>
                    @include('partials.errors')
                    <!-- Review Comment -->
                    <form action="{{route('create_rating', $school->id)}}" method="POST" id="add-comment" class="add-comment">
                        @csrf
                        <fieldset>
                        <!-- Subrating #1 -->
                        <div class="add-sub-rating">
                                <div class="sub-rating-title">Votre vote <i class="tip" data-tip-content="Combien d'étoile vous donnez à cette école"></i></div>
                                <div class="sub-rating-stars">
                                    <!-- Leave Rating -->
                                    <div class="clearfix"></div>
                                    <div class="leave-rating">
                                        <input type="radio" name="rating" id="rating-1" value="1"/>
                                        <label for="rating-1" class="fa fa-star"></label>
                                        <input type="radio" name="rating" id="rating-2" value="2"/>
                                        <label for="rating-2" class="fa fa-star"></label>
                                        <input type="radio" name="rating" id="rating-3" value="3"/>
                                        <label for="rating-3" class="fa fa-star"></label>
                                        <input type="radio" name="rating" id="rating-4" value="4"/>
                                        <label for="rating-4" class="fa fa-star"></label>
                                        <input type="radio" name="rating" id="rating-5" value="5"/>
                                        <label for="rating-5" class="fa fa-star"></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Votre nom:</label>
                                <input type="text" name="rate_name" value="{{ old('rate_name')}}"/>
                                </div>
                                    
                                <div class="col-md-6">
                                    <label>Votre adresse mail :</label>
                                    <input type="email" name="rate_mail" value="{{ old('rate_mail')}}"/>
                                </div>
                            </div>
    
                            <div>
                                <label>Votre avis ici:</label>
                                <textarea name="comment" cols="40" rows="3">{{ old('comment')}}</textarea>
                            </div>
                        <input type="hidden" name="school_id" value="{{$school->id}}"/>
                        </fieldset>
    
                        <button type="submit" class="button">Soumettez votre avis</button>
                        <div class="clearfix"></div>
                    </form>
    
                </div>
                <!-- Add Review Box / End -->
                <!-- Reviews -->
				<section class="comments listing-reviews">
                        <ul>
                            @if ($school->ratings)
                                @foreach ($school->ratings as $rating)
                               <li>
                                <div class="avatar"><img src="{{ Gravatar::src($rating->rate_mail) }}" alt="" /></div>
                                <div class="comment-content"><div class="arrow-comment"></div>
                                    <div class="comment-by">{{$rating->rate_name}} <i class="tip" data-tip-content="Person who left this review actually was a customer"></i> <span class="date">June 2019</span>
                                        <div class="star-rating" data-rating="{{$rating->rating}}"></div>
                                    </div>
                                    <p>{{$rating->comment}}</p>
                                </div>
                            </li> 
                            @endforeach
                            
                         </ul>
                    </section>
    
                    <!-- Pagination -->
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Pagination -->
                            {{ $ratings->links() }}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- Pagination / End -->
                    @endif
    
            </div> 
            <div class="col-lg-4 col-md-4 margin-top-75 sticky">
                <!-- Verified Badge -->
			    <div class="verified-badge with-tip" data-tip-content="Nous avons vérifié l'existance de cette école et qu'elle est ajoutée par l'approbation de son directeur.">
                    <i class="sl sl-icon-check"></i> École vérifiée
                </div>
                <!-- Frais d'inscription -->
                <div class="boxed-widget margin-top-35">
                <div class="">
                    <h4><span>Frais d'inscription :</span></h4> <hr>
                    @if (isset($school->fraisinscription))
                    @foreach ($school->fraisinscription as $frais)
                    <span> {{$frais->niveau_etude}} : {{number_format($frais->frais, 0, ',', ' ')}} FCFA </span> <hr>                        
                    @endforeach
                    @else
                    <p>
                        Non soumis
                    </p>
                    @endif
                </div>
                </div>
                     <!-- Contact -->
                     <div class="boxed-widget margin-top-35">
                            <div class="hosted-by-title">
                                <h4><span>Ajoutée par</span> <a href="pages-user-profile.html">{{ $school->user->name }}</a></h4>
                            </div>
                            <ul class="listing-details-sidebar">
                                <li><i class="im im-icon-Calendar"></i> Date de création :  {{\Carbon\Carbon::parse($school->date_creation)->format('d/m/Y')}}</li>
                                <li><i class="sl sl-icon-phone"></i> <a href="tel:{{$school->phone}}">{{$school->phone}}</a></li>
                                <li><i class="sl sl-icon-globe"></i> <a href="{{ isset($school->website)? $school->website : '#' }}" target="_blank">{{ isset($school->website)? $school->website : 'Non fournis' }}</a></li>
                                <li><i class="fa fa-envelope-o"></i> <a href="mailto:{{ isset($school->email)? $school->email : '' }}">{{ isset($school->email)? $school->email : 'Non fournis' }}</a></li>
                            </ul>
            
                            <ul class="listing-details-sidebar social-profiles">
                                @if (isset($school->facebook))
                                     <li><a href="{{$school->facebook }}" target="_blank" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                                @endif
                                @if (isset($school->twitter))
                                <li><a href="{{$school->twitter }}" target="_blank" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li>
                                @endif
                                @if (isset($school->linkedin))
                                <li><a href="{{$school->linkedin }}" target="_blank" class="linkedin-profile"><i class="fa fa-linkedin"></i> Linkedin</a></li>
                                @endif
                               
                              
                                <!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
                            </ul>
            
                            <!-- Reply to review popup -->
                            <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                                <div class="small-dialog-header">
                                    <h3>Contactez cette école</h3>
                                </div>
                                <form action="" method="POST">
                                    <div class="message-reply margin-top-0">

                                        <textarea cols="40" rows="3" placeholder="Ecrivez votre message ici"></textarea>
                                        <button class="button">Envoyez</button>
                                    </div>
                                </form>
                                <div class="message-reply margin-top-0">
                                    <textarea cols="40" rows="3" placeholder="Ecrivez votre message ici"></textarea>
                                    <button class="button">Envoyez</button>
                                </div>
                            </div>
            
                            {{-- <a href="#small-dialog" class="send-message-to-owner button popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Envoyez un message</a> --}}
                        </div>
                        <!-- Contact / End-->
                             <!-- Share / Like -->
                    <div class="listing-share margin-top-40 margin-bottom-40 no-border">
                        <!-- Share Buttons -->
                                                               
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        {{-- <div class="addthis_inline_share_toolbox_5dam"></div>  --}}                    
                    <div class="clearfix"></div>
                </div>
            </div>
    </div>
</div>

@endsection

@section('scripts')



<script type="text/javascript" src="{{ asset('js/Chart.min.js') }}"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js" charset="utf-8"></script>

{!! $chart->script() !!} 



<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d6942271178e598"></script>

<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script src="{{ asset('js/StreetViewButtons.js') }}" ></script>
<script type="text/javascript">
const mymap = L.map('map').setView([{{$school->latitude}}, {{$school->longitude}}], 14);
const marker = L.marker([{{$school->latitude}}, {{$school->longitude}}]).addTo(mymap);

const attribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const tiles = L.tileLayer(tileUrl, {attribution});

marker.bindPopup("<b>{{$school->name}} </b><br>{{$school->quartier->name}}, {{$school->ville->name}} .").openPopup();
tiles.addTo(mymap);
</script>
    
@endsection

@section('css')
    <style>
        /* #map { margin: 0; height: 100%; } */
        .cover
        {
            background-image: url('{{ isset($school->cover) ? asset("storage/$school->cover") : asset("images/cover.jpg")  }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-color: #cccccc;
            background-position: center;
            box-shadow: inset 0 0 0 100vw rgba(0,0,0,0.3);
            color: white;
            min-height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 2px;
        } 
        .detail-logo{
            height: 100px;
            width: 100px;
           border-radius: 50px;
           margin-bottom: 30px;
           border: 2px solid #cccccc;
        }     
    </style>
    <link href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" rel="stylesheet" >

@endsection