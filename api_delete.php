<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "db_conn.php";

// Directly delete all records without checking ID
if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    // Delete all records from the table
    $sql = "DELETE FROM `crud`";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo json_encode(["status" => true, "message" => "All records deleted successfully"]);
    } else {
        echo json_encode(["status" => false, "message" => "Failed to delete records"]);
    }
} else {
    echo json_encode(["status" => false, "message" => "Invalid request method"]);
}
?>
