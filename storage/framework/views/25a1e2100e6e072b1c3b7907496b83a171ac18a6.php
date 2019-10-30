<?php $__env->startSection('title'); ?>
	Écoles Togo
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Banner
================================================== -->
<div class="main-search-container" data-background-image="images/main-search-background-02.jpg">
	<div class="main-search-inner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center white">Trouvez votre école aujourd'hui</h2>
					

				<form action="<?php echo e(route('liste-ecoles')); ?>" method="GET" class="main-search-form">
					<div class="main-search-input">

							<div class="main-search-input-item">
							<input id="search" name="query" type="text" placeholder="Nom de l'école" value="<?php echo e(request()->query('query')); ?>"/>
							</div>

							<div class="main-search-input-item location">
								<div id="">
								<input id="location" name="location" type="text" value="<?php echo e(request()->query('location')); ?>" placeholder="Ville ou quartier">
								</div>
								<a href="#"><i class="fa fa-map-marker"></i></a>
							</div>

							<div class="main-search-input-item">
								<select name="type" data-placeholder="Tous les types" class="chosen-select" >
									<option label="Choisissez un statut"></option>
									<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>	
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
				<?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<!-- Listing Item -->
				<div class="carousel-item">
					<a href="<?php echo e(route('details', $school)); ?>" class="listing-item-container">
						<div class="listing-item">
								<?php if(isset($school->logo)): ?>
								<img src="<?php echo e(asset("storage/$school->logo")); ?>" alt="<?php echo e($school->name); ?>">
								<?php else: ?>
								<img src="<?php echo e(asset("storage/logos/logo.jpg")); ?>" alt="<?php echo e($school->name); ?>">
								<?php endif; ?>
							<div class="listing-badge now-open"><?php echo e($school->statut->name); ?></div>
							
							<div class="listing-item-content">
								<span class="tag"><?php echo e($school->statut->name); ?></span>
								<h3><?php echo e($school->name); ?><i class="verified-icon"></i></h3>
								<span><?php echo e($school->ville->name); ?>, <?php echo e($school->quartier->name); ?></span>
							</div>
							
						</div>
						<div class="star-rating" data-rating="<?php echo e(isset($school->avgRating) ? $school->avgRating / $school->ratings->count() : 0); ?>">
							<div class="rating-counter"><?php echo e(isset($school->avgRating) ? $school->avgRating .' votes' : '0 vote'); ?></div>
						</div>
					</a>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
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

		<?php $__currentLoopData = $statuts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statut): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
		<div class="col-md-4">
			<!-- Image Box -->
			<a href="<?php echo e(route('statuts', $statut)); ?>" class="img-box alternative-imagebox" data-background-image="images/statuts-ecole-togo.jpg">
				<div class="img-box-content visible">
					<h4><?php echo e($statut->name); ?></h4>
					<span><?php echo e($statut->school()->count()); ?></span>
				</div>
			</a>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	

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
							<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>						
							<a href="<?php echo e(route('types', $type)); ?>" class="category-small-box">
								<i class="im im-icon-Student-Hat"></i>
								<h4><?php echo e($type->name); ?></h4>
								<span class="category-box-counter"><?php echo e($type->schools()->count()); ?></span>
							</a>			
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				</div>
			</div>
			<!-- Category Boxes / End -->
</section>
<!-- Info Section -->

<!-- Info Section / End -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/jquery-ui.js')); ?>"></script>
<script type="text/javascript">
 $(document).ready(function() {

	 // Filtre par ville ou quartier
    $( "#location" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: "<?php echo e(url('location')); ?>",
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
		url: "<?php echo e(url('schoolname')); ?>",
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/jquery-ui.css')); ?>">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\shuletogo\resources\views/frontend/index.blade.php ENDPATH**/ ?>