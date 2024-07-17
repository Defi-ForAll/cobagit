<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "../config/config.php";
    require_once "../config/image_uploads_post.php";

    // membuat id_unik
    $timestamp = time();
    $random = generateRandomString(6);
    $id_post = $random."_".$timestamp;
    // ambil data hasil POST dari ajax
    $judul       = $mysqli->real_escape_string($_POST['judul']);
    $datetime       = $mysqli->real_escape_string($_POST['datetime']);
    $nama_pembuat       = $mysqli->real_escape_string($_POST['nama_pembuat']);
    // conversi datetime yang awalnya ada huruf 'T' karena ini adalah inputan dasar
    $deskripsi       = $mysqli->real_escape_string($_POST['deskripsi']);

    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK){
        $response = uploadFiles($_FILES['foto']);
    }

    // lakukan proses unggah file
    // jika file berhasil diunggah
        //sql statement untuk insert data ke tabel "tbl_siswa"
        $insert = $mysqli->query("INSERT INTO tbl_post(id_post,judul,deskripsi,creator,tgl_upload,gambar) 
                                VALUES ('$id_post','$judul','$deskripsi','$nama_pembuat','$datetime','$response')")
                               or die('Ada kesalahan pada query insert : ' . $mysqli->error);
        //cek query
        // jika proses insert berhasil
        if ($insert) {
            // tampilkan pesan "sukses"
            echo "sukses";
        }
    }
// jika tidak ada ajax request
else {
    // alihkan ke halaman index
    header('location: index.php');
}

// fungsi untuk mendapatkan nama string unik

?>