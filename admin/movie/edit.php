<?php
    include('../partial/header.php');
    if(!isset($_GET['id'])){
        header("location:index.php?tab=movie");
    }
    $id=$_GET['id'];
    $sql_input="SELECT * FROM movies WHERE id=$id";
    $result_input=$conn->query($sql_input);
    $row_input=$result_input->fetch_assoc();
    $movie_id=$row_input['id'];
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST['title']) && !empty($_POST['type']) && !empty($_POST['year'])){
                include("../../upload/upload.php");
                if(($_FILES['poster'])['size'] !==0){
                    $file=$_FILES['poster'];
                    $upload=new Upload($file);
                    $type_ids=$_POST['type'];
                    // var_dump($type_ids);
                    if($upload->isValidformat()){
                        $result=$upload->uploadNow();
                        if($result){
                            $title=$_POST['title'];
                            $year=$_POST['year'];
                            $poster="./../upload/{$file['name']}";
                            if(isset($_FILES['poster'])){
                            $sql="UPDATE movies SET `title`='$title',`year`='$year',`poster`='$poster',`updated_at`=now() WHERE id=$id";
                            }else{
                            $sql="UPDATE movies SET `title`='$title',`year`='$year',`poster`='$poster',`updated_at`=now() WHERE id=$id";
                            }
                            $result=$conn->query($sql);
                            $sql_delete_movie_type="DELETE FROM movie_type WHERE `movie_id`='$movie_id'";
                            $result_delete_movie_type=$conn->query($sql_delete_movie_type);
                            foreach($type_ids as $type_id){
                                $sql_movie_type="INSERT INTO movie_type (`movie_id`,`type_id`) VALUE ('$movie_id','$type_id')";
                                $result_movie_type=$conn->query($sql_movie_type);
                            };
                            header('location:index.php?tab=movie');
                        }
                    }else{
                        echo "unsupported format!";
                    }
                    
                }else{
                    $mesg="please upload file";
                }
            }else{
                $mesg="all field are required";
            }
        }
    ?>
    <div class="container">
        <h1 style="text-align: center;margin:20px;">Update New Movie</h1>
        <div class="main-div">
            <p class="text-danger"><?php echo $mesg?></p>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?=$row_input['title'] ?>">
                </div>
                <div class="mb-4">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" class="form-control" id="year" name="year" value="<?=$row_input['year'] ?>">
                </div>
                <div class="mb-4">
                <select class="form-control" multiple name="type[]">
                            <?php
                            $sql_type="SELECT * FROM types WHERE `isDisable`=1";
                            $result_type=$conn->query($sql_type); 
                            while($row=$result_type->fetch_assoc()){?>
                            <option value="<?=$row['id'] ?>"
                            <?php
                            $selected_type_id_sql="SELECT * FROM movie_type WHERE `movie_id`='$movie_id'";
                            $selected_type_id_result=$conn->query($selected_type_id_sql);
                            $selected_type_ids=[];
                            while($selected_type_id_row=$selected_type_id_result->fetch_assoc()){
                                $selected_type_ids[]=$selected_type_id_row['type_id'];
                            }
                            if (in_array($row['id'], $selected_type_ids)){
                                echo "selected";
                            }else{
                                echo "";
                            }
                            ?>><?=$row['name'] ?></option>
                            <?php } ?>
                </select>

                    </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Poster</label>
                    <input class="form-control" type="file" id="formFile" name="poster">
                </div>
                <div class="mt-4" style="display: flex;">
                    <input class="btn btn-primary me-2" type="submit" value="Update Movie" name="update" >
                    <button class="btn btn-outline-primary"><a style="text-decoration:none; color:black;" href="index.php?tab=movie">Back To List</a></button>
                </div>
            </form>
        </div>
    </div>
</body>
<?php 
include('../partial/footer.php');
?>