<?php
    $status = isset($_GET['status']) ? $_GET['status'] : ' ';
    $file_name = "perpustakaan.txt";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Perpustakaan Buku</title>
</head>
<body>
    <div>
        <nav>
            <h1>PROGRAM PERPUSTAKAAN</h1>
            <ul>
                <div class="data">
                    <li>
                        <a href="tambah.php">Tambah Data Perpustakaan</a>
                    </li>
                </div>
            </ul>
        </nav>
        <div>
            <main role="main">
                <?php
                    if($status == 'okay') {
                        echo "<br>Data Buku Berhasil ditambah";
                    } elseif ($status == 'error') {
                        echo "<br>Data Buku Gagal Disimpan";
                    }
                ?>
                <h2>DATA BUKU</h2>
                <div>
                    <table style="margin-left:auto; margin-right:auto" border="2">
                        <thead>
                            <tr>
                                <th>Kode Buku</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Cover</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach (file($file_name) as $line) :
                                    $dataBuku = explode("-", $line);
                            ?>
                            <tr>
                                <td><?= $dataBuku[0]; ?></td>
                                <td><?= $dataBuku[1]; ?></td>
                                <td><?= $dataBuku[2]; ?></td>
                                <td><?= $dataBuku[3]; ?></td>
                                <td><?= $dataBuku[4]; ?></td>
                                <td><img src="./<?= $dataBuku[5]; ?>" alt="gambar" width="200px"></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>