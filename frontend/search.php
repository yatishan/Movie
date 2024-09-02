<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
    <style>
         .card-div{
            margin: 10px;
            display: grid;
            grid-template-columns:24% 24% 24% 24%;
            gap:20px;
            /* animation: appear linear;
            animation-timeline: view();
            animation-range: entry 0; */
        }
        @media (max-width:900px){
            .card-div{
            grid-template-columns:33% 33% 33%;
            }

        } 
        @media (max-width:600px){
            .card-div{
            grid-template-columns:49% 49%;
            }

        } 
    </style>
</head>
<body style="background-color: black;">
    <?php 
    session_start();
    $movie_list=$_SESSION['movie-list'];
    if(isset($_GET['btn'])){
        $tmp=[];
        $search=$_GET['search'];
        foreach($movie_list as $movie){

            if(str_contains(strtoupper($movie['title']),strtoupper($search))){
                $tmp[]=$movie;
            }
        }
        if(count($tmp)<=0){
            $mes="No Result For You";
        }
    }
    ?>
    <div class="container mt-5">
        <form action="search.php" method="get" style="display: flex; margin:auto; width:50%; justify-content:center;">
            <input type="text" name="search" id="" style="width: 70%; border:1px solid white; background-color:transparent; border-radius:5px; padding:0 5px; color:white;" value="" placeholder="<?php 
            if(isset($mes)){
                echo $mes;
            }else{
                echo "search";
            }
             ?>">
            <button class="btn btn-success mx-2 px-2" name="btn">Search</button>
        </form>
        <?php


echo "<div class='mt-5 card-div'>";

foreach($tmp as $movie){
?>
  
  <div class="card" style="border-radius:8px;overflow:hidden; border:2px solid white;">
    <div>
      <img style="width:100%; height:200px" src="<?php echo $movie['image'] ?>" alt="">
    </div>
    <div style="background-color:white; padding:5px 5px; display:flex; justify-content:space-between;">
      <p style="color:black; font-weight:bold;"><?php echo $movie['title'] ?></p>
      <p style="color:black; font-size:15px;"><?php echo $movie['create_at'] ?></p>
    </div>
    <div>
    <button class="btn btn-danger">Watch Now</button>
    </div>
  </div>
<?php }
 ?>
    </div>
    
</body>
<script src="../layout/js/bootstrap.bundle.js"></script>
</html>