<?php
    include('header.php');

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
                        <!-- <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div> -->
                        <div class="sidebar__item"> 
                            <div class="latest-product__text">
                                <h4>Produk Terkini</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        <?php 
                                            include('koneksi.php');
                                             $sql_produk = "SELECT * FROM tbl_produk WHERE id_kategori = '1' LIMIT 3";
                                             $result_produk = $conn->query($sql_produk);
                                            if($result_produk->num_rows > 0){
                                                while($row_produk = $result_produk->fetch_assoc()){
                                                $potong = explode(";", $row_produk['gambar']);
                                        ?>
                                        <a href="shop-details.php?produk=<?php echo $row_produk['id_produk'] ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="http://localhost/cakrasafety/gambar/produk/<?php echo $potong[0]; ?>" alt="">
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
                                            include('koneksi.php');
                                             $sql_produk = "SELECT * FROM tbl_produk WHERE id_kategori = '3' LIMIT 3";
                                             $result_produk = $conn->query($sql_produk);
                                            if($result_produk->num_rows > 0){
                                                while($row_produk = $result_produk->fetch_assoc()){
                                                $potong = explode(";", $row_produk['gambar']);
                                        ?>
                                        <a href="shop-details.php?produk=<?php echo $row_produk['id_produk'] ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="http://localhost/cakrasafety/gambar/produk/<?php echo $potong[0]; ?>" alt="">
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
                    <!-- <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Terbatas Disini</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/product/discount/pd-1.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/product/discount/pd-2.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Vegetables</span>
                                            <h5><a href="#">Vegetables’package</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/product/discount/pd-3.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Mixed Fruitss</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/product/discount/pd-4.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/product/discount/pd-5.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/product/discount/pd-6.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
                                $potonggambar =  explode(";", $row['gambar']);
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="http://localhost/cakrasafety/gambar/produk/<?php echo $potonggambar[0]; ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="shop-details.php?produk=<?php echo $row['id_produk'] ?>"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="shop-details.php?produk=<?php echo $row['id_produk'] ?>"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="shop-details.php?produk=<?php echo $row['id_produk'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="shop-details.php?produk=<?php echo $row['id_produk'] ?>"><?php echo $row['judul']; ?></a></h6>
                                    <!-- <h5>$30.00</h5> -->
                                </div>
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
                                $potonggambar =  explode(";", $row['gambar']);
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="http://localhost/cakrasafety/gambar/produk/<?php echo $potonggambar[0]; ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="shop-details.php?produk=<?php echo $row['id_produk'] ?>"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="shop-details.php?produk=<?php echo $row['id_produk'] ?>"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="shop-details.php?produk=<?php echo $row['id_produk'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="shop-details.php?produk=<?php echo $row['id_produk'] ?>"><?php echo $row['judul']; ?></a></h6>
                                    <!-- <h5>$30.00</h5> -->
                                </div>
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