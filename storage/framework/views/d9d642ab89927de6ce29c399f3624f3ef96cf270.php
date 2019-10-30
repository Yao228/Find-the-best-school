<?php $__env->startSection('content'); ?>
 
  <!-- Content -->
  <div class="row">
			
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Liste de vos écoles</h4>
					<ul>
						<?php if($schools->count() > 0): ?>
						<?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img">
									<a href="#">
										<?php if(isset($school->logo)): ?>
											<img src="<?php echo e(asset("storage/$school->logo")); ?>" alt="<?php echo e($school->name); ?>">
										<?php else: ?>
										<img src="<?php echo e(asset("storage/logos/logo.jpg")); ?>" alt="<?php echo e($school->name); ?>">
										<?php endif; ?>
										
									</a>
								</div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3><a href="#"><?php echo e($school->name); ?></a></h3>
										<span><?php echo e($school->quartier->name); ?>, <?php echo e($school->ville->name); ?></span>
										<br>
										<span>N° de téléphone: <?php echo e($school->phone); ?> <br>Adresse mail : <?php echo e(isset($school->email)? $school->email : 'Non fournis'); ?></span>
										<div class="star-rating" data-rating="<?php echo e(isset($school->avgRating) ? $school->avgRating / $school->ratings->count() : 0); ?>">
											<div class="rating-counter">(<?php echo e(isset($school->avgRating) ? $school->avgRating .' votes' : '0 vote'); ?>)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<?php if($school->trashed()): ?>
								<form action="<?php echo e(route('restore-schools', $school)); ?>" method="POST">
									<?php echo csrf_field(); ?>
									<?php echo method_field('PUT'); ?>
									<button type="submit" class="button gray" style="margin-bottom : 20px;"><i class="sl sl-icon-note"></i> Restorer</button>
								</form>	
								<?php else: ?>
								<a href="<?php echo e(route('schools.edit', $school)); ?>" class="button gray"><i class="sl sl-icon-note"></i> Modifier</a>
								<?php endif; ?>
						
								
							<form action="<?php echo e(route('schools.destroy', $school)); ?>" method="POST">
								<?php echo csrf_field(); ?>
								<?php echo method_field('DELETE'); ?>
								<button type="submit" class="button gray"><i class="sl sl-icon-close"></i>
									 <?php echo e($school->trashed() ? 'Supprimer définitivement' : 'Supprimer'); ?>

									</button>
							</form>
							
							</div>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
						<p class="text-center padding-top-20 padding-bottom-20">						
							<strong> <i class="im im-icon-Angry"></i> Pas d'école actuelement</strong> <a class="button" href="<?php echo e(route('schools.create')); ?>">Ajouter une école</a>
						</p>
						<?php endif; ?>
					</ul>
				</div>
				<div class="clearfix"></div>
				<?php echo e($schools->links()); ?>

      		</div>
		</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\shuletogo\resources\views/dashboard/schools/index.blade.php ENDPATH**/ ?>