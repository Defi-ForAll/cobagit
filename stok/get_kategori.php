<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
 if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "config/config.php";
        // sql statement untuk menampilkan Berbagai kategori dari table kategori
        $query = $mysqli->query("SELECT * FROM `tbl_kategori_produk`")
                                or die('Ada kesalahan pada query tampil data : ' . $mysqli->error);
        // ambil data hasil query
        // cek isi dari kategori
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $kategori[] = $row;
            }
        }
        

        // tampilkan data
        echo json_encode($kategori);

// jika tidak ada ajax request
 } else {
    // alihkan ke halaman index
    // header('location: index.php');
 }
