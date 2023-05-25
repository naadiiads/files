<?php
    $file_name = fopen("perpustakaan.txt", "a+");
    $status ='';
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $kode_buku = $_POST['kode_buku'];
        $judul_buku = $_POST['judul_buku'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $cover_buku = $_FILES['cover_buku'];

        $nameFile = $kode_buku.'-'.$cover_buku['name'];
        $temp = $cover_buku['tmp_name'];

        $directory_files = "cover/";

        $upload = move_uploaded_file($temp, $directory_files.$nameFile);
        if(!$upload){
            echo "<script>alert('Failed To Save the Image')</script>";
        }

        $data = '';
        $data .= $kode_buku."-";
        $data .= $judul_buku."-";
        $data .= $pengarang."-";
        $data .= $penerbit."-";
        $data .= $tahun_terbit."-";
        $data .= $directory_files.$nameFile."\n";

        $save_data = fwrite($file_name, $data);

        if($save_data == false) {
            $status = 'error';
        } else {
            $status = 'okay';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Data Perpustakaan</title>
</head>
<body>
    <div>
        <nav>
            <h1>PROGRAM PERPUSTAKAAN</h1>
            <ul>
                <div class="data">
                    <li>
                        <a href="index.php">Kembali ke Beranda</a>
                    </li>
                </div>
            </ul>
        </nav>
        <div>
            <main role="main">
                <?php
                    if($status == 'okay') {
                        echo "<br>Data Buku Berhasil Disimpan";
                    } elseif ($status == 'error') {
                        echo "<br>Data Buku Gagal Disimpan";
                    }
                ?>

                <h2>Tambah Data Buku Perpustakaan</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="kode_buku">Kode Buku</label>
                        <input type="number" name="kode_buku" id="kode_buku" placeholder="Kode Buku" required>
                    </div>
                    <div>
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" name="judul_buku" placeholder="Judul Buku" required>
                    </div>
                    <div>
                        <label for="pengarang">Pengarang Buku</label>
                        <input type="text" name="pengarang" placeholder="Pengarang" required>
                    </div>
                    <div>
                        <label for="penerbit">Penerbit Buku</label>
                        <input type="text" name="penerbit" placeholder="Penerbit Buku" required>
                    </div>
                    <div>
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" placeholder="Tahun Terbit Buku" required>
                    </div>
                    <div>
                        <label for="cover_buku">Gambar</label>
                        <input type="file" name="cover_buku" placeholder="Upload Disini" required>
                    </div>
                    <button type="submit">Save</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>