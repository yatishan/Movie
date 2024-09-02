<?php 
session_start();
include('./partial/header.php');
$movie_list=$_SESSION['movie-list'];
?>

<h1 style="color:red; margin:10px; margin-top:30px; font-family:Arial, Helvetica, sans-serif">Movie List</h1>

<?php

echo "<div class='mt-5 card-div'>";
foreach($movie_list as $movie){
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
echo "</div>";
include('./partial/footer.php');
?>
