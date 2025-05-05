<?php
include "koneksi.php";

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    $query = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE npm='$npm'");
    $data = mysqli_fetch_assoc($query);
} else {
    echo "<script>alert('NPM tidak ditemukan'); window.location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e0c3fc, #8ec5fc);
            margin: 0;
            padding: 0;
        }

        form {
            width: 400px;
            margin: 40px auto;
            padding: 25px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h3 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        input[type="submit"] {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            padding: 10px 20px;
            border: none;
            font-size: 14px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        input[type="submit"]:hover {
            background: linear-gradient(to right, #5a0ebc, #1a60d2);
        }

        a {
            display: inline-block;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            color: white;
            padding: 8px 16px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border-radius: 6px;
            transition: 0.3s ease;
        }

        a:hover {
            background: linear-gradient(to right, #5a0ebc, #1a60d2);
        }

        .back-container {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <form action="" method="post">
        <h3>Edit Data Mahasiswa</h3>
        <table>
            <tr>
                <td>NPM:</td>
                <td><input type="text" name="npm" value="<?= $data['npm'] ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama" value="<?= $data['nama'] ?>" required></td>
            </tr>
            <tr>
                <td>Program Studi:</td>
                <td>
                    <select name="prodi" required>
                        <option value="">--Pilih Prodi--</option>
                        <?php
                        $prodi_list = ["Pendidikan Informatika", "Teknologi Informasi", "Sistem Informasi", "Teknik Komputer", "Teknik Informatika"];
                        foreach ($prodi_list as $p) {
                            $selected = ($p == $data['prodi']) ? "selected" : "";
                            echo "<option value='$p' $selected>$p</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" value="<?= $data['email'] ?>"></td>
            </tr>
            <tr>
                <td>Alamat:</td>
                <td><textarea name="alamat"><?= $data['alamat'] ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="update" value="Update Data"></td>
            </tr>
        </table>
    </form>

    <div class="back-container">
        <a href="index.php">← Kembali ke Daftar Mahasiswa</a>
    </div>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];

        $update = mysqli_query($conn, "UPDATE tbl_mahasiswa SET 
        nama='$nama',
        prodi='$prodi',
        email='$email',
        alamat='$alamat' 
        WHERE npm='$npm'");

        if ($update) {
            echo "<script>alert('Data berhasil diperbarui'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Data gagal diperbarui');</script>";
        }
    }
    ?>
</body>

</html>
