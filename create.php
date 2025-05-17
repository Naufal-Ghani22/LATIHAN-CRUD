<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input
    if (empty($_POST['judul']) || empty($_POST['pengarang']) || empty($_POST['tahun']) || empty($_POST['isbn'])) {
        echo "Semua field harus diisi!";
    } else {
        $judul = $conn->real_escape_string($_POST['judul']);
        $pengarang = $conn->real_escape_string($_POST['pengarang']);
        $tahun = $conn->real_escape_string($_POST['tahun']);
        $isbn = $conn->real_escape_string($_POST['isbn']);
        
        // Query INSERT
        $sql = "INSERT INTO buku (judul, pengarang, tahun_terbit, isbn) VALUES ('$judul', '$pengarang', '$tahun', '$isbn')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
    <h2>Tambah Buku Baru</h2>
    <form method="post">
        Judul: <input type="text" name="judul" required><br>
        Pengarang: <input type="text" name="pengarang" required><br>
        Tahun Terbit: <input type="number" name="tahun" required><br>
        ISBN: <input type="text" name="isbn" required><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>