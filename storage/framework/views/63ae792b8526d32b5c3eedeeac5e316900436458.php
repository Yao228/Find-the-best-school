<?php $__env->startSection('content'); ?>


    
    <!-- Container -->
    <div class="container margin-top-80">
    
        <div class="row">
            <div class="col-md-12">
    
                <section id="not-found" class="center">
                    <h2>404 <i class="fa fa-question-circle"></i></h2>
                    <p> 😔 Nous sommes désolés, mais la page que vous recherchiez n'existe pas.</p>
    
                    <!-- Search -->
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                                <a class="button" href="<?php echo e(route('frontend')); ?>">Retournez à la page d'accueil 🙂</a>
                        </div>
                    </div>
                    <!-- Search Section / End -->
    
    
                </section>
    
            </div>
        </div>
    
    </div>
    <!-- Container / End -->
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.liste', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\shuletogo\vendor\laravel\framework\src\Illuminate\Foundation\Exceptions/views/404.blade.php ENDPATH**/ ?>