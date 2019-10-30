<?php $__env->startSection('content'); ?>
 
  <!-- Titlebar -->
  <div id="titlebar">
      <div class="row">
        <div class="col-md-12">
          <h2>Bonjour, <?php echo e(Auth::user()->name); ?></h2>
          <!-- Breadcrumbs -->
          <nav id="breadcrumbs">
            <ul>
              <li><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
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
  <?php if(auth()->user()->isAdmin()): ?>
  <div class="row">
    <!-- Item -->
    <div class="col-lg-3 col-md-6">
      <div class="dashboard-stat color-1">
        <div class="dashboard-stat-content"><h4><?php echo e($users->count()); ?></h4> <span>Utilisateurs</span></div>
        <div class="dashboard-stat-icon"><i class="sl sl-icon-people"></i></div>
      </div>
    </div>

    <!-- Item -->
    <div class="col-lg-3 col-md-6">
      <div class="dashboard-stat color-2">
        <div class="dashboard-stat-content"><h4><?php echo e($schools->count()); ?></h4> <span>Écoles</span></div>
        <div class="dashboard-stat-icon"><i class="im im-icon-Students"></i></div>
      </div>
    </div>

    
    <!-- Item -->
    <div class="col-lg-3 col-md-6">
      <div class="dashboard-stat color-3">
        <div class="dashboard-stat-content"><h4><?php echo e($villes->count()); ?></h4> <span>Villes</span></div>
        <div class="dashboard-stat-icon"><i class="im im-icon-Warehouse"></i></div>
      </div>
    </div>

    <!-- Item -->
    <div class="col-lg-3 col-md-6">
      <div class="dashboard-stat color-4">
        <div class="dashboard-stat-content"><h4><?php echo e($quartiers->count()); ?></h4> <span>Quartiers</span></div>
        <div class="dashboard-stat-icon"><i class="sl sl-icon-home"></i></div>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php if(!auth()->user()->isAdmin()): ?>
  <!-- Recent Activity -->
  <div class="col-md-12">
      <div class="dashboard-list-box with-icons margin-top-20">
        <?php if($schools->count() > 0): ?>
        <h4><?php echo e($schools->count()); ?> écoles ajoutées</h4> 
        <?php elseif($schools->count() == 1): ?>
        <h4><?php echo e($schools->count()); ?> école ajoutée</h4> 
        <?php else: ?>
        <h4>Aucune école ajoutée</h4> 
        <?php endif; ?>
      
        <ul>
          <?php if($schools->count() > 0): ?>
              
            <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
              <i class="list-box-icon im im-icon-Student-Hat"></i> <?php echo e($school->name); ?>

              <div class="star-rating" data-rating="<?php echo e(isset($school->avgRating) ? $school->avgRating / $school->ratings->count() : 0); ?>">
                  <div class="rating-counter">(<?php echo e(isset($school->avgRating) ? $school->avgRating .' votes' : '0 vote'); ?>)</div>
              </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
          <div class="notification warning margin-bottom-30">
              <p> 😔 Vous n'avez pas encore ajouté d'école. <a href="<?php echo e(route('schools.create')); ?>" class="button">Ajouter votre école</a> </p>
            </div>
          <?php endif; ?>
         
        </ul>
      </div>
    </div>
  <?php endif; ?>
<!-- Notice -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\shuletogo\resources\views/dashboard/index.blade.php ENDPATH**/ ?>