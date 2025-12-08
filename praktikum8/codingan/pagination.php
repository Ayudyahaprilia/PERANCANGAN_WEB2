<?php
include "conn.php";

$q = $conn->query("SELECT COUNT(userid) FROM user");
$row = $q->fetch_row();
$total_data = $row[0];

$data_per_page = 5;
$total_page = ceil($total_data / $data_per_page);

$page_now = isset($_GET['p']) ? $_GET['p'] : 1;
$page_now = max(1, min($page_now, $total_page));

$start = ($page_now - 1) * $data_per_page;

$users = $conn->query("SELECT * FROM user LIMIT $start, $data_per_page");

$pagination = "";

// Previous
if ($page_now > 1) {
    $pagination .= '<a class="btn btn-outline-primary me-1" href="?p=' . ($page_now - 1) . '">Previous</a>';
}

// Numbering
for ($i = 1; $i <= $total_page; $i++) {
    $active = ($page_now == $i) ? "active" : "";
    $pagination .= '<a class="btn btn-primary me-1 ' . $active . '" href="?p=' . $i . '">' . $i . '</a>';
}

// Next
if ($page_now < $total_page) {
    $pagination .= '<a class="btn btn-outline-primary ms-1" href="?p=' . ($page_now + 1) . '">Next</a>';
}
?>
