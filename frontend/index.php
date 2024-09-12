<?php 
include('./partial/header.php');
$sql_type="SELECT * FROM types WHERE isDisable=1";
$result_type=$conn->query($sql_type);
echo "<div class='container' style='margin-top:100px;'>";
while($row_type=$result_type->fetch_assoc()){
?>
<h1 style="color:rgba(253, 9, 9, 0.87); margin:10px; margin-top:3px; font-family:Arial, Helvetica, sans-serif"><?=$row_type['name'] ?></h1>

<?php
$type_id=$row_type['id'];
$sql_movie_type="SELECT * FROM movie_type WHERE `type_id`=$type_id";
$result_movie_type=$conn->query($sql_movie_type);
$movie_ids=[];
while($row_movie_type=$result_movie_type->fetch_assoc()){
  $movie_ids[]=$row_movie_type['movie_id'];
}
$movie_ids_str = implode(",", $movie_ids);
echo "<div class='mt-4 mb-5 card-div'>";
$sql_movie="SELECT * FROM movies WHERE `id` IN ($movie_ids_str) AND `isDisable`=1";
$result_movie=$conn->query($sql_movie);
while($row_movie=$result_movie->fetch_assoc()){
?>

  <div class="card" style="border-radius:8px;overflow:hidden; border:2px solid white;">
    <div>
      <img style="width:100%; height:200px" src="<?=$row_movie['poster'] ?>" alt="">
    </div>
    <div style="background-color:white; padding:5px 5px; display:flex; justify-content:space-between;">
      <p style="color:black; font-weight:bold;"><?php echo $row_movie['title'] ?></p>
      <p style="color:black; font-size:15px;"><?php echo $row_movie['created_at'] ?></p>
    </div>
    <div>
    <button class="btn btn-danger">Watch Now</button>
    </div>
  </div>
<?php }
echo "</div>";
}
echo "</div>";

include('./partial/footer.php');
?>
