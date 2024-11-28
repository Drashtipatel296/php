<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Method: GET");

include "db_conn.php";

$sql = "SELECT * FROM `crud`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    echo json_encode(["status" => true, "data" => $data]);
} else {
    echo json_encode(["status" => false, "message" => "Invalid request method"]);
}
?>
