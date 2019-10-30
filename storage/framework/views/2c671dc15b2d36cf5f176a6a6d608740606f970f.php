<?php if($errors->any()): ?>
<!-- Notice -->
<div class="row">
        <div class="col-md-12">
          <div class="notification error closeable margin-bottom-30">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p> <?php echo e($error); ?></p>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <a class="close" href="#"></a>
          </div>
        </div>
      </div>
<?php endif; ?><?php /**PATH C:\laragon\www\shuletogo\resources\views/partials/errors.blade.php ENDPATH**/ ?>