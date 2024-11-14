<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "todo_list");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM tasks WHERE id = $id";
    $conn->query($sql);
}

$conn->close();
header("Location: index.php");
exit();
?>
