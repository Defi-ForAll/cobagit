<?php
    include('header.php');
    $id = $_GET['id'];
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

    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="img/blog/details/details-hero.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <?php 
                            include('koneksi.php');
                             $sql = "SELECT * FROM tbl_post WHERE id_post=$id";
                             $result = $conn->query($sql);
                             $row = $result->fetch_assoc();
                        ?>
                        <h2><?php echo $row['judul'] ?></h2>
                        <ul>
                            <li><?= $row['creator'] ?></li>
                            <li><?= $row['tgl_upload'] ?></li>
                            <!-- <li>8 Comments</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <!-- <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div> -->
                        <!-- <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="#">All</a></li>
                                <li><a href="#">Beauty (20)</a></li>
                                <li><a href="#">Food (5)</a></li>
                                <li><a href="#">Life Style (9)</a></li>
                                <li><a href="#">Travel (10)</a></li>
                            </ul>
                        </div> -->
                        <div class="blog__sidebar__item">
                            <h4>Inspirasi Terkini</h4>
                            <div class="blog__sidebar__recent">
                            <?php 
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
                        <!-- <div class="blog__sidebar__item">
                            <h4>Search By</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Apple</a>
                                <a href="#">Beauty</a>
                                <a href="#">Vegetables</a>
                                <a href="#">Fruit</a>
                                <a href="#">Healthy Food</a>
                                <a href="#">Lifestyle</a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="<?= $row['gambar'] ?>" alt="">
                        <p><?= $row['deskripsi'] ?></p>
                    </div>
                    <!-- <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="img/blog/details/details-author.jpg" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>Michael Scofield</h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Kategori:</span> Safety</li>
                                        <li><span>Tags:</span> All, Trending, Cooking, Healthy Food, Life Style</li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Temukan Inspirasi</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                    include('koneksi.php');
                    $sql = "SELECT * FROM tbl_post LIMIT 3";
                    $result = $conn->query($sql);
                
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            ?>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="blog__item">
                                        <div class="blog__item__pic">
                                            <img src="<?= $row['gambar'] ?>" alt="">
                                        </div>
                                        <div class="blog__item__text">
                                            <ul>
                                                <li><i class="fa fa-calendar-o"></i> <?= $row['tgl_upload'] ?></li>
                                                <!-- <li><i class="fa fa-comment-o"></i> 5</li> -->
                                            </ul>
                                            <h5><a href="blog-details.php?id=<?php echo $row['id_post'] ?>"><?php echo $row['judul']; ?></a></h5>
                                            <p><?php echo substr($row['deskripsi'], 0, 70)."..."; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                           
                        }
                    } else {
                       ?>
                       <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <!-- <img src="" alt=""> -->
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>28</li>
                                        <!-- <li><i class="fa fa-comment-o"></i> 5</li> -->
                                    </ul>
                                    <h5><a href="#">Data Tak ditemukan</a></h5>
                                    <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                                </div>
                            </div>
                        </div>
                       
                       <?php
                    }
                    $conn->close();
                ?> 
                
                
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->
    <style>
        .blog__item__pic img{
            max-height: 200px;
        }

        .blog__sidebar__recent__item__pic {
            max-width: 100px;
        }
    </style>

<?php
    include('footer.php');
?>