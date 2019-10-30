<?php $__env->startSection('title'); ?>
Écoles Togo | A Propos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Écoles Togo</h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo e(route('frontend')); ?>">Accueil</a></li>
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
                <?php $__currentLoopData = $statuts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statut): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-label="Statut">
                        <a href="<?php echo e(route('statuts', $statut)); ?>"><?php echo e($statut->name); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </ul>
            <h3>Liste des écoles par type</h3>
            <ul class="about-links">
                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-label="Type">
                        <a href="<?php echo e(route('types', $type)); ?>"><?php echo e($type->name); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </ul>
        </div>
    </div>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\shuletogo\resources\views/frontend/a-propos.blade.php ENDPATH**/ ?>