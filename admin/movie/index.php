<?php 
include('../partial/header.php');
?>
    <div class="container">
      <form action="" method="post">
        <button class="btn btn-dark my-4 text-right" name="addnew"><a href="add.php?tab=movie" style="text-decoration: none; color:white;">Add New Movie</a></button>
      </form>
      <table class="table table-bordered" border="1" >
        <thead>
          <tr>
            <th scope="col">Poster</th>
            <th scope="col">Title</th>
            <th scope="col">Type</th>
            <th scope="col">Year</th>
            <th scope="col">Create At</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql="SELECT * FROM movies WHERE `isDisable`=1";
          $result=$conn->query($sql);

          while($row=$result->fetch_assoc()){
           ?>
              <tr>
                <td><img src="<?php echo ".".$row['poster'] ?>" width='100px' height='100px' alt=""></td>
                <td><?php echo $row['title'] ?></td>
                <?php 
                $movie_id=$row['id'];
                $sql_movie_type="SELECT * FROM movie_type WHERE `movie_id`=$movie_id";
                $result_movie_type=$conn->query($sql_movie_type);
                
                $type_ids = [];
                while ($row_movie_type = $result_movie_type->fetch_assoc()){
                    $type_ids[]=$row_movie_type['type_id'];
                }
                if(!empty($type_ids)){
                    $type_ids_str = implode(",", $type_ids);
                    $sql_type="SELECT * FROM types WHERE `id` IN ($type_ids_str)";
                    $result_type=$conn->query($sql_type);
                    $type_names= [];
                    while ($row_type = $result_type->fetch_assoc()){
                        $type_names[]=$row_type['name'];
                    }
                }else{
                    echo "no type id  not found";
                }
                
                ?>
                <td><?php echo implode(",",$type_names)?></td>
                <td><?php echo $row['year'] ?></td>
                <td><?php echo $row['created_at'] ?></td>
                <td>
                  <a href="edit.php?tab=movie&id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen-to-square text-warning"></i></a>
                  <a href="delete.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash text-danger"></i></a>
                </td>
              </tr>
         <?php } 
          ?>
         
        </tbody>
       </table>
    </div>
    <?php
    include('../partial/footer.php');
    ?>