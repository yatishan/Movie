<?php 
include('../../db_connection.php');
$sql="SELECT * FROM account WHERE `isDisable`=1";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
if(!$row){
    header('location:index.php');
}
$tab=$_GET['tab'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../layout/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .active{
            background-color: rgba(13, 12, 13, 0.19);
            border:1px solid black;
            border-radius: 5px;
            padding: 5px;
            box-shadow: 1px 1px 1px black;
        }
    </style>
</head>
<body>
<div style="background-color: #7695FF; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
<div class="container" style="display:flex; padding:10px; justify-content:space-between; align-items:center; ">
    <div style="display:flex;">
        <h3><a class="<?=$tab=='movie'?"active":"" ?>" style="text-decoration:none; color:black; margin-right:20px;" href="../movie/index.php?tab=movie"><i>Movie</i></a></h4>
        <h3><a class="<?=$tab=='type'?"active":"" ?>" style="text-decoration:none; color:black;" href="../type/index.php?tab=type"><i>Type</i></a></h4>
    </div>
    <div>
        <button class="btn btn-primary"><a style="text-decoration:none; color:black" href="logout.php">Logout</a></button>
    </div>
</div>
</div>
</body>
</html>

