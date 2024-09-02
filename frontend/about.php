<?php
session_start();
include('./partial/header.php');
$movie_list=$_SESSION['movie-list'];

?>
<div class="container" style="margin-top: 100px;">
   <div style="display:flex; justify-content:space-between;">
   <div style="width: 50%;">
    <img style="width: 100%; border:5px solid white;" src="../upload/harry-potter-movies.jpg" alt="">
    </div>
    <div class="ps-5" style="color:white; width:50%;">
        <h2 class="mb-3">About Us</h2>
        <p style="text-align: justify; margin-bottom:20px; word-spacing:5px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta corrupti vitae ratione ex tempora inventore velit obcaecati aliquam optio alias non cupiditate repellendus, quisquam veritatis eveniet voluptate aspernatur repudiandae magnam voluptatem saepe soluta. Aspernatur unde ea fugit ratione totam rerum, et suscipit, provident, repellat dolor officiis possimus. Fugit, illum quod.</p>
        <button class="btn btn-outline-primary">Read More..</button>
    </div>
   </div>
</div>

<?php
include('./partial/footer.php');
?>