<?php
    $id = $_GET['produk'];
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
                        <?php  include('pencarian.php') ?>
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
                        <h2>Produk Deskripsi</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Serambi</a>
                            <a href="./shop-grid.php">Persembahan Kami</a>
                            <span>Produk Deskripsi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <?php 
                    include('koneksi.php');
                     $sql = "SELECT * FROM tbl_produk WHERE id_produk='$id'";
                     $result = $conn->query($sql);
                     $row = $result->fetch_assoc();
                     $potong = explode(";", $row['gambar']);
                     $potong_thumbnail = explode(";", $row['thumbnail']);
                     $id_kategori_produk = $row['id_kategori'];
                ?>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                             <img class="product__details__pic__item--large"
                                src="http://localhost/cakrasafety/stok/uploads/<?php echo $potong[0]; ?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <?php
                            for($i=0;$i < count($potong_thumbnail);$i++) {
                            ?>
                           
                            <img data-imgbigurl="http://localhost/cakrasafety/stok/uploads/thumbs/<?=$potong_thumbnail[$i] ?>"
                                src="http://localhost/cakrasafety/stok/uploads/thumbs/<?=$potong_thumbnail[$i] ?>" alt="">
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $row['judul']; ?></h3>
                        <!-- <div class="product__details__price">$50.00</div> -->
                        <p><?php echo $row['deskripsi']; ?></p>
                        <!-- <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div> -->
                        <a href="#" class="primary-btn">Salin Link Kami</a>
                        <!-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> -->
                        <ul>
                            <!-- <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li> -->
                            <li><b>Belanja Di</b>
                                <div class="share">
                                    <a href="#"><img src="img/ecommerce/shopee.png" alt=""  srcset=""></a>
                                    <a href="#"><img src="img/ecommerce/tiktok.png" alt="" srcset=""></a>
                                    <a href="#"><img src="img/ecommerce/tokopedia.png" alt="" srcset=""></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Deskripsi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Informasi</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li> -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Produk Deskripsi</h6>
                                    <p><?php echo $row['deskripsi']; ?></p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Informasi dari Kami</h6>
                                    <p>Kami adalah toko yang mengkhususkan diri dalam menyediakan produk-produk berkualitas melalui platform online. Untuk kenyamanan Anda, kami menawarkan berbagai cara untuk berbelanja, termasuk melalui WhatsApp dan beberapa e-commerce terpercaya.</p>

                                    <p>Mengapa Berbelanja dengan Kami:</p>

                                    <p>Harga Lebih Murah di WhatsApp: Nikmati harga yang lebih hemat ketika Anda berbelanja langsung melalui WhatsApp. Kami menawarkan diskon khusus dan penawaran eksklusif yang hanya tersedia untuk pelanggan setia kami yang bertransaksi melalui WhatsApp. Hubungi kami di +62 897 0237 077
                                    untuk mendapatkan penawaran terbaik hari ini!</p>

                                    <p>Kemudahan Berbelanja di E-commerce: Anda juga dapat menemukan produk-produk kami di berbagai platform e-commerce. Kami hadir di Tokopedia, Shoope, dan Tiktok untuk memberikan Anda berbagai pilihan dalam berbelanja sesuai dengan preferensi Anda.</p>

                                    <p>Klaim Garansi Mudah: Kami memahami pentingnya layanan purna jual yang handal. Jika Anda perlu mengklaim garansi, Anda dapat langsung mengunjungi gerai resmi kami di [Alamat Gerai Resmi]. Tim kami akan dengan senang hati membantu Anda menyelesaikan segala keperluan garansi dengan cepat dan efisien.</p>

                                    <p>Cara Berbelanja di WhatsApp:</p>

                                    <p>Kirim pesan ke +62 897 0237 077 dengan produk yang Anda inginkan. Dapatkan informasi detail produk dan harga spesial dari tim kami. Lakukan pembayaran melalui metode yang tersedia. Produk akan segera kami kirimkan ke alamat Anda dengan aman. Kontak Kami:</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Produk Berelasi</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
                include('koneksi.php');
                $sql2 = "SELECT * FROM tbl_produk WHERE id_kategori=$id_kategori_produk LIMIT 3";
                $result2 = $conn->query($sql2);               
                if($result2->num_rows > 0){
                while($row2 = $result2->fetch_assoc()){
                     $potong2 = explode(";", $row2['thumbnail']);
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="http://localhost/cakrasafety/stok/uploads/thumbs/<?php  echo $potong2[0]; ?>" alt="">
                        <ul class="product__item__pic__hover">
                            <li><a href="?produk=<?php echo $row2['id_produk'] ?>"><i class="fa fa-heart"></i></a></li>
                            <li><a href="?produk=<?php echo $row2['id_produk'] ?>"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="?produk=<?php echo $row2['id_produk'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="?produk=<?php echo $row2['id_produk'] ?>"><?php echo $row2['judul'] ?></a></h6>
                        <!-- <h5>$30.00</h5> -->
                    </div>
                </div>
                </div>
            <?php
            }}
            ?>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
    <?php
        include('footer.php');
    ?>