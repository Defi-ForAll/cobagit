<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "../config/config.php";
    
    // mengecek data GET dari ajax
    if (isset($_GET['id_post'])) {
        $id_post = $mysqli->real_escape_string($_GET['id_post']);
        
        // ambil data GET dari ajax
        $query = $mysqli->query("SELECT * FROM tbl_post WHERE id_post='$id_post'");
        
        // cek kesalahan pada query
        if (!$query) {
            die('Ada kesalahan pada query tampil data: ' . $mysqli->error);
        }
        
        // ambil data hasil query
        $data = $query->fetch_assoc();

        // cek jika data tidak ditemukan
        if (!$data) {
            echo json_encode(["error" => "Data tidak ditemukan"]);
        } else {
            // tampilkan data
            echo json_encode($data);
        }
    } else {
        echo json_encode(["error" => "ID tidak ditemukan"]);
    }
} else {
    // alihkan ke halaman index
    header('location: index.php');
}
?>
