

<?php $__env->startSection('content'); ?>
<h2>Danh sách sinh viên</h2>

<form action="<?php echo e(route('sinhvien.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    Tên sinh viên: <input type="text" name="ten_sinh_vien" required>
    Email: <input type="email" name="email" required>
    <button type="submit">Thêm</button>
</form>

<br>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
    </tr>

    <?php $__currentLoopData = $danhSachSV; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($sv->id); ?></td>
        <td><?php echo e($sv->ten_sinh_vien); ?></td>
        <td><?php echo e($sv->email); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cse485_chapter612\resources\views/sinhvien/list.blade.php ENDPATH**/ ?>