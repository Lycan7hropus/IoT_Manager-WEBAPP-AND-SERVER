<?php

include("../config/dbconfig.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] !== 'GET') :
    http_response_code(405);
    echo json_encode([
        'success' => 0,
        'message' => 'Invalid Request Method. HTTP method should be GET',
    ]);
    exit;
endif;



// require 'database.php';
// $database = new Database();
// $conn = $database->dbConnection();
$post_id = null;

if (isset($_GET['id'])) {
    $post_id = filter_var($_GET['id'], FILTER_VALIDATE_INT, [
        'options' => [
            'default' => 'all_posts',
            'min_range' => 1
        ]
    ]);
}


switch ($perioid) {
    case "HOUR":
        $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time), SECOND(date_time) DIV 10 ORDER BY date_time DESC LIMIT 360";
        break;
    case "DAY":
        $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) DIV 4 ORDER BY date_time DESC LIMIT 360";
        break;
    case "WEEK":
        $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) DIV 30 ORDER BY date_time DESC LIMIT 336";
        break;
    case "MONTH":
        $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time) DIV 2 ORDER BY date_time DESC LIMIT 360";
        break;
    default:
        $sql = "SELECT id, temp, hum, pres, date_time FROM `$sensor_id` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) DIV 4 ORDER BY date_time DESC LIMIT 360";
        break;
}


















try {

    $sql = is_numeric($post_id) ? "SELECT * FROM `posts` WHERE id='$post_id'" : "SELECT * FROM `posts`";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    if ($stmt->rowCount() > 0) :

        $data = null;
        if (is_numeric($post_id)) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        echo json_encode([
            'success' => 1,
            'data' => $data,
        ]);

    else :
        echo json_encode([
            'success' => 0,
            'message' => 'No Result Found!',
        ]);
    endif;
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => 0,
        'message' => $e->getMessage()
    ]);
    exit;
}