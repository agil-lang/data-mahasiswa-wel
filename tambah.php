<!DOCTYPE html>
<html>

<head>
    <title>Form Tambah Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e0c3fc, #8ec5fc);
            margin: 0;
            padding: 0;
        }

        h3 {
            text-align: center;
            color: #2c003e;
            margin-top: 30px;
        }

        p {
            text-align: center;
            color: #333;
        }

        form {
            width: 400px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
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
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        input[type="submit"] {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        input[type="submit"]:hover {
            background: linear-gradient(to right, #5a0ebc, #1a60d2);
        }

        a.back-button {
            display: inline-block;
            padding: 8px 16px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.3s ease;
        }

        a.back-button:hover {
            background: linear-gradient(to right, #5a0ebc, #1a60d2);
        }

        .back-container {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h3>Entry Data Mahasiswa</h3>
    <p>Silakan masukkan data mahasiswa berdasarkan formulir berikut:</p>

    <form action="" method="post">
        <table>
            <tr>
                <td><label for="npm">NPM:</label></td>
                <td><input type="text" name="npm" id="npm" maxlength="12" required></td>
            </tr>
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input type="text" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <td><label for="prodi">Program Studi:</label></td>
                <td>
                    <select name="prodi" id="prodi" required>
                        <option value="">--Pilih Prodi--</option>
                        <option value="Pendidikan Informatika">Pendidikan Informatika</option>
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Komputer">Teknik Komputer</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat:</label></td>
                <td><textarea name="alamat" id="alamat" rows="3"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Simpan Data"></td>
            </tr>
        </table>
    </form>

    <div class="back-container">
        <a class="back-button" href="index.php">← Kembali ke Daftar Mahasiswa</a>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];

        include "koneksi.php";

        $hasil = mysqli_query($conn, "INSERT INTO tbl_mahasiswa (npm, nama, prodi, email, alamat) 
                                      VALUES ('$npm', '$nama', '$prodi', '$email', '$alamat')");

        if ($hasil) {
            echo "<script>alert('Data berhasil disimpan'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Data gagal disimpan');</script>";
        }
    }
    ?>
</body>

</html>
