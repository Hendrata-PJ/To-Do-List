<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "todo_list");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari database
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>
    
    <!-- Form Tambah Kegiatan -->
    <form action="add_task.php" method="post">
        <input type="text" name="task" placeholder="Tambah kegiatan baru" required>
        <button type="submit">Tambah</button>
    </form>
    
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <?= htmlspecialchars($row['task']) ?>
                
                <!-- Tombol Edit -->
                <form action="edit_task.php" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="text" name="task" value="<?= htmlspecialchars($row['task']) ?>" required>
                    <button type="submit">Edit</button>
                </form>
                
                <!-- Tombol Hapus -->
                <form action="delete_task.php" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit">Hapus</button>
                </form>
            </li>
        <?php endwhile; ?>
    </ul>
    
</body>
</html>

<?php $conn->close(); ?>
