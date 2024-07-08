<?php
    include('koneksi.php');
    $records_per_page = 2; // Jumlah data per halaman
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $current_page = (int) $_GET['page'];
    } else {
        $current_page = 1;
    }

    $offset = ($current_page - 1) * $records_per_page;

// Ambil data
$sql = "SELECT * FROM tbl_post LIMIT $records_per_page OFFSET $offset";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["id_post"] . ": " . $row["judul"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Tidak ada data.";
}

// Temukan total jumlah data
$sql_total_records = "SELECT COUNT(*) AS total FROM tbl_post";
$result_total = $conn->query($sql_total_records);
$row_total = $result_total->fetch_assoc();
$total_records = $row_total['total'];

$total_pages = ceil($total_records / $records_per_page);

// Tampilkan paginasi
echo '<nav>';
echo '<ul class="pagination">';

if ($current_page > 1) {
    echo '<li><a href="?page=' . ($current_page - 1) . '">Sebelumnya</a></li>';
}

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $current_page) {
        echo '<li class="active"><a href="?page=' . $i . '">' . $i . '</a></li>';
    } else {
        echo '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
    }
}

if ($current_page < $total_pages) {
    echo '<li><a href="?page=' . ($current_page + 1) . '">Berikutnya</a></li>';
}

echo '</ul>';
echo '</nav>';

$conn->close();
?>