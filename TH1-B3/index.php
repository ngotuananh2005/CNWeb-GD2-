<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Đọc File CSV</title>
</head>
<body>

<h2>Upload file CSV để xem nội dung</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="csv_file" accept=".csv">
    <button type="submit" name="read">Đọc file</button>
</form>

<hr>

<?php
if (isset($_POST['read'])) {

    if (!empty($_FILES['csv_file']['tmp_name'])) {

        $file = fopen($_FILES['csv_file']['tmp_name'], "r");

        echo "<table border='1' cellpadding='5'>";

        while (($row = fgetcsv($file)) !== false) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";

        fclose($file);

    } else {
        echo "<p style='color:red'>Chưa chọn file CSV!</p>";
    }
}
?>

</body>
</html>
    