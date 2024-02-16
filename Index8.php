<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "MyDatabase";

$connect = new mysqli($host, $user, $password, $dbName);

if ($connect->connect_error) {
    die("Failed to connect with the database: " . $connect->connect_error);
}

echo "Database connected<br>";

$query = "SELECT * FROM ludi";
$result = $connect->query($query);

if (!$result) {
    die("Error in query: " . $connect->error);
}

echo "<h2>Data from MySQL Table</h2>";
printResult($result);


$query = "SELECT * FROM ludi ORDER BY id ASC";
$result = $connect->query($query);

if (!$result) {
    die("Error in query: " . $connect->error);
}

printResult($result);


$query = "SELECT * FROM ludi ORDER BY age DESC";
$result = $connect->query($query);

if (!$result) {
    die("Error in query: " . $connect->error);
}

printResult($result);

printResult($result);

$connect->close();

function printResult($result_set) {
    while (($row = $result_set->fetch_assoc()) != false) {
        print_r($row);
        echo "--------------------------------<br/>";
    }
    echo "Количество записей равно -" . $result_set->num_rows . "<br />----------------------------";
}
?>
