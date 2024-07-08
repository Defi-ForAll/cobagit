-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2024 at 11:43 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cakra`
--
CREATE DATABASE IF NOT EXISTS `db_cakra` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_cakra`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_transaksi`
--

CREATE TABLE `tbl_detail_transaksi` (
  `id_transaksi` varchar(100) NOT NULL,
  `id_produk` varchar(100) NOT NULL,
  `jumlah_produk` smallint NOT NULL,
  `harga_produk` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_produk`
--

CREATE TABLE `tbl_kategori_produk` (
  `id_kategori` smallint NOT NULL,
  `nama_kategori` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kategori_produk`
--

INSERT INTO `tbl_kategori_produk` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Helm Safety'),
(2, 'Kacamata Safety'),
(3, 'Seragam Safety'),
(4, 'Sepatu Safety'),
(5, 'Gembok Safety'),
(6, 'Electric Safety'),
(7, 'Valve Safety'),
(8, 'Cable Safety'),
(9, 'Hasp Safety'),
(10, 'Button Safety'),
(11, 'Tag Safety'),
(12, 'Box & Station Safety'),
(13, 'Label Safety'),
(14, 'Kit Safety');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id_post` varchar(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `creator` char(10) NOT NULL,
  `tgl_upload` varchar(10) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id_post`, `judul`, `deskripsi`, `creator`, `tgl_upload`, `gambar`) VALUES
('1', 'Manfaat dan Pentingnya Menggunakan Helm Safety di Tempat Kerja', 'Manfaat dan Pentingnya Menggunakan Helm Safety di Tempat Kerja\r\n<br>\r\nPendahuluan\r\nKeselamatan di tempat kerja adalah prioritas utama bagi perusahaan yang bergerak di industri berisiko tinggi seperti konstruksi, manufaktur, dan pertambangan. Salah satu langkah paling dasar namun penting dalam memastikan keselamatan pekerja adalah penggunaan helm safety. Artikel ini akan membahas secara mendalam tentang manfaat helm safety, pentingnya penggunaannya, jenis-jenis helm yang tersedia, cara memilih helm yang tepat, serta tips perawatan helm safety.\r\n<br>\r\n<b>Manfaat Helm Safety</b>\r\n<br>\r\n1. Perlindungan Terhadap Cedera Kepala\r\n   Helm safety dirancang khusus untuk melindungi kepala dari berbagai jenis cedera yang mungkin terjadi di tempat kerja, seperti jatuhnya benda berat, benturan dengan struktur keras, atau terpeleset dan jatuh. Cedera kepala bisa berakibat fatal atau menyebabkan gangguan permanen, sehingga penggunaan helm sangat vital.\r\n<br>\r\n2. Peningkatan Kesadaran Keselamatan\r\n   Dengan memakai helm safety, pekerja akan lebih sadar akan lingkungan sekitar dan potensi bahaya yang ada. Helm tidak hanya melindungi secara fisik tetapi juga berfungsi sebagai pengingat visual untuk selalu waspada terhadap risiko.\r\n<br>\r\n3. Kepatuhan Terhadap Regulasi Keselamatan Kerja\r\n   Banyak negara memiliki regulasi yang mewajibkan penggunaan perlengkapan pelindung diri (PPE), termasuk helm safety. Kepatuhan terhadap regulasi ini tidak hanya menghindarkan perusahaan dari sanksi hukum tetapi juga menunjukkan komitmen terhadap keselamatan karyawan.\r\n<br>\r\n4. Meningkatkan Moral dan Produktivitas\r\n   Ketika pekerja merasa aman, mereka cenderung lebih fokus dan produktif. Helm safety adalah bagian dari strategi keselamatan yang lebih besar yang mencakup pelatihan, pengawasan, dan evaluasi berkala.\r\n<br>\r\n<b>Jenis-Jenis Helm Safety</b>\r\n<br>\r\n1. Helm Safety Standar\r\n   Helm ini digunakan di banyak industri dan biasanya terbuat dari bahan plastik keras dengan suspensi internal yang dapat menyerap energi benturan.\r\n<br>\r\n2. Helm Khusus\r\n   Ada helm yang dirancang untuk kebutuhan spesifik, seperti helm dengan visor untuk melindungi wajah, helm dengan pelindung telinga untuk area bising, atau helm dengan lampu depan untuk lingkungan kerja yang minim cahaya.\r\n<br>\r\n3. Helm Dengan Teknologi Tambahan\r\n   Beberapa helm modern dilengkapi dengan fitur tambahan seperti sensor deteksi benturan, ventilasi untuk kenyamanan, atau bahkan komunikasi radio.\r\n<br>\r\n<b>Cara Memilih Helm Safety yang Tepat</b>\r\n<br>\r\n1. Identifikasi Kebutuhan Spesifik\r\n   Pertimbangkan jenis pekerjaan dan risiko yang terkait. Apakah pekerja memerlukan helm dengan fitur tambahan seperti pelindung wajah atau telinga?\r\n<br>\r\n2. Periksa Sertifikasi\r\n   Pastikan helm memiliki sertifikasi sesuai dengan standar keselamatan yang berlaku di negara atau industri Anda.\r\n<br>\r\n3. Kenyamanan dan Kesesuaian\r\n   Pilih helm yang nyaman dan pas di kepala pekerja. Helm yang tidak nyaman dapat mengganggu konsentrasi dan menurunkan efektivitas perlindungan.\r\n<br>\r\n<b>Tips Perawatan Helm Safety</b>\r\n<br>\r\n1. Pemeriksaan Rutin\r\n   Lakukan pemeriksaan rutin untuk mendeteksi kerusakan seperti retak atau deformasi. Helm yang rusak harus segera diganti.\r\n<br>\r\n2. Pembersihan Berkala\r\n   Bersihkan helm secara berkala dengan sabun ringan dan air. Hindari penggunaan bahan kimia keras yang dapat merusak material helm.\r\n<br>\r\n3. Penyimpanan yang Tepat\r\n   Simpan helm di tempat yang kering dan sejuk, jauh dari sinar matahari langsung atau sumber panas yang dapat melemahkan struktur helm.\r\n<br>\r\n<b>Kesimpulan</b>\r\n<br>\r\nPenggunaan helm safety di tempat kerja bukan hanya kewajiban hukum tetapi juga langkah penting dalam melindungi kesehatan dan keselamatan pekerja. Dengan memilih helm yang tepat dan merawatnya dengan baik, perusahaan dapat menciptakan lingkungan kerja yang lebih aman dan produktif. Peningkatan kesadaran akan pentingnya helm safety harus menjadi bagian integral dari budaya keselamatan di setiap organisasi.', 'Deny', '26/05/2024', 'gambar/post/post1.jpg'),
('2', 'Manfaat dan Pentingnya Menggunakan Seragam Safety di Tempat Kerja', '<p>Pendahuluan Keselamatan kerja adalah aspek penting yang harus diperhatikan oleh setiap perusahaan, terutama yang bergerak di bidang konstruksi, manufaktur, pertambangan, dan industri berisiko tinggi lainnya. Salah satu langkah preventif yang efektif adalah penggunaan seragam safety oleh karyawan. Artikel ini akan membahas manfaat seragam safety, pentingnya penggunaan seragam ini, berbagai jenis seragam safety yang tersedia, cara memilih seragam yang tepat, serta tips perawatan seragam safety.</p>\n\n<p>Manfaat Seragam Safety</p>\n\n<p>Perlindungan dari Bahaya Fisik Seragam safety dirancang untuk melindungi pekerja dari berbagai risiko fisik seperti luka akibat benda tajam, benturan, panas, api, dan bahan kimia berbahaya. Bahan yang digunakan sering kali tahan terhadap kondisi ekstrem untuk memastikan keamanan maksimal.</p>\n\n<p>Visibilitas Tinggi Banyak seragam safety dilengkapi dengan strip reflektif atau warna terang untuk meningkatkan visibilitas pekerja, terutama di area dengan pencahayaan rendah atau di dekat kendaraan bergerak. Ini sangat penting untuk mencegah kecelakaan kerja.</p>\n\n<p>Identifikasi dan Kepatuhan Regulasi Seragam safety sering kali mencakup tanda pengenal yang memudahkan identifikasi karyawan dan perannya di tempat kerja. Selain itu, penggunaan seragam safety membantu perusahaan mematuhi standar dan regulasi keselamatan kerja yang berlaku.</p>\n\n<p>Meningkatkan Disiplin dan Moral Kerja Pekerja yang mengenakan seragam safety cenderung lebih disiplin dan fokus dalam menjalankan tugasnya. Selain itu, seragam safety juga dapat meningkatkan rasa kebersamaan dan profesionalisme di antara karyawan.</p>\n\n<p>Jenis-Jenis Seragam Safety</p>\n\n<p>Seragam Tahan Api Dirancang untuk melindungi pekerja dari api dan suhu tinggi. Seragam ini biasanya terbuat dari bahan khusus yang tahan api dan panas.</p>\n\n<p>Seragam Anti-Bahan Kimia Terbuat dari bahan yang tahan terhadap cairan dan gas berbahaya, seragam ini melindungi pekerja dari paparan bahan kimia yang dapat menyebabkan luka atau penyakit.</p>\n\n<p>Seragam Anti-Listrik Statis Digunakan di industri yang berhubungan dengan bahan mudah terbakar atau elektronik sensitif. Seragam ini mencegah penumpukan listrik statis yang dapat memicu ledakan atau kerusakan peralatan.</p>\n\n<p>Seragam dengan Visibilitas Tinggi Memiliki warna terang dan strip reflektif, seragam ini dirancang untuk memastikan pekerja terlihat jelas di lingkungan kerja dengan pencahayaan rendah atau di dekat lalu lintas.</p>\n\n<p>Cara Memilih Seragam Safety yang Tepat</p>\n\n<p>Identifikasi Risiko Kerja Setiap jenis pekerjaan memiliki risiko yang berbeda. Identifikasi risiko spesifik di tempat kerja untuk menentukan jenis seragam safety yang paling sesuai.</p>\n\n<p>Periksa Sertifikasi dan Standar Pastikan seragam safety yang dipilih memenuhi standar keselamatan yang berlaku di industri Anda. Sertifikasi dari badan resmi menunjukkan bahwa seragam telah diuji dan terbukti efektif.</p>\n\n<p>Kenyamanan dan Fleksibilitas Pilih seragam yang nyaman dan memungkinkan pergerakan bebas. Seragam yang terlalu kaku atau tidak nyaman dapat mengganggu produktivitas dan keselamatan pekerja.</p>\n\n<p>Tips Perawatan Seragam Safety</p>\n\n<p>Pemeriksaan Rutin Lakukan pemeriksaan rutin untuk mendeteksi kerusakan atau keausan. Seragam yang rusak harus segera diganti untuk memastikan perlindungan optimal.</p>\n\n<p>Pembersihan Berkala Bersihkan seragam sesuai dengan petunjuk perawatan yang tertera. Penggunaan deterjen khusus mungkin diperlukan untuk seragam tertentu, terutama yang tahan api atau bahan kimia.</p>\n\n<p>Penyimpanan yang Tepat Simpan seragam di tempat yang bersih, kering, dan jauh dari bahan kimia atau kondisi yang dapat merusak serat kain.</p>\n\n<p>Kesimpulan</p>\n\n<p>Penggunaan seragam safety di tempat kerja adalah langkah krusial dalam memastikan keselamatan dan kesehatan pekerja. Dengan memilih seragam yang tepat dan merawatnya dengan baik, perusahaan dapat menciptakan lingkungan kerja yang lebih aman dan efisien. Peningkatan kesadaran dan kepatuhan terhadap penggunaan seragam safety juga harus menjadi bagian integral dari budaya keselamatan di setiap organisasi. Seragam safety bukan hanya tentang kepatuhan regulasi, tetapi juga tentang memberikan perlindungan nyata kepada pekerja dan meningkatkan keselamatan kerja secara keseluruhan.</p>', 'Deny', '26/05/2024', 'gambar/post/post2.jpg'),
('3', 'Pentingnya Memilih Rompi Proyek', '<p>Memilih rompi proyek yang tepat sangat penting untuk keselamatan dan efisiensi di lokasi kerja. Berikut beberapa alasan mengapa pemilihan rompi proyek yang sesuai sangat penting:</p>\n\n<p>### 1. **Keselamatan Kerja** Rompi proyek dirancang untuk meningkatkan visibilitas pekerja, terutama di area dengan lalu lintas kendaraan atau alat berat. Rompi dengan warna cerah dan bahan reflektif membantu pekerja terlihat oleh operator alat berat dan pengemudi, mengurangi risiko kecelakaan. Memilih rompi dengan standar keamanan yang sesuai dapat memastikan pekerja lebih aman selama bekerja.</p>\n\n<p>### 2. **Kepatuhan Terhadap Peraturan** Banyak negara dan wilayah memiliki peraturan ketat mengenai peralatan pelindung diri (APD) di tempat kerja. Memilih rompi proyek yang memenuhi standar lokal dan internasional memastikan bahwa perusahaan mematuhi hukum dan menghindari denda atau sanksi. Misalnya, di banyak tempat, rompi harus memiliki tingkat reflektivitas tertentu dan warna yang sesuai dengan regulasi.</p>\n\n<p>### 3. **Efisiensi Identifikasi** Rompi proyek dapat digunakan untuk mengidentifikasi peran atau tingkat otorisasi pekerja di lokasi proyek. Misalnya, rompi dengan warna atau tanda khusus dapat menunjukkan siapa supervisor, pekerja biasa, atau tamu. Ini membantu dalam pengelolaan tim dan memastikan bahwa setiap orang tahu siapa yang bertanggung jawab atau siapa yang memiliki izin untuk melakukan tugas tertentu.</p>\n\n<p>### 4. **Kenyamanan dan Produktivitas** Rompi yang nyaman akan lebih mungkin dipakai sepanjang hari oleh pekerja, meningkatkan kepatuhan penggunaan APD. Rompi yang terlalu berat, panas, atau tidak nyaman dapat mengganggu konsentrasi dan mengurangi produktivitas. Memilih rompi yang ringan, bernapas, dan sesuai dengan iklim tempat kerja membantu memastikan pekerja tetap nyaman dan fokus pada tugas mereka.</p>\n\n<p>### 5. **Citra Profesional** Penggunaan rompi proyek yang tepat juga berkontribusi pada citra profesional perusahaan. Ketika pekerja mengenakan rompi yang seragam dan sesuai standar, ini mencerminkan komitmen perusahaan terhadap keselamatan dan profesionalisme. Hal ini bisa meningkatkan reputasi perusahaan di mata klien dan mitra bisnis.</p>\n\n<p>### 6. **Fungsi Tambahan** Banyak rompi proyek modern dilengkapi dengan fitur tambahan seperti kantong, tempat untuk alat komunikasi, dan area untuk memasang logo atau identifikasi pribadi. Memilih rompi dengan fitur-fitur ini dapat meningkatkan efisiensi kerja dengan memungkinkan pekerja membawa dan mengakses alat dengan mudah.</p>\n\n<p>### Kesimpulan Memilih rompi proyek yang tepat bukan hanya soal mematuhi regulasi, tetapi juga tentang memastikan keselamatan, kenyamanan, dan efisiensi di tempat kerja. Investasi dalam rompi proyek yang berkualitas dan sesuai dengan kebutuhan khusus proyek dapat menghasilkan lingkungan kerja yang lebih aman dan produktif, sekaligus membangun citra profesional perusahaan.</p>\n\n<p>Dengan mempertimbangkan faktor-faktor ini, perusahaan dapat membuat keputusan yang tepat dalam memilih rompi proyek yang terbaik untuk kebutuhan mereka.</p>', 'Deny', '29/05/2024', 'gambar/post/post3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_kategori` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `thumbnail` varchar(1000) NOT NULL,
  `tgl_upload` timestamp NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `stok` smallint NOT NULL,
  `tmpt_simpan` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_kategori`, `judul`, `deskripsi`, `gambar`, `thumbnail`, `tgl_upload`, `harga`, `stok`, `tmpt_simpan`) VALUES
('onhin_1719754800', '4', '2000', '2000', '1719754800_ntfdy.jpg', 'thumbnail_1719754800_ntfdy.jpg', '2024-06-30 06:39:02', 3.00, 2, 'gudang'),
('onnon_1719754323', '3', 'Gembok Safety P38S', 'Tokopedia', '1719754323_yhtyp.jpg', 'thumbnail_1719754323_yhtyp.jpg', '2024-06-30 06:31:13', 4.00, 20, 'gudang,toko'),
('ytinf_1719754770', '5', 'Gembok Safety P38S', '3000', '1719754770_atsfr.jpg', 'thumbnail_1719754770_atsfr.jpg', '2024-06-30 06:39:02', 20.00, 300, 'gudang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stok`
--

CREATE TABLE `tbl_stok` (
  `id_produk` varchar(25) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `stok` int NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_stok`
--

INSERT INTO `tbl_stok` (`id_produk`, `nama_produk`, `stok`, `keterangan`) VALUES
('P38P', 'Gembok 38MM Plastic', 1000, 'Digudang & Ditoko'),
('P38S', 'Gembok 38MM Baja', 10, 'Digudang & Ditoko'),
('P76S', 'Gembok 76MM Plastic', 1000, 'Digudang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` varchar(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `nama_costumer` varchar(100) NOT NULL,
  `total_transaksi` decimal(12,2) NOT NULL,
  `metode_pembayaran` enum('Cash','Transfer') NOT NULL,
  `status_pembayaran` enum('Bon','Lunas','Pending','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kategori_produk`
--
ALTER TABLE `tbl_kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_stok`
--
ALTER TABLE `tbl_stok`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
