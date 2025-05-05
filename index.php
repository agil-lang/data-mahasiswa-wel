<!DOCTYPE html>
<html>

<head>
    <title>Daftar Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #e0c3fc, #8ec5fc);
            min-height: 100vh;
        }

        h2 {
            text-align: center;
            color: #2c003e;
            margin-top: 30px;
            font-size: 36px;
            font-weight: bold;
        }

        a.button {
            text-decoration: none;
            color: white;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            padding: 12px 20px;
            border-radius: 6px;
            transition: 0.3s ease;
            font-size: 16px;
            font-weight: bold;
            display: inline-block;
        }

        a.button:hover {
            background: linear-gradient(to right, #5a0ebc, #1a60d2);
        }

        .button-container {
            text-align: center;
            margin: 20px 0;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto 40px auto;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background-color: white;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }

        th {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f3efff;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tr:hover {
            background-color: #e0d4f7;
        }

        .aksi a {
            margin: 0 5px;
            padding: 8px 12px;
            border-radius: 4px;
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        .edit {
            background: linear-gradient(to right, #28a745, #218838);
        }

        .edit:hover {
            background: linear-gradient(to right, #1f8e3c, #196f2e);
        }

        .hapus {
            background: linear-gradient(to right, #e83e8c, #c82362);
        }

        .hapus:hover {
            background: linear-gradient(to right, #c51f73, #a11d54);
        }
    </style>
</head>

<body>

    <h2>Daftar Mahasiswa</h2>
    <div class="button-container">
        <a class="button" href="tambah.php">+ Tambah Data Mahasiswa</a>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php
        include "koneksi.php";
        $query = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa");
        $no = 1;

        while ($data = mysqli_fetch_array($query)) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$data['npm']}</td>
                    <td>{$data['nama']}</td>
                    <td>{$data['prodi']}</td>
                    <td>{$data['email']}</td>
                    <td>{$data['alamat']}</td>
                    <td class='aksi'>
                        <a class='edit' href='edit.php?npm={$data['npm']}'>Edit</a>
                        <a class='hapus' href='hapus.php?npm={$data['npm']}' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>
                    </td>
                  </tr>";
            $no++;
        }
        ?>
    </table>

</body>

</html>
