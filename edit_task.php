<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "todo_list");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['id']) && isset($_POST['task'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];
    $sql = "UPDATE tasks SET task = '$task' WHERE id = $id";
    $conn->query($sql);
}

$conn->close();
header("Location: index.php");
exit();
?>
