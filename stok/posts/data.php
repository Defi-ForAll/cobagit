<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // nama tabel
    $table = 'tbl_post';
    // primary key tabel
    $primaryKey = 'id_post';

    // membuat array untuk menampilkan isi tabel.
    // Parameter 'db' mewakili nama kolom dalam database.
    // parameter 'dt' mewakili pengenal kolom pada DataTable.
    $columns = array(
        array( 'db' => 'id_post', 'dt' => 1 ),
        array( 'db' => 'judul', 'dt' => 2 ),
        array( 'db' => 'deskripsi', 'dt' => 3 ),
        array( 'db' => 'creator', 'dt' => 4 ),
        array( 'db' => 'tgl_upload', 'dt' => 5 ),
        array( 'db' => 'gambar', 'dt' => 6 ),
    );

    // memanggil file "database.php" untuk informasi koneksi ke server SQL
    require_once "../config/database.php";
    // memanggil file "ssp.class.php" untuk menjalankan datatables server-side processing
    require '../config/ssp.class.php';

    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    );
}
// jika tidak ada ajax request
else {
    // alihkan ke halaman index
    header('location: index.php');
}
