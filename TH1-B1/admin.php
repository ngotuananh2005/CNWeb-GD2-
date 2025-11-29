<?php include "data.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý hoa - Admin</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        td, th {
            border: 1px solid #aaa;
            padding: 10px;
            text-align: center;
        }
        img { width: 80px; height: 80px; object-fit: cover; }
        button { padding: 5px 10px; }
    </style>
</head>
<body>

<h1>🌼 Quản trị danh sách hoa</h1>

<table>
    <tr>
        <th>STT</th>
        <th>Ảnh</th>
        <th>Tên hoa</th>
        <th>Mô tả</th>
        <th>Hành động</th>
    </tr>

    <?php foreach($flowers as $i => $f): ?>
        <tr>
            <td><?php echo $i+1; ?></td>
            <td><img src="images/<?php echo $f['img']; ?>"></td>
            <td><?php echo $f['name']; ?></td>
            <td><?php echo $f['desc']; ?></td>
            <td>
                <button>Sửa</button>
                <button>Xóa</button>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
