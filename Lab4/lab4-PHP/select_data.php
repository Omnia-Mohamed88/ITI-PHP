<?php
echo '
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>';
require_once "connect.php";

function get_all_data()
{
    try {
        $pdo = connect_to_db_pdo();
        if ($pdo) {
            $query = "select * from users";
            $statement = $pdo->prepare($query);
            $res = $statement->execute();
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }
    } catch (Exception $e) {
        echo "<h3> {$e ->getMessage()}</h3>";
    }
}

function display_table($rows){

    echo "<table class='table'> <tr> <th>ID</th>  <th>Name</th>  <th>Email</th>
    <th>password</th> <th>room_no</th> <th>image</th> <th>Edit</th> <th> Delete</th>
    </tr>";
    # id --> first parameter in the row
    foreach ($rows as $row){
        $url_query_string = $row['id'];
        $delete_url = "delete_data.php?id={$url_query_string}";
        $edit_url = "update_form.php?id={$url_query_string}";

        echo "<tr>";
        foreach ($row as $value){
            echo "<td>{$value}</td>";
        }
        echo "<td><a href='{$edit_url}' class='btn btn-warning'>Edit</a></td>";
        echo "<td> <a href='{$delete_url}'  class='btn btn-danger'> Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";

}



$rows = get_all_data();
display_table($rows);