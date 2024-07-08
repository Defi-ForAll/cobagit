<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "config/config.php";

    // mengecek data POST dari ajax
    if (isset($_POST['id_produk'])) {
        // ambil data hasil POST dari ajax
        $id_produk = $mysqli->real_escape_string($_POST['id_produk']);

        // sql statement untuk delete data dari tabel "tbl_siswa" berdasarkan "id_siswa"
        $delete = $mysqli->query("DELETE FROM tbl_stok WHERE id_produk='$id_produk'")
                                  or die('Ada kesalahan pada query delete : ' . $mysqli->error);
        // cek query
        // jika proses delete berhasil
        if ($delete) {
            // tampilkan pesan "sukses"
            echo "sukses";
        }
    }
}
// jika tidak ada ajax request
else {
    // alihkan ke halaman index
    header('location: index.php');
}
