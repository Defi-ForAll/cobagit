<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "config/config.php";

    // mengecek data POST dari ajax
    if (isset($_POST['id_produk'])) {
        // ambil data hasil POST dari ajax
        $id_produk      = $mysqli->real_escape_string($_POST['id_produk']);
        $nama_produk       = $mysqli->real_escape_string(trim($_POST['nama_produk']));
        $stok         = $mysqli->real_escape_string($_POST['stok']);
        $keterangan  = $mysqli->real_escape_string(trim($_POST['keterangan']));


        // ubah format tanggal menjadi Tahun-Bulan-Hari (Y-m-d) sebelum disimpan ke database
        // $tanggal_daftar = date('Y-m-d', strtotime($tanggal));


        // sql statement untuk update data di tabel "tbl_siswa" berdasarkan "id_siswa"
        $update = $mysqli->query("UPDATE tbl_stok
                                    SET id_produk='$id_produk', nama_produk='$nama_produk', stok='$stok', keterangan='$keterangan'
                                    WHERE id_produk='$id_produk'")
                                    or die('Ada kesalahan pada query update : ' . $mysqli->error);
        // cek query
        // jika proses update berhasil
        if ($update) {
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
