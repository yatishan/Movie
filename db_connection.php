<?php
$db_host='localhost';
$db_user='root';
$db_name='movieList';
$db_pass='77778888';
$conn=new mysqli($db_host,$db_user,$db_pass,$db_name);
if($conn->connect_error){
    die('db_connection fail'.$conn->connect_error);
}