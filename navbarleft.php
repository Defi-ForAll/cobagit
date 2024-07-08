<?php
    include('koneksi.php');

    $sql = "SELECT * FROM tbl_kategori_produk ORDER BY id_kategori ASC";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<li><a href='shop-grid.php?kategori=".$row['id_kategori']."'>".$row['nama_kategori']."</a></li>";
        }
    } else {
        echo "<li><a href=`#`>Kategori Tidak di Temukan</a></li>";
    }
    $conn->close();
?>