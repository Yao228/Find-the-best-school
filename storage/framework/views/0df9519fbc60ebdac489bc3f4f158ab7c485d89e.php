<?php $__env->startSection('title'); ?>
Écoles Togo | Type <?php echo e($type->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Content
================================================== -->

<div class="fs-container" id="ecoles">

        <div class="fs-inner-container content">
            <div class="fs-content">
    
                <!-- Search -->
                <section class="search">
    
                    <div class="row">
                        <div class="col-md-12">
    
                                <!-- Row With Forms -->
                                <div class="row with-forms">
    
                                    <!-- Main Search Input -->
                                    <div class="col-fs-6">
                                        <div class="input-with-icon">
                                            <i class="sl sl-icon-magnifier"></i>
                                            <input class="sort" data-sorte="NomEcole" data-sorte="StatutEcole" data-sorte="TypeEcole" name="query" type="text" placeholder="Filtrez par nom, type ou statut d'école" value=""/>
                                        </div>
                                    </div>
    
                                    <!-- Main Search Input -->
                                    <div class="col-fs-6">
                                        <div class="input-with-icon location">
                                            <div id="autocomplete-container" data-autocomplete-tip="type and hit enter">
                                                <input class="sort" data-sorte="VilleQuartier" id="autocomplete-input" type="text" placeholder="Filtrez par ville ou quartier">
                                            </div>
                                            <a href="#"><i class="fa fa-map-marker"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row With Forms / End -->
    
                        </div>
                    </div>
    
                </section>
                <!-- Search / End -->
    
    
            <section class="listings-container margin-top-30">
                <!-- Sorting / Layout Switcher -->
                <div class="row fs-switcher">
    
                    <div class="col-md-6">
                        <!-- Showing Results -->
                        <p class="showing-results"><?php echo e($schools->count()); ?> Résultats trouvés </p>
                    </div>
    
                </div>
    
    
                <!-- Listings -->
                <div class="row fs-listings  list">
                    <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <!-- Listing Item -->
                    <div class="col-lg-12 col-md-12">
                        <div class="listing-item-container list-layout" data-marker-id="1">
                            <a href="<?php echo e(route('details', $school)); ?>" class="listing-item">
                                
                                <!-- Image -->
                                <div class="listing-item-image">
                                    <?php if(isset($school->logo)): ?>
                                    <img src="<?php echo e(asset("storage/$school->logo")); ?>" alt="<?php echo e($school->name); ?>">
                                    <?php else: ?>
                                    <img src="<?php echo e(asset("storage/logos/logo.jpg")); ?>" alt="<?php echo e($school->name); ?>">
                                    <?php endif; ?>
                                    
                                </div>
                                
                                <!-- Content -->
                                <div class="listing-item-content">
                                    <div class="listing-badge now-open StatutEcole"><?php echo e($school->statut->name); ?></div>
                                    <div class="listing-item-inner">
                                        <h3 class="NomEcole"><?php echo e($school->name); ?></h3>
                                        <span class="VilleQuartier"><?php echo e($school->ville->name); ?>, <?php echo e($school->quartier->name); ?></span>
                                        <span class="statut-small TypeEcole">
                                            <?php $__currentLoopData = $school->types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <cite class="typesecole"><?php echo e($type->name); ?>,</cite>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </span>
                                        
                                        <div class="star-rating">
                                            <div class="rating-counter">N° de téléphone : <?php echo e($school->phone); ?> <br>Adresse mail : <?php echo e(isset($school->email)? $school->email : 'Non fournis'); ?></div>
                                        </div>
                                        <div class="star-rating" data-rating="<?php echo e(isset($school->avgRating) ? $school->avgRating / $school->ratings->count() : 0); ?>">
                                            <div class="rating-counter"><?php echo e(isset($school->avgRating) ? $school->avgRating .' votes' : '0 vote'); ?></div>
                                        </div>
                                    </div>
    
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Listing Item / End -->  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
                </div>
                <!-- Listings Container / End -->
    
    
                <!-- Pagination Container -->
                <div class="row fs-listings">
                    <div class="col-md-12">
    
                        <!-- Pagination -->
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Pagination -->
                                <div class="clearfix"></div>
                                
                                <div class="pagination-container margin-top-15 margin-bottom-40">
                                    <nav class="pagination">
                                        <ul class="pagination"></ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!-- Pagination / End -->
                        
                        <!-- Copyrights -->
                        <div class="copyrights margin-top-0">© 2019 Écoles Togo. Tous droits réservés.</div>
    
                    </div>
                </div>
                <!-- Pagination Container / End -->
            </section>
    
            </div>
        </div>
        <div class="fs-inner-container map-fixed">
    
            <!-- Map -->
            <div id="map-container">
                <div id="map" data-map-scroll="true">
                    <!-- map goes here -->
                </div>
            </div>
    
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<!-- Leaflet // Docs: https://leafletjs.com/ -->
<script src="<?php echo e(asset('js/leaflet.min.js')); ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
<script>
/*-------------- Filtre des écoles ----------------*/
var options = {
    valueNames: ['NomEcole', 'VilleQuartier', 'StatutEcole', 'TypeEcole'],
    /* page: 1,
    pagination: true */

    };
    var ecoles = new List('ecoles', options);
</script>

<!-- Leaflet Maps Scripts -->
<script src="<?php echo e(asset('js/leaflet-markercluster.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/leaflet-gesture-handling.min.js')); ?>"></script>

<!-- Leaflet Geocoder + Search Autocomplete // Docs: https://github.com/perliedman/leaflet-control-geocoder -->


<script>

/* ----------------- Start Document ----------------- */
$(document).ready(function(){
if(document.getElementById("map") !== null){

	// Touch Gestures
	if ( $('#map').attr('data-map-scroll') == 'true' || $(window).width() < 992 ) {
		var scrollEnabled = false;
	} else {
		var scrollEnabled = true;
	}

	var mapOptions = {
		gestureHandling: scrollEnabled,
	}

	// Map Init
	window.map = L.map('map',mapOptions);
	$('#scrollEnabling').hide();


	// ----------------------------------------------- //
	// Popup Output
	// ----------------------------------------------- //
	function locationData(locationURL,locationImg,locationTitle, locationAddress, locationRating, locationRatingCounter) {
	  return(''+
	    '<a href="'+ locationURL +'" class="leaflet-listing-img-container">'+
	       '<div class="infoBox-close"><i class="fa fa-times"></i></div>'+
	       '<img src="'+locationImg+'" alt="">'+

	       '<div class="leaflet-listing-item-content">'+
	          '<h3>'+locationTitle+'</h3>'+
	          '<span>'+locationAddress+'</span>'+
	       '</div>'+

	    '</a>'+

	    '<div class="leaflet-listing-content">'+
	       '<div class="leaflet-listing-title">'+
	          '<div class="'+infoBox_ratingType+'" data-rating="'+locationRating+'"><div class="rating-counter">('+locationRatingCounter+')</div></div>'+
	       '</div>'+
	    '</div>')
	}


	// Listing rating on popup (star-rating or numerical-rating)
	var infoBox_ratingType = 'star-rating';

	map.on('popupopen', function () {
		if (infoBox_ratingType = 'numerical-rating') {
			numericalRating('.leaflet-popup .'+infoBox_ratingType+'');
		}
		if (infoBox_ratingType = 'star-rating') {
			starRating('.leaflet-popup .'+infoBox_ratingType+'');
		}
	});


	// ----------------------------------------------- //
	// Locations
	// ----------------------------------------------- //
	var locations = [
        <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		[ locationData('listings-single-page.html','<?php echo e(isset($school->logo) ? asset("storage/$school->logo") : asset("storage/logos/logo.jpg")); ?>',"<?php echo e($school->name); ?>",'<?php echo e($school->quartier->name); ?>, <?php echo e($school->ville->name); ?>', "<?php echo e(isset($school->avgRating) ? $school->avgRating / $school->ratings->count() : 0); ?>", "<?php echo e(isset($school->avgRating) ? $school->avgRating .' votes' : '0 vote'); ?>"), <?php echo e($school->latitude); ?>, <?php echo e($school->longitude); ?>, 1, '<i class="im im-icon-Student-Hat"></i>'],
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ];


	// ----------------------------------------------- //
	// Map Provider
	// ----------------------------------------------- //

	// Open Street Map 
	// -----------------------//
	L.tileLayer(
		'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Contributors',
		maxZoom: 18,
	}).addTo(map);


	// MapBox (Requires API Key)
	// -----------------------//
	// L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}@2x.png?access_token={accessToken}', {
	//     attribution: " &copy;  <a href='https://www.mapbox.com/about/maps/'>Mapbox</a> &copy;  <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a>",
	//     maxZoom: 18,
	//     id: 'mapbox.streets',
	//     accessToken: 'ACCESS_TOKEN'
	// }).addTo(map);


	// ThunderForest (Requires API Key)
	// -----------------------//
	// var ThunderForest_API_Key = 'API_KEY';
	// var tileUrl = 'https://tile.thunderforest.com/neighbourhood/{z}/{x}/{y}.png?apikey='+ThunderForest_API_Key,
	// layer = new L.TileLayer(tileUrl, {maxZoom: 18});
	// map.addLayer(layer);


	// ----------------------------------------------- //
	// Markers
	// ----------------------------------------------- //
        markers = L.markerClusterGroup({
            spiderfyOnMaxZoom: true,
            showCoverageOnHover: false,
          });
       
        for (var i = 0; i < locations.length; i++) {

          var listeoIcon = L.divIcon({
              iconAnchor: [20, 51], // point of the icon which will correspond to marker's location
              popupAnchor: [0, -51],
              className: 'listeo-marker-icon',
              html:  '<div class="marker-container">'+
                       '<div class="marker-card">'+
                          '<div class="front face">' + locations[i][4] + '</div>'+
                          '<div class="back face">' + locations[i][4] + '</div>'+
                          '<div class="marker-arrow"></div>'+
                       '</div>'+
                     '</div>'
            }
          );

            var popupOptions =
              {
              'maxWidth': '270',
              'className' : 'leaflet-infoBox'
              }
                var markerArray = [];
            marker = new L.marker([locations[i][1],locations[i][2]], {
                icon: listeoIcon,
                
              })
              .bindPopup(locations[i][0],popupOptions );
              //.addTo(map);
              marker.on('click', function(e){
                
               // L.DomUtil.addClass(marker._icon, 'clicked');
              });
              map.on('popupopen', function (e) {
                L.DomUtil.addClass(e.popup._source._icon, 'clicked');
            

              }).on('popupclose', function (e) {
                if(e.popup){
                  L.DomUtil.removeClass(e.popup._source._icon, 'clicked');  
                }
                
              });
              markers.addLayer(marker);
        }
        map.addLayer(markers);

    
        markerArray.push(markers);
        if(markerArray.length > 0 ){
          map.fitBounds(L.featureGroup(markerArray).getBounds().pad(0.2)); 
        }


	// Custom Zoom Control
	map.removeControl(map.zoomControl);

	var zoomOptions = {
		zoomInText: '<i class="fa fa-plus" aria-hidden="true"></i>',
		zoomOutText: '<i class="fa fa-minus" aria-hidden="true"></i>',
	};

	// Creating zoom control
	var zoom = L.control.zoom(zoomOptions);
	zoom.addTo(map);

}


// ----------------------------------------------- //
// Single Listing Map
// ----------------------------------------------- //
function singleListingMap() {

	var lng = parseFloat($( '#singleListingMap' ).data('longitude'));
	var lat =  parseFloat($( '#singleListingMap' ).data('latitude'));
	var singleMapIco =  "<i class='"+$('#singleListingMap').data('map-icon')+"'></i>";

	var listeoIcon = L.divIcon({
	    iconAnchor: [20, 51], // point of the icon which will correspond to marker's location
	    popupAnchor: [0, -51],
	    className: 'listeo-marker-icon',
	    html:  '<div class="marker-container no-marker-icon ">'+
	                     '<div class="marker-card">'+
	                        '<div class="front face">' + singleMapIco + '</div>'+
	                        '<div class="back face">' + singleMapIco + '</div>'+
	                        '<div class="marker-arrow"></div>'+
	                     '</div>'+
	                   '</div>'
	    
	  }
	);

	var mapOptions = {
	    center: [lat,lng],
	    zoom: 13,
	    zoomControl: false,
	    gestureHandling: true
	}

	var map_single = L.map('singleListingMap',mapOptions);
	var zoomOptions = {
	   zoomInText: '<i class="fa fa-plus" aria-hidden="true"></i>',
	   zoomOutText: '<i class="fa fa-minus" aria-hidden="true"></i>',
	};

	// Zoom Control
	var zoom = L.control.zoom(zoomOptions);
	zoom.addTo(map_single);

	map_single.scrollWheelZoom.disable();

	marker = new L.marker([lat,lng], {
	      icon: listeoIcon,
	}).addTo(map_single);

	// Open Street Map 
	// -----------------------//
	L.tileLayer(
		'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Contributors',
		maxZoom: 18,
	}).addTo(map_single);


	// MapBox (Requires API Key)
	// -----------------------//
	// L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}@2x.png?access_token={accessToken}', {
	//     attribution: " &copy;  <a href='https://www.mapbox.com/about/maps/'>Mapbox</a> &copy;  <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a>",
	//     maxZoom: 18,
	//     id: 'mapbox.streets',
	//     accessToken: 'ACCESS_TOKEN'
	// }).addTo(map_single);
	

	// Street View Button URL
	$('a#streetView').attr({
		href: 'https://www.google.com/maps/search/?api=1&query='+lat+','+lng+'',
		target: '_blank'
	});
}

// Single Listing Map Init
if(document.getElementById("singleListingMap") !== null){
	singleListingMap();
}


});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.liste', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\shuletogo\resources\views/frontend/types.blade.php ENDPATH**/ ?>