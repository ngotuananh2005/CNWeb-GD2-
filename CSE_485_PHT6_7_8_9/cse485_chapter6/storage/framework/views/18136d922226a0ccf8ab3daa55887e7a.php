

<?php $__env->startSection('content'); ?>
    <h2><?php echo e($page_title); ?></h2>
    <p><?php echo e($page_description); ?></p>

    <h3>Danh sách công việc:</h3>
    <ul>
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($task); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cse485_chapter6\resources\views/homepage.blade.php ENDPATH**/ ?>