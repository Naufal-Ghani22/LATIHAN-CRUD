<?php
include 'config.php';

// Query untuk mengambil semua data buku
$sql = "SELECT * FROM buku";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
</head>
<body>
    <h2>Daftar Buku</h2>
    <a href="create.php">Tambah Buku Baru</a>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>ISBN</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>".$row['id']."</td>
                    <td>".$row['judul']."</td>
                    <td>".$row['pengarang']."</td>
                    <td>".$row['tahun_terbit']."</td>
                    <td>".$row['isbn']."</td>
                    <td>
                        <a href='edit.php?id=".$row['id']."'>Edit</a>
                        <a href='delete.php?id=".$row['id']."'>Hapus</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data buku</td></tr>";
        }
        ?>
    </table>
</body>
</html>