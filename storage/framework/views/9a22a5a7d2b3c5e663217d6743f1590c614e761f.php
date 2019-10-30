<?php $__env->startSection('title'); ?>
Écoles Togo | Contact
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- Map Container -->
<div class="contact-map margin-bottom-60">

        <!-- Google Maps -->
        <div id="singleListingMap-container">
            <div id="map" style="height : 400px"></div>
        </div>
        <!-- Google Maps / End -->
    
        <!-- Office -->
        <div class="address-box-container">
            <div class="address-container" data-background-image="images/our-office.jpg">
                <div class="office-address">
                    <h3>Notre bureau</h3>
                    <ul>
                        <li>259 Rue Séklé, Agbalépédogan</li>
                        <li>Lomé Togo</li>
                        <li>Phone : (+228) 91 08 91 48</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Office / End -->
    
    </div>
    <div class="clearfix"></div>
    <!-- Map Container / End -->
    
    
    <!-- Container / Start -->
    <div class="container">
    
        <div class="row">
    
            <!-- Contact Details -->
            <div class="col-md-4">
    
                <h4 class="headline margin-bottom-30">Adresse</h4>
    
                <!-- Contact Details -->
                <div class="sidebar-textbox">
                    <p>Pour toute demande d'informations veuillez nous contactez par téléphone ou nous écrire via le formulaire. </p>
    
                    <ul class="contact-details">
                        <li><i class="im im-icon-Phone-2"></i> <strong>Phone:</strong> <span>(+228) 91 08 91 48</span></li>
                        <li><i class="im im-icon-Globe"></i> <strong>Web:</strong> <span><a href="#">www.ecoles.tg</a></span></li>
                        <li><i class="im im-icon-Envelope"></i> <strong>E-Mail:</strong> <span><a href="#">contact@ecoles.tg</a></span></li>
                    </ul>
                </div>
    
            </div>
    
            <!-- Contact Form -->
            <div class="col-md-8">
    
                <section id="contact">
                    <h4 class="headline margin-bottom-35">Formulaire de contact</h4>
    
                    <div id="contact-message"></div> 
                    <?php echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form method="POST" action="<?php echo e(route('contactstore')); ?>">
                            <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <input name="name" type="text" id="name" placeholder="Votre nom" required="required" value="<?php echo e(old('name')); ?>" />
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div>
                                    <input name="email" type="email" id="email" placeholder="Adresse e-mail" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" value="<?php echo e(old('email')); ?>" />
                                </div>
                            </div>
                        </div>
    
                        <div>
                            <input name="subject" type="text" id="subject" placeholder="Sujet" required="required" value="<?php echo e(old('subject')); ?>"/>
                        </div>
    
                        <div>
                            <textarea name="msg" cols="40" rows="3" id="comments" placeholder="Message" spellcheck="true"><?php echo e(old('msg')); ?></textarea>
                        </div>
    
                        <input type="submit" class="submit button" value="Envoyez le message" />
    
                        </form>
                </section>
            </div>
            <!-- Contact Form / End -->
    
        </div>
    
    </div>
    <!-- Container / End -->
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script src="<?php echo e(asset('js/StreetViewButtons.js')); ?>" ></script>
<script type="text/javascript">
const mymap = L.map('map').setView([6.1918, 1.1950], 14);
const marker = L.marker([6.19218, 1.19624]).addTo(mymap);

const attribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const tiles = L.tileLayer(tileUrl, {attribution});

marker.bindPopup("<b> Siège : Ecoles.tg</b><br>259.Rue Séklé, Agbalépédogan .").openPopup();

tiles.addTo(mymap);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\shuletogo\resources\views/frontend/contact.blade.php ENDPATH**/ ?>