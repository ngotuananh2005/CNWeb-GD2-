<?php
// Tệp MODEL – chứa toàn bộ truy vấn CSDL

// TODO 1: Viết 1 hàm tên là getAllSinhVien() 
function getAllSinhVien($pdo) {
    $sql = "SELECT * FROM sinhvien1";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// TODO 2: Viết 1 hàm tên là addSinhVien()
function addSinhVien($pdo, $ten, $email) {
    $sql = "INSERT INTO sinhvien1 (ten_sinh_vien, email) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$ten, $email]);
}
?>
