<?php
include('../../db_connection.php');

if(!isset($_GET['id'])){
    header('location:index.php?tab=movie');
}
$id=$_GET['id'];
$sql="UPDATE movies SET `isDisable`=0 WHERE id=$id";
$result=$conn->query($sql);
header("location:index.php?tab=movie");


