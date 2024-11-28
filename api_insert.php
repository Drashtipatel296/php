<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

include "db_conn.php";

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    // Validate input data
    if (!empty($data["first_name"]) && !empty($data["last_name"]) && !empty($data["email"]) && !empty($data["gender"])) {
        $first_name = $data["first_name"];
        $last_name = $data["last_name"];
        $email = $data["email"];
        $gender = $data["gender"];

        // Insert query
        $sql = "INSERT INTO `crud`(`first_name`, `last_name`, `email`, `gender`) VALUES ('$first_name', '$last_name', '$email', '$gender')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo json_encode(["message" => "Record inserted successfully", "status" => true]);
        } else {
            echo json_encode(["message" => "Insert failed: " . mysqli_error($conn), "status" => false]);
        }
    } else {
        echo json_encode(["status" => false, "message" => "Invalid input data"]);
    }
} else {
    // Respond if the request method is not POST
    echo json_encode(["status" => false, "message" => "Invalid request method. Only POST requests are allowed"]);
}
?>
