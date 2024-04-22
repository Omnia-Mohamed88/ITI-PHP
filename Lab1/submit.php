<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submitted Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Submitted Information</h1>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if (empty($_POST['first_name'])) {
        $errors[] = "First Name is required";
    }

    if (empty($_POST['last_name'])) {
        $errors[] = "Last Name is required";
    }

    if (empty($_POST['gender'])) {
        $errors[] = "Gender is required";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        echo '<p><a href="Lab1.php">Go back to the form</a></p>';
    } else {
        $data = [
            'First Name' => $_POST['first_name'],
            'Last Name' => $_POST['last_name'],
            'Address' => $_POST['address'],
            'Country' => $_POST['country'],
            'Gender' => $_POST['gender'],
            'Skills' => implode(", ", $_POST['skills']),
            'Username' => $_POST['username'],
            'Department' => $_POST['department'],
            'Security Code' => $_POST['security_code']
        ];

        $file = 'customer.txt';
        $currentData = file_get_contents($file);
        $currentData .= json_encode($data) . "\n";
        file_put_contents($file, $currentData);

        echo "<p>Data submitted successfully!</p>";
        echo '<p><a href="Lab1.php">Go back to the form</a></p>';
    }
} else {
    echo "<p>No data submitted</p>";
}
?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Customer Records</h1>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Country</th>
                <th>Gender</th>
                <th>Skills</th>
                <th>Username</th>
                <th>Department</th>
                <th>Security Code</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $file = 'customer.txt';
            $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($lines as $key => $line) {
                $record = json_decode($line, true);
                echo "<tr>";
                echo "<td>{$record['First Name']}</td>";
                echo "<td>{$record['Last Name']}</td>";
                echo "<td>{$record['Address']}</td>";
                echo "<td>{$record['Country']}</td>";
                echo "<td>{$record['Gender']}</td>";
                echo "<td>{$record['Skills']}</td>";
                echo "<td>{$record['Username']}</td>";
                echo "<td>{$record['Department']}</td>";
                echo "<td>{$record['Security Code']}</td>";
                echo "<td><form method='post'><input type='hidden' name='delete_key' value='$key'><button type='submit' class='btn btn-danger'>Delete</button></form></td>";
                echo "</tr>";
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_key'])) {
                $deleteKey = $_POST['delete_key'];

                unset($lines[$deleteKey]);

                file_put_contents($file, implode(PHP_EOL, $lines));

                header("Location: ".$_SERVER['PHP_SELF']);
                exit;
            }
            ?>        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>