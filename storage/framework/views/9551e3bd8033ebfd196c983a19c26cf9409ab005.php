<?php $__env->startSection('title'); ?>
Écoles Togo | <?php echo e($school->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<div class="container cover">
    <div class="row">
        <div class="col-md-12">
             <!-- Titlebar -->
            <div id="titlebar" class="listing-titlebar">
                <div class="listing-titlebar-title">
                    <div class="coverlogo text-center">
                        <img src="<?php echo e(isset($school->logo) ? asset("storage/$school->logo") : asset("images/default-logo.jpg")); ?>" alt="<?php echo e($school->name); ?>" class="detail-logo">
                    </div>
                    <h2 class=" white"><?php echo e($school->name); ?><span class="listing-tag"><?php echo e($school->statut->name); ?></span></h2>
                    <span>
                        <a href="#listing-location" class="listing-address">
                            <i class="fa fa-map-marker"></i>
                            <?php echo e($school->ville->name); ?>, <?php echo e($school->quartier->name); ?>

                        </a>
                    </span>
                  <div class="star-rating" data-rating="<?php echo e(isset($school->avgRating) ? $school->avgRating / $school->ratings->count() : 0); ?>">
                    <div class="rating-counter"><a href="#listing-reviews"><?php echo e(isset($school->avgRating) ? $school->avgRating .' votes' : '0 vote'); ?></a></div>
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
                        <?php echo $school->description; ?>

                    </p>
                    
                    <!-- Listing Contacts -->
                    <div class="listing-links-container">
    
                        <ul class="listing-links contact-links">
                            <li><a href="tel:<?php echo e($school->phone); ?>" class="listing-links"><i class="fa fa-phone"></i> <?php echo e($school->phone); ?></a></li>
                            <li><a href="mailto:<?php echo e(isset($school->email)? $school->email : ''); ?>" class="listing-links"><i class="fa fa-envelope-o"></i><?php echo e(isset($school->email)? $school->email : 'Non fournis'); ?></a>
                            </li>
                            <li><a href="<?php echo e(isset($school->website)? $school->website : '#'); ?>" target="_blank"  class="listing-links"><i class="fa fa-link"></i> <?php echo e(isset($school->website)? $school->website : 'Non fournis'); ?></a></li>
                        </ul>
                        <div class="clearfix"></div>
    
                        <ul class="listing-links">
                            <?php if(isset($school->facebook)): ?>
                            <li><a href="<?php echo e($school->facebook); ?>" target="_blank" class="listing-links-fb"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                           <?php endif; ?>
                           <?php if(isset($school->twitter)): ?>
                           <li><a href="<?php echo e($school->twitter); ?>" target="_blank" class="listing-links-tt"><i class="fa fa-twitter"></i> Twitter</a></li>
                           <?php endif; ?>
                           <?php if(isset($school->linkedin)): ?>
                           <li><a href="<?php echo e($school->linkedin); ?>" target="_blank" class="listing-links-ld"><i class="fa fa-linkedin"></i> Linkedin</a></li>
                           <?php endif; ?>
                        </ul>
                        <div class="clearfix"></div>
    
                    </div>
                    <div class="clearfix"></div>
    
    
                    <!-- Amenities -->
                    <h3 class="listing-desc-headline">Niveaux de formation</h3>
                    <ul class="listing-features checkboxes">
                        <?php $__currentLoopData = $school->types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($type->name); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                     <!-- Resultats -->
                    <h3 class="listing-desc-headline">Résultats des examens</h3>
                    <?php if($school->examen->count() > 0): ?>
                    <div style="width:100%">
                        <?php echo $chart->container(); ?>

                    </div>
                    <?php else: ?>
                    <div class="notification warning closeable">
                        <p>Les résultats des différents examens ne sont pas soumis.</p>
                            
                     </div>
                    <?php endif; ?>
                   
                </div>
                <div id="listing-scholarite" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-70">Scolarité</h3>
                    <p><?php echo isset($school->scholarite_info) ? $school->scholarite_info : 'Pas de détails sur la Scolarité'; ?></p>
                </div>
                <div id="listing-avantages" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-70">Les avantages sur les différentes Scolarités</h3>
                    <p><?php echo isset($school->avantage_sup) ? $school->avantage_sup : 'Pas de détails sur la Scolarité'; ?></p>
                </div>
                	<!-- Slider -->
			    <div id="listing-gallery" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-70">Galerie</h3>
                    <div class="listing-slider-small mfp-gallery-container margin-bottom-0">
                        <?php if($school->galeries->count() > 0): ?>
                            <?php $__currentLoopData = $school->galeries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(asset("storage/$galery->images")); ?>" data-background-image="<?php echo e(asset("storage/$galery->images")); ?>" class="item mfp-gallery" title="Title 2"></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                    </div>
                    <div class="notification warning closeable">
                        <p>Pas de galerie photo pour le moment</p>
                            
                     </div>
                    <?php endif; ?>
                    
                </div>
                <!-- Location -->
			    <div id="listing-location" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Localisation</h3>
    
                    <div id="map" style="height : 400px"></div>
                </div>

                <!-- Video de présentation -->
			    <div id="listing-video" class="listing-section">
 
                    <h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Vidéo de présentation</h3>
                    <?php
                        $url = YoutubeID($school->video_url)
                    ?>
                    <?php if($url): ?>
                    <iframe width="100%" height="390" src="https://www.youtube.com/embed/<?php echo e($url); ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php else: ?>
                    <div class="notification warning closeable">
                        <p>Pas de vidéo de présentation pour le moment</p>
                            
                     </div>
                    <?php endif; ?>                      
                </div>

                	<!-- Add Review Box -->
			    <div id="add-review" class="add-review-box">

                    <!-- Add Review -->
                    <h3 class="listing-desc-headline margin-bottom-10">Votre avis</h3>
                    <p class="comment-notes">Nous avons besoins de votre avis pour évaluer cette école.</p>
                    <?php echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- Review Comment -->
                    <form action="<?php echo e(route('create_rating', $school->id)); ?>" method="POST" id="add-comment" class="add-comment">
                        <?php echo csrf_field(); ?>
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
                                <input type="text" name="rate_name" value="<?php echo e(old('rate_name')); ?>"/>
                                </div>
                                    
                                <div class="col-md-6">
                                    <label>Votre adresse mail :</label>
                                    <input type="email" name="rate_mail" value="<?php echo e(old('rate_mail')); ?>"/>
                                </div>
                            </div>
    
                            <div>
                                <label>Votre avis ici:</label>
                                <textarea name="comment" cols="40" rows="3"><?php echo e(old('comment')); ?></textarea>
                            </div>
                        <input type="hidden" name="school_id" value="<?php echo e($school->id); ?>"/>
                        </fieldset>
    
                        <button type="submit" class="button">Soumettez votre avis</button>
                        <div class="clearfix"></div>
                    </form>
    
                </div>
                <!-- Add Review Box / End -->
                <!-- Reviews -->
				<section class="comments listing-reviews">
                        <ul>
                            <?php if($school->ratings): ?>
                                <?php $__currentLoopData = $school->ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <li>
                                <div class="avatar"><img src="<?php echo e(Gravatar::src($rating->rate_mail)); ?>" alt="" /></div>
                                <div class="comment-content"><div class="arrow-comment"></div>
                                    <div class="comment-by"><?php echo e($rating->rate_name); ?> <i class="tip" data-tip-content="Person who left this review actually was a customer"></i> <span class="date">June 2019</span>
                                        <div class="star-rating" data-rating="<?php echo e($rating->rating); ?>"></div>
                                    </div>
                                    <p><?php echo e($rating->comment); ?></p>
                                </div>
                            </li> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                         </ul>
                    </section>
    
                    <!-- Pagination -->
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Pagination -->
                            <?php echo e($ratings->links()); ?>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- Pagination / End -->
                    <?php endif; ?>
    
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
                    <?php if(isset($school->fraisinscription)): ?>
                    <?php $__currentLoopData = $school->fraisinscription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span> <?php echo e($frais->niveau_etude); ?> : <?php echo e(number_format($frais->frais, 0, ',', ' ')); ?> FCFA </span> <hr>                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <p>
                        Non soumis
                    </p>
                    <?php endif; ?>
                </div>
                </div>
                     <!-- Contact -->
                     <div class="boxed-widget margin-top-35">
                            <div class="hosted-by-title">
                                <h4><span>Ajoutée par</span> <a href="pages-user-profile.html"><?php echo e($school->user->name); ?></a></h4>
                            </div>
                            <ul class="listing-details-sidebar">
                                <li><i class="im im-icon-Calendar"></i> Date de création :  <?php echo e(\Carbon\Carbon::parse($school->date_creation)->format('d/m/Y')); ?></li>
                                <li><i class="sl sl-icon-phone"></i> <a href="tel:<?php echo e($school->phone); ?>"><?php echo e($school->phone); ?></a></li>
                                <li><i class="sl sl-icon-globe"></i> <a href="<?php echo e(isset($school->website)? $school->website : '#'); ?>" target="_blank"><?php echo e(isset($school->website)? $school->website : 'Non fournis'); ?></a></li>
                                <li><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo e(isset($school->email)? $school->email : ''); ?>"><?php echo e(isset($school->email)? $school->email : 'Non fournis'); ?></a></li>
                            </ul>
            
                            <ul class="listing-details-sidebar social-profiles">
                                <?php if(isset($school->facebook)): ?>
                                     <li><a href="<?php echo e($school->facebook); ?>" target="_blank" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                                <?php endif; ?>
                                <?php if(isset($school->twitter)): ?>
                                <li><a href="<?php echo e($school->twitter); ?>" target="_blank" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li>
                                <?php endif; ?>
                                <?php if(isset($school->linkedin)): ?>
                                <li><a href="<?php echo e($school->linkedin); ?>" target="_blank" class="linkedin-profile"><i class="fa fa-linkedin"></i> Linkedin</a></li>
                                <?php endif; ?>
                               
                              
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
            
                            
                        </div>
                        <!-- Contact / End-->
                             <!-- Share / Like -->
                    <div class="listing-share margin-top-40 margin-bottom-40 no-border">
                        <!-- Share Buttons -->
                                                               
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                            
                    <div class="clearfix"></div>
                </div>
            </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>



<script type="text/javascript" src="<?php echo e(asset('js/Chart.min.js')); ?>"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js" charset="utf-8"></script>

<?php echo $chart->script(); ?> 



<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d6942271178e598"></script>

<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script src="<?php echo e(asset('js/StreetViewButtons.js')); ?>" ></script>
<script type="text/javascript">
const mymap = L.map('map').setView([<?php echo e($school->latitude); ?>, <?php echo e($school->longitude); ?>], 14);
const marker = L.marker([<?php echo e($school->latitude); ?>, <?php echo e($school->longitude); ?>]).addTo(mymap);

const attribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const tiles = L.tileLayer(tileUrl, {attribution});

marker.bindPopup("<b><?php echo e($school->name); ?> </b><br><?php echo e($school->quartier->name); ?>, <?php echo e($school->ville->name); ?> .").openPopup();
tiles.addTo(mymap);
</script>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        /* #map { margin: 0; height: 100%; } */
        .cover
        {
            background-image: url('<?php echo e(isset($school->cover) ? asset("storage/$school->cover") : asset("images/cover.jpg")); ?>');
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\shuletogo\resources\views/frontend/details.blade.php ENDPATH**/ ?>