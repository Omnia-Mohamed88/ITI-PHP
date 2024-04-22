<?php
require_once "connect.php";

function get_user($id)
{
    try {
        $pdo = connect_to_db_pdo();
        if ($pdo) {
            $query = "select * from users where  id = $id";
            $statement = $pdo->prepare($query);
            $res = $statement->execute();
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
    } catch (Exception $e) {
        echo "<h3> {$e ->getMessage()}</h3>";
    }
}

?>