<?php
include 'config.php';

// Ambil data buku berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM buku WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input
    if (empty($_POST['judul']) || empty($_POST['pengarang']) || empty($_POST['tahun']) || empty($_POST['isbn'])) {
        echo "Semua field harus diisi!";
    } else {
        $id = $_POST['id'];
        $judul = $conn->real_escape_string($_POST['judul']);
        $pengarang = $conn->real_escape_string($_POST['pengarang']);
        $tahun = $conn->real_escape_string($_POST['tahun']);
        $isbn = $conn->real_escape_string($_POST['isbn']);
        
        // Query UPDATE
        $sql = "UPDATE buku SET judul='$judul', pengarang='$pengarang', tahun_terbit='$tahun', isbn='$isbn' WHERE id=$id";
        
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
    <title>Edit Buku</title>
</head>
<body>
    <h2>Edit Data Buku</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Judul: <input type="text" name="judul" value="<?php echo $row['judul']; ?>" required><br>
        Pengarang: <input type="text" name="pengarang" value="<?php echo $row['pengarang']; ?>" required><br>
        Tahun Terbit: <input type="number" name="tahun" value="<?php echo $row['tahun_terbit']; ?>" required><br>
        ISBN: <input type="text" name="isbn" value="<?php echo $row['isbn']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>