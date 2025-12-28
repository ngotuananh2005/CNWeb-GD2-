<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?php echo e($title ?? 'Website Của Tôi'); ?></title>
    <style>
        body { font-family: Arial; }
        .container { max-width: 900px; margin: auto; padding: 20px; }
        header, footer { background: #f2f2f2; padding: 10px; text-align: center; }
        nav { background: #333; padding: 10px; }
        nav a { color: white; margin-right: 15px; text-decoration: none; }
    </style>
</head>
<body>

<header>
    <h1>CSE485 – Laravel</h1>
</header>

<nav>
    <a href="/">Trang chủ</a>
    <a href="/about">Giới thiệu</a>
</nav>

<div class="container">
    <?php echo $__env->yieldContent('content'); ?>
</div>

<footer>
    <p>© 2025 – Khoa CNTT – ĐH Thủy Lợi</p>
</footer>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\cse485_chapter612\resources\views/layouts/app.blade.php ENDPATH**/ ?>