<?php
require "connect.php";

if (isset($_POST["upload"])) {

    if (!empty($_FILES["csv_file"]["tmp_name"])) {

        $file = fopen($_FILES["csv_file"]["tmp_name"], "r");

        $isHeader = true;
        $countInsert = 0;
        $countSkip = 0;

        while (($row = fgetcsv($file)) !== false) {

            if ($isHeader) { 
                $isHeader = false;
                continue;
            }

            $username  = $conn->real_escape_string($row[0]);
            $password  = $conn->real_escape_string($row[1]);
            $lastname  = $conn->real_escape_string($row[2]);
            $firstname = $conn->real_escape_string($row[3]);
            $city      = $conn->real_escape_string($row[4]);
            $email     = $conn->real_escape_string($row[5]);
            $course1   = $conn->real_escape_string($row[6]);

            $check = $conn->query("SELECT * FROM students WHERE username='$username'");
            if ($check->num_rows > 0) {
                $countSkip++;
                continue;
            }

            $sql = "INSERT INTO students(username, password, lastname, firstname, city, email, course1)
                    VALUES('$username', '$password', '$lastname', '$firstname', '$city', '$email', '$course1')";

            if ($conn->query($sql)) {
                $countInsert++;
            }
        }

        fclose($file);

        echo "<h3>NHẬP DỮ LIỆU HOÀN TẤT</h3>";
        echo "✔ Thêm thành công: <b>$countInsert</b> dòng<br>";
        echo "⚠ Bỏ qua (trùng): <b>$countSkip</b> dòng<br>";
        echo "<br><a href='index.php'>Quay lại</a>";
    }
}
?>
