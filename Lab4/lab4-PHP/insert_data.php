<?php
require_once "connect.php";

function create_users_table($pdo) {
    $create_table_query = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        email VARCHAR(255),
        password VARCHAR(255),
        room_no VARCHAR(50),  
        image VARCHAR(255)
    )";
    $pdo->exec($create_table_query);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roomNo = $_POST['roomNo'];

    $targetDir = "uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if (!empty($fileName)) {
        $allowTypes = array('jpg','png','jpeg','gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                $image = $targetFilePath;
            } else {
                $image = "";
            }
        } else {
            $image = "";
        }
    } else {
        $image = "";
    }

    try {
        $pdo = connect_to_db_pdo();
        create_users_table($pdo);
        $insert_query = "INSERT INTO users (name, email, password, room_no, image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($insert_query);
        $stmt->execute([$name, $email, $password, $roomNo, $image]);
        $lastInsertId = $pdo->lastInsertId();
        echo "<h1>Inserted record with ID: $lastInsertId</h1>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
