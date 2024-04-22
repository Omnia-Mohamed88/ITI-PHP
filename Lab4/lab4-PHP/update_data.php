<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $room_no = $_POST['roomNo'];

    try {
        $pdo = connect_to_db_pdo();
        if ($pdo) {

            $id = $_GET['id'];
            var_dump($_GET['id']);
            $sql = "UPDATE users SET name = :name, email = :email, password = :password, room_no = :room_no WHERE id = :id";
            $statement = $pdo->prepare($sql);


            $statement->bindParam(':name', $name);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':password', $password);
            $statement->bindParam(':room_no', $room_no);
            $statement->bindParam(':id', $_GET['id']);

            $statement->execute();

            header("Location: select_data.php");
            exit();
        } else {
            echo "Database connection failed";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
