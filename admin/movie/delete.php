<?php
include('../../db_connection.php');

$sql = "SELECT * FROM movies WHERE `isDisable`=1";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
   
}


