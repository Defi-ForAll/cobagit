<?php
    include('header.php');
?>
    <!-- Header Section End -->

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
                        <h2>Inspirasi</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Serambi</a>
                            <span>Inspirasi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <h4>Inspirasi Terkini</h4>
                            <div class="blog__sidebar__recent">
                            <?php 
                                include('koneksi.php');
                                $sql_nav = "SELECT * FROM tbl_post ORDER BY id_post DESC LIMIT 3";
                                $result_nav = $conn->query($sql_nav);
                            
                                if($result_nav->num_rows > 0){
                                    while($row_nav = $result_nav->fetch_assoc()){
                            ?>
                                <a href="blog-details.php?id=<?php echo $row_nav['id_post'] ?>" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="<?= $row_nav['gambar']; ?>" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6><?= $row_nav['judul'] ?></h6>
                                        <span><?= $row_nav['tgl_upload'] ?></span>
                                    </div>
                                </a>
                            <?php
                                    }}
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                    <?php 
                        include('koneksi.php');
                        $records_per_page = 2;
                        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                            $current_page = (int) $_GET['page'];
                        } else {
                            $current_page = 1;
                        }

                        $offset = ($current_page - 1) * $records_per_page;

                        // Ambil data
                        $sql = "SELECT * FROM tbl_post LIMIT $records_per_page OFFSET $offset";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                    ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                <a href="blog-details.php?id=<?php echo $row['id_post'] ?>"><img src="<?= $row['gambar'] ?>" alt=""></a>
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> <?= $row['tgl_upload'] ?></li>
                                        <!-- <li><i class="fa fa-comment-o"></i> 5</li> -->
                                    </ul>
                                    <h5><a href="blog-details.php?id=<?php echo $row['id_post'] ?>"><?php echo $row['judul']; ?></a></h5>
                                    <p><?php echo substr($row['deskripsi'], 0, 70)."..."; ?></p>
                                    <a href="blog-details.php?id=<?php echo $row['id_post'] ?>" class="blog__btn">Pahami <span class="arrow_right"></span></a>
                                    
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        }
                        
                        ?> 
                        <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="img/blog/blog-6.jpg" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">Cooking tips make cooking simple</a></h5>
                                    <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                                        quaerat </p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <?php 
                                    // Temukan total jumlah data
                                    $sql_total_records = "SELECT COUNT(*) AS total FROM tbl_post";
                                    $result_total = $conn->query($sql_total_records);
                                    $row_total = $result_total->fetch_assoc();
                                    $total_records = $row_total['total'];
                                    $total_pages = ceil($total_records / $records_per_page);
                                
                                if ($current_page > 1) {
                                    echo '<a href="?page=' . ($current_page - 1) . '"><i class="fa fa-long-arrow-left"></i></a>';
                                }
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $current_page) {
                                        echo '<a class="active" href="?page=' . $i . '">' . $i . '</a>';
                                    } else {
                                        echo '<a href="?page=' . $i . '">' . $i . '</a>';
                                    }
                                }
                                if ($current_page < $total_pages) {
                                    echo '<a href="?page=' . ($current_page + 1) . '"><i class="fa fa-long-arrow-right"></i></a>';
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
        </div>
    </section>
    <!-- Blog Section End -->
    <style>
        .blog__item__pic img{
            max-height: 200px;
        }

        .blog__sidebar__recent__item__pic {
            max-width: 100px;
        }
    </style>
    <!-- Footer Section Begin -->
    <?php
    $conn->close();
        include('footer.php');
    ?>