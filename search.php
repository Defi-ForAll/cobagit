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
            
                <?php 
                    include('koneksi.php');
                    $query = $_GET['query'];
                    $sql = "SELECT id_produk,merk,judul,deskripsi FROM tbl_produk WHERE merk LIKE '%$query%' OR judul LIKE '%$query%' OR deskripsi LIKE '%$query%'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                ?>
                <div class="row">
                <div class="col-12 mb-3">
                <div class="d-flex">
                    <div class="warna">
                        <h5><a href="shop-details.php?produk=<?php echo $row['id_produk'] ?>"><?php echo $row['judul']; ?></a></h5>
                        <p><?php echo substr($row['deskripsi'], 0, 200)."..."; ?></p>
                    </div>
                </div>
                </div>
                </div>
                <hr style="width: 90%; display: block;  margin-right: auto;" />
                <?php }} ?>
            </div>
        </div>
    </section>
    <style>
        .warna a:hover{
           color: greenyellow;
        }
    </style>

    <!-- Footer Section Begin -->
    <?php
        include('footer.php');
    ?>