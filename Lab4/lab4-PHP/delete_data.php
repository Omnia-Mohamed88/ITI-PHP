<?php
require_once "connect.php";
$user_id = $_GET['id'];
try {
    $pdo = connect_to_db_pdo();

    $delete_query = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($delete_query);
    $stmt->bindParam(':id',$user_id , PDO::PARAM_INT);
    $res=$stmt->execute();
    if($stmt->rowCount()==1){
        echo "Record deleted successfully";
    }
    header("Location:select_data.php");
} catch(PDOException $e){
    echo $e->getMessage();

}