<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "todo_list");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['task'])) {
    $task = $_POST['task'];
    $sql = "INSERT INTO tasks (task) VALUES ('$task')";
    $conn->query($sql);
}

$conn->close();
header("Location: index.php");
exit();
?>
