<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "config/config.php";
    $path = "./uploads/";
    $id_produk = ($_POST['id_produk']);

    // query untuk image delete 
    $query1 = $mysqli->query("SELECT gambar,thumbnail FROM tbl_produk WHERE id_produk='$id_produk'");
    $data = $query1->fetch_assoc();


    $pecahnama = explode(';',$data['gambar']);
    $pecahthumb = explode(';',$data['thumbnail']);
    for ($i= 0; $i < count($pecahnama); $i++) { 
        $path_image = "./uploads/".$pecahnama[$i];
        $path_thumbs = "./uploads/thumbs/".$pecahthumb[$i];

        if (file_exists($path_image) && file_exists($path_thumbs)) {
            if (unlink($path_image) && unlink($path_thumbs)) {
                
            } else {
                echo "gagal menghapus";
            }
            
        } else {
            echo "tidak ada file";
        }
        
    }


    // mengecek data POST dari ajax
    if (isset($_POST['id_produk'])) {
        // ambil data hasil POST dari ajax
        $id_produk = $mysqli->real_escape_string($_POST['id_produk']);

        // sql statement untuk delete data dari tabel "tbl_siswa" berdasarkan "id_siswa"
        $delete = $mysqli->query("DELETE FROM tbl_produk WHERE id_produk='$id_produk'")
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
