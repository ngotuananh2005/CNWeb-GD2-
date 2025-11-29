<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload CSV Bài 4</title>
</head>
<body>

<h2>Upload file CSV để lưu vào CSDL</h2>

<form action="process.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="csv_file" accept=".csv" required>
    <button type="submit" name="upload">Upload & Lưu</button>
</form>

</body>
</html>
