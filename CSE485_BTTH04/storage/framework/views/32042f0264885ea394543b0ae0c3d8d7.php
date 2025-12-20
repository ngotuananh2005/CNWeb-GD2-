<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Quản lý sự cố phòng máy</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    /* Paste phần CSS bạn đã gửi vào đây */
    body { color: #566787; background: #f5f5f5; font-family: 'Varela Round', sans-serif; font-size: 13px; }
    .table-responsive { margin: 30px 0; }
    .table-wrapper { background: #fff; padding: 20px 25px; border-radius: 3px; min-width: 1000px; box-shadow: 0 1px 1px rgba(0,0,0,.05); }
    .table-title { padding-bottom: 15px; background: #435d7d; color: #fff; padding: 16px 30px; min-width: 100%; margin: -20px -25px 10px; border-radius: 3px 3px 0 0; }
    .table-title h2 { margin: 5px 0 0; font-size: 24px; }
    .table-title .btn { color: #fff; float: right; font-size: 13px; border: none; min-width: 50px; border-radius: 2px; outline: none !important; margin-left: 10px; }
    .table-title .btn i { float: left; font-size: 21px; margin-right: 5px; }
    table.table tr th, table.table tr td { border-color: #e9e9e9; padding: 12px 15px; vertical-align: middle; }
    .pagination { float: right; margin: 0 0 5px; }
</style>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Quản lý <b>Sự cố</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="<?php echo e(route('issues.create')); ?>" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Thêm sự cố mới</span></a>
                    </div>
                </div>
            </div>

            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Tên máy tính</th>
                        <th>Tên phiên bản</th>
                        <th>Người báo cáo</th>
                        <th>Thời gian báo cáo</th>
                        <th>Mức độ</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($issue->id); ?></td>
                        <td><?php echo e($issue->computer->computer_name); ?></td>
                        <td><?php echo e($issue->computer->model); ?></td>
                        <td><?php echo e($issue->reported_by); ?></td>
                        <td><?php echo e($issue->reported_date); ?></td>
                        <td><?php echo e($issue->urgency); ?></td>
                        <td><?php echo e($issue->status); ?></td>
                        <td>
                            <a href="<?php echo e(route('issues.edit', $issue->id)); ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteModal<?php echo e($issue->id); ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>

                    <div id="deleteModal<?php echo e($issue->id); ?>" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="<?php echo e(route('issues.destroy', $issue->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <div class="modal-header">						
                                        <h4 class="modal-title">Xác nhận xóa</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">					
                                        <p>Bạn có chắc chắn muốn xóa sự cố này không?</p>
                                        <p class="text-warning"><small>Hành động này không thể hoàn tác.</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                                        <input type="submit" class="btn btn-danger" value="Xóa">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Hiển thị <b><?php echo e($issues->count()); ?></b> trên <b><?php echo e($issues->total()); ?></b> sự cố</div>
                <?php echo e($issues->links('pagination::bootstrap-4')); ?>

            </div>
        </div>
    </div>
</div>
</body>
</html><?php /**PATH C:\xampp\htdocs\CSE485_BTTH04\resources\views/issues/index.blade.php ENDPATH**/ ?>