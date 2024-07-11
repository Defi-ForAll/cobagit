<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "config/config.php";
     require_once "config/image_uploads.php";
    $id_produk = ($_POST['id_produk']);
    // mengecek data POST dari ajax
    if (isset($id_produk)) {
        // ambil data hasil POST dari ajax
        $nama_produk       = $mysqli->real_escape_string($_POST['nama_produk']);
        $kategori       = $mysqli->real_escape_string($_POST['kategori']);
        $datetime       = $mysqli->real_escape_string($_POST['datetime']);
        // conversi datetime yang awalnya ada huruf 'T' karena ini adalah inputan dasar
        $waktu_simpan = str_replace('T',' ',$datetime);
        $waktu_simpan = str_replace('/','-',$waktu_simpan);
        $harga       = $mysqli->real_escape_string(preg_replace('/\D/', '', $_POST['harga']));
        $stok_produk       = $mysqli->real_escape_string($_POST['stok_produk']);
        $penyimpanan       = $mysqli->real_escape_string($_POST['penyimpanan']);
        $keterangan  = $mysqli->real_escape_string($_POST['keterangan']);


        $query1 = $mysqli->query("SELECT gambar,thumbnail FROM tbl_produk WHERE id_produk='$id_produk'");
        $data = $query1->fetch_assoc();
        $pecahnama = explode(';',$data['gambar']);
        $pecahthumb = explode(';',$data['thumbnail']);
      
        for ($i= 0; $i <= 3; $i++) { 
            $imagekey = "foto".$i + 1;
            if(isset($_FILES[$imagekey]) && $_FILES[$imagekey]['error'] == UPLOAD_ERR_OK){
               $response = uploadFiles($_FILES[$imagekey]);
                // array_push($nama, $response);

               $pecahnama[$i] = $response;
               $pecahthumb[$i] = "thumbnail_".$response;
            }
        }
        $gabungan_nama = implode(';',$pecahnama);
        $gabungan_nama_thum = implode(';',$pecahthumb);


        // ubah format tanggal menjadi Tahun-Bulan-Hari (Y-m-d) sebelum disimpan ke database
        // $tanggal_daftar = date('Y-m-d', strtotime($tanggal));
        if (!empty($gabungan_nama)) {
            $update = $mysqli->query("UPDATE tbl_produk SET id_kategori='$kategori',judul='$nama_produk', deskripsi='$keterangan',gambar='$gabungan_nama',thumbnail='$gabungan_nama_thum',tgl_upload='$waktu_simpan',harga='$harga',stok='$stok_produk',tmpt_simpan='$penyimpanan' WHERE id_produk='$id_produk'")or die('Ada kesalahan pada query update : ' . $mysqli->error); 
        } else {
             $update = $mysqli->query("UPDATE tbl_produk SET id_kategori='$kategori',judul='$nama_produk', deskripsi='$keterangan', tgl_upload='$waktu_simpan',harga='$harga',stok='$stok_produk',tmpt_simpan='$penyimpanan' WHERE id_produk='$id_produk'")or die('Ada kesalahan pada query update : ' . $mysqli->error);
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
