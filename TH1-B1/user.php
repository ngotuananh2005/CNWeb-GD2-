<?php include "data.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách loài hoa</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .flower {
            width: 300px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        img { width: 100%; border-radius: 10px; }
        h3 { margin-bottom: 5px; }
    </style>
</head>
<body>

<h1>🌸 Danh sách các loài hoa</h1>

<?php foreach($flowers as $f): ?>
    <div class="flower">
        <img src="images/<?php echo $f['img']; ?>">
        <h3><?php echo $f["name"]; ?></h3>
        <p><?php echo $f["desc"]; ?></p>
    </div>
<?php endforeach; ?>

</body>
</html>
