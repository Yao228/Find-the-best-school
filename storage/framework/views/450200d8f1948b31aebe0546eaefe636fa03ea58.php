<?php if($paginator->hasPages()): ?>        
        <!-- Pagination -->
        <div class="clearfix"></div>
        <div class="pagination-container margin-top-30 margin-bottom-0">
            <nav class="pagination">
                <ul>
                    
                    <?php if($paginator->onFirstPage()): ?>
                    <li><a ><i class="sl sl-icon-arrow-left"></i></a></li>
                    <?php else: ?>
                    <li><a href="<?php echo e($paginator->previousPageUrl()); ?>"><i class="sl sl-icon-arrow-left"></i></a></li>
                    <?php endif; ?>

                    
                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if(is_string($element)): ?>
                            <li class="disabled" aria-disabled="true"><span><?php echo e($element); ?></span></li>
                        <?php endif; ?>

                        
                        <?php if(is_array($element)): ?>
                            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $paginator->currentPage()): ?>
                                    <li><a class="current-page"><?php echo e($page); ?></a></li>
                                <?php else: ?>
                                    <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
                    <?php if($paginator->hasMorePages()): ?>
                    <li><a href="<?php echo e($paginator->nextPageUrl()); ?>"><i class="sl sl-icon-arrow-right"></i></a></li>
                    <?php else: ?>
                    <li><a ><i class="sl sl-icon-arrow-right"></i></a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
        <!-- Pagination / End -->
<?php endif; ?>

<?php /**PATH C:\laragon\www\shuletogo\resources\views/vendor/pagination/bootstrap-4.blade.php ENDPATH**/ ?>