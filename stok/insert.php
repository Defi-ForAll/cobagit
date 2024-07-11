<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "config/config.php";
    require_once "config/image_uploads.php";

    // membuat id_unik
    $timestamp = time();
    $random = generateRandomString(5);
    $id_produk = $random."_".$timestamp;
    // ambil data hasil POST dari ajax
    $nama_produk       = $mysqli->real_escape_string($_POST['nama_produk']);
    $kategori       = $mysqli->real_escape_string($_POST['kategori']);
    $datetime       = $mysqli->real_escape_string($_POST['datetime']);
    // conversi datetime yang awalnya ada huruf 'T' karena ini adalah inputan dasar
    $waktu_simpan = str_replace('T',' ',$datetime);
    $waktu_simpan = str_replace('/','-',$waktu_simpan);
    $harga       = $mysqli->real_escape_string(preg_replace('/\D/', '', $_POST['harga']););
    $stok_produk       = $mysqli->real_escape_string($_POST['stok_produk']);
    $penyimpanan       = $mysqli->real_escape_string($_POST['penyimpanan']);
    $keterangan  = $mysqli->real_escape_string($_POST['keterangan']);

    // pengulangan untuk mendapatkan berbagai nama file yang telah di upload
    $nama = array(); // menyimpan nama gambar yang sudah dirubah
    $nama_thumbnail = array(); // menyimpan nama gambar thumbnail yang sudah dirubah
    for ($i=1; $i <= 3; $i++) { 
        $imagekey = "foto".$i;
        if(isset($_FILES[$imagekey]) && $_FILES[$imagekey]['error'] == UPLOAD_ERR_OK){
           $response = uploadFiles($_FILES[$imagekey]);
            array_push($nama, $response);
            array_push($nama_thumbnail, "thumbnail_".$response);
        }
    }
    $gabungan_nama = implode(';',$nama);
    $gabungan_nama_thum = implode(';',$nama_thumbnail);
    // lakukan proses unggah file
    // jika file berhasil diunggah
        //sql statement untuk insert data ke tabel "tbl_siswa"
        $insert = $mysqli->query("INSERT INTO tbl_produk(id_produk, id_kategori,judul, deskripsi,gambar,thumbnail,tgl_upload,harga,stok,tmpt_simpan) 
                               VALUES('$id_produk', '$kategori','$nama_produk', '$keterangan','$gabungan_nama','$gabungan_nama_thum','$waktu_simpan','$harga'
                               ,'$stok_produk','$penyimpanan')")
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