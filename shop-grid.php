<?php
    include('header.php');
    require_once('koneksi.php');
?>
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Produk Kami</span>
                        </div>
                        <ul>
                        <?php include('navbarleft.php') ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <?php include('pencarian.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/inspirasi.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Cakra Safety</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Serambi</a>
                            <span>Produk Kami</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Kategori</h4>
                            <ul>
                               <?php
                                include('navbarleft.php');
                                ?>
                            </ul>
                        </div>
                        <div class="sidebar__item"> 
                            <div class="latest-product__text">
                                <h4>Produk Terkini</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        <?php 
                                             $sql_produk = "SELECT * FROM tbl_produk WHERE id_kategori = '4' LIMIT 3";
                                             $result_produk = $conn->query($sql_produk);
                                            if($result_produk->num_rows > 0){
                                                while($row_produk = $result_produk->fetch_assoc()){
                                                $potong = explode(";", $row_produk['thumbnail']);
                                        ?>
                                        <a href="shop-details.php?produk=<?php echo $row_produk['id_produk'] ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="http://localhost/cakrasafety/stok/uploads/thumbs/<?php echo $potong[0]; ?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $row_produk['judul'] ?></h6>
                                            </div>
                                        </a>
                                        <?php 
                                            }}
                                        ?>
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                    <?php 
                                             $sql_produk = "SELECT * FROM tbl_produk WHERE id_kategori = '3' LIMIT 3";
                                             $result_produk = $conn->query($sql_produk);
                                            if($result_produk->num_rows > 0){
                                                while($row_produk = $result_produk->fetch_assoc()){
                                                $potong = explode(";", $row_produk['thumbnail']);
                                        ?>
                                        <a href="shop-details.php?produk=<?php echo $row_produk['id_produk'] ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="http://localhost/cakrasafety/stok/uploads/thumbs/<?php echo $potong[0]; ?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $row_produk['judul'] ?></h6>
                                            </div>
                                        </a>
                                        <?php 
                                            }}
                                        ?>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                   
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <!-- <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select> -->
                                </div>
                            </div>

                            <?php
                            if(!isset($_GET['kategori'])){
                                $sql_total_records = "SELECT COUNT(*) AS total FROM tbl_produk";
                                $result_total = $conn->query($sql_total_records);
                                $row_total = $result_total->fetch_assoc();
                                $total_records = $row_total['total'];                                
                            ?>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6>Tersedia<span> <?=$total_records?></span> Produk Kami</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <!-- <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php 
                            $records_per_page = 9;
                            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                                $current_page = (int) $_GET['page'];
                            } else {
                                $current_page = 1;
                            }
    
                            $offset = ($current_page - 1) * $records_per_page;
    
                            // Ambil data
                            $sql = "SELECT * FROM tbl_produk LIMIT $records_per_page OFFSET $offset";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                $potonggambar =  explode(";", $row['thumbnail']);
                        ?>
                        <div class="col-lg-2 col-md-2 col-sm-6 mix oranges fresh-meat">
                            <div class="featured__item">
                                <a href="shop-details.php?produk=<?php echo $row['id_produk']; ?>&kat=<?php echo $row['id_kategori'] ?>">
                                <div style="max-height: 150px; border-radius:10px" class="featured__item__pic set-bg" data-setbg="http://localhost/cakrasafety/stok/uploads/thumbs/<?php echo $potonggambar[0]; ?>">            </div>
                                <div class="featured__item__text">
                                    <h6><b><?php echo $row['judul']; ?></b></h6>
                                    <!-- <h5><i class="fa fa-star"></i> 4.8 </h5> -->
                                </div>
                                </a>
                            </div>
                        </div>
                        <?php
                        }
                        }
                        
                        ?> 
                    </div>
                    <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <?php 
                                    // Temukan total jumlah data
                                    $sql_total_records = "SELECT COUNT(*) AS total FROM tbl_produk";
                                    $result_total = $conn->query($sql_total_records);
                                    $row_total = $result_total->fetch_assoc();
                                    $total_records = $row_total['total'];
                                    $total_pages = ceil($total_records / $records_per_page);
                                
                                if ($current_page > 1) {
                                    echo '<a href="?page=' . ($current_page - 1) . '"><i class="fa fa-long-arrow-left"></i></a>';
                                }
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $current_page) {
                                        echo '<a href="?page=' . $i . '">' . $i . '</a>';
                                    } else {
                                        echo '<a href="?page=' . $i . '">' . $i . '</a>';
                                    }
                                }
                                if ($current_page < $total_pages) {
                                    echo '<a href="?page=' . ($current_page + 1) . '"><i class="fa fa-long-arrow-right"></i></a>';
                                }
                                
                            } else {
                                $kategori = $_GET['kategori'];
                                $sql_total_records = "SELECT COUNT(*) AS total FROM tbl_produk WHERE id_kategori=$kategori";
                                $result_total = $conn->query($sql_total_records);
                                $row_total = $result_total->fetch_assoc();
                                $total_records = $row_total['total'];                                
                            ?>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6>Tersedia<span> <?=$total_records?></span> Produk Kami</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <!-- <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php 
                            $records_per_page = 3;
                            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                                $current_page = (int) $_GET['page'];
                            } else {
                                $current_page = 1;
                            }
    
                            $offset = ($current_page - 1) * $records_per_page;
    
                            // Ambil data
                            $sql = "SELECT * FROM tbl_produk WHERE id_kategori=$kategori LIMIT $records_per_page OFFSET $offset";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                $potonggambar =  explode(";", $row['thumbnail']);
                        ?>
                       <div class="col-lg-2 col-md-2 col-sm-6 mix oranges fresh-meat">
                            <div class="featured__item">
                                <a href="shop-details.php?produk=<?php echo $row['id_produk']; ?>&kat=<?php echo $row['id_kategori'] ?>">
                                <div style="max-height: 150px; border-radius:10px" class="featured__item__pic set-bg" data-setbg="http://localhost/cakrasafety/stok/uploads/thumbs/<?php echo $potonggambar[0]; ?>">            </div>
                                <div class="featured__item__text">
                                    <h6><b><?php echo $row['judul']; ?></b></h6>
                                    <!-- <h5><i class="fa fa-star"></i> 4.8 </h5> -->
                                </div>
                                </a>
                            </div>
                        </div>
                        <?php
                        }
                        }
                        
                        ?> 
                    </div>
                    <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <?php 
                                    // Temukan total jumlah data
                                    $sql_total_records = "SELECT COUNT(*) AS total FROM tbl_produk WHERE id_kategori=$kategori";
                                    $result_total = $conn->query($sql_total_records);
                                    $row_total = $result_total->fetch_assoc();
                                    $total_records = $row_total['total'];
                                    $total_pages = ceil($total_records / $records_per_page);
                                
                                if ($current_page > 1) {
                                    echo '<a href="?page=' . ($current_page - 1) . '"><i class="fa fa-long-arrow-left"></i></a>';
                                }
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $current_page) {
                                        echo '<a href="?page=' . $i . '">' . $i . '</a>';
                                    } else {
                                        echo '<a href="?page=' . $i . '">' . $i . '</a>';
                                    }
                                }
                                if ($current_page < $total_pages) {
                                    echo '<a href="?page=' . ($current_page + 1) . '"><i class="fa fa-long-arrow-right"></i></a>';
                                }
                            }
                            ?>
                                <!-- <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a> -->
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
<style>
    .latest-product__item__pic img {
        max-height: 100px;
    }
</style>
<?php
    include('footer.php');
?>