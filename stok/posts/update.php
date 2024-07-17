<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "../config/config.php";
     require_once "../config/image_uploads_post.php";
    $id_produk = ($_POST['id_post']);
    // mengecek data POST dari ajax
    if (isset($id_produk)) {
        // ambil data hasil POST dari ajax
        $judul       = $mysqli->real_escape_string($_POST['judul']);
        $datetime       = $mysqli->real_escape_string($_POST['datetime']);
        $nama_pembuat       = $mysqli->real_escape_string($_POST['nama_pembuat']);
        // conversi datetime yang awalnya ada huruf 'T' karena ini adalah inputan dasar
        $deskripsi       = $mysqli->real_escape_string($_POST['keterangan']);
        $foto       = $mysqli->real_escape_string($_POST['foto']);
      
        if(isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK){
            $response = uploadFiles($_FILES['foto']);
            // array_push($nama, $response);
            $imagepath = "../uploads/post/". $foto;

            // INSERT INTO tbl_post(id_post,judul,deskripsi,creator,tgl_upload,gambar) 
                                // VALUES ('$id_post','$judul','$deskripsi','$nama_pembuat','$datetime','$response');
            $update = $mysqli->query("UPDATE tbl_post SET id_post='$id_post',judul='$judul', deskripsi='$deskripsi',gambar='$response',creator='$creator',tgl_upload='$datetime' WHERE id_post='$id_post'")or die('Ada kesalahan pada query update : ' . $mysqli->error); 

            if (file_exists($imagepath)) {
                unlink($imagepath);
            }
        } else {
            $update = $mysqli->query("UPDATE tbl_post SET id_post='$id_post',judul='$judul', deskripsi='$deskripsi',creator='$creator',tgl_upload='$datetime' WHERE id_post='$id_post'")or die('Ada kesalahan pada query update : ' . $mysqli->error); 

        }

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
