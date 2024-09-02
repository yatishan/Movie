<?php
 if(!isset($_GET['id'])){
    header("location:index.php?tab=movie");
  }
  include("../../db_connection.php");
  $id=$_GET['id'];
  // insert into db
  // $date_now = date('Y-m-d h:i:s');
  $sql = "UPDATE types SET `isDisable`=0 WHERE `id`=$id";

  $result = $conn->query($sql);
  header('location:index.php?tab=movie');