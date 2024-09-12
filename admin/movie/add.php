 <?php
    include('../partial/header.php');
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST['title']) && !empty($_POST['type']) && !empty($_POST['year']) && isset($_FILES['poster'])){
                include("../../upload/upload.php");
                if(($_FILES['poster'])['size'] !==0){
                    $file=$_FILES['poster'];
                    $upload=new Upload($file);
                    $types=$_POST['type'];
                    if($upload->isValidformat()){
                        $result=$upload->uploadNow();
                        if($result){
                            $title=$_POST['title'];
                            $year=$_POST['year'];
                            $poster="./../upload/{$file['name']}";
                            $sql="INSERT INTO movies (`title`,`year`,`poster`,`created_at`,`updated_at`) VALUE 
                            ('$title','$year','$poster',now(),now())";
                            $result=$conn->query($sql);
                            if($result==TRUE){
                            $movie_id= $conn->insert_id;
                            }
                            foreach($types as $type){
                                $sql_movie_type="INSERT INTO movie_type (`movie_id`,`type_id`) VALUE ('$movie_id','$type')";
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
        $sql_type="SELECT * FROM types WHERE `isDisable`=1";
        $result_type=$conn->query($sql_type);
    ?>
    <div class="container">
        <h1 style="text-align: center;margin:20px;">Create New Movie</h1>
        <div class="main-div">
            <p class="text-danger"><?php echo $mesg?></p>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-4">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" class="form-control" id="year" name="year">
                </div>
                <div class="mb-4">
                        <div class="dropdown">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" name="type" class="form-control select-checkbox-input" placeholder="Select Type" readonly id="dropdownCheckboxesButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <ul class="dropdown-menu dropdown-checkboxes" aria-labelledby="dropdownCheckboxesButton">
                            <?php while($row=$result_type->fetch_assoc()){?>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?=$row['id'] ?>" name="type[]" id="<?=$row['name'] ?>">
                                        <label class="form-check-label" for="<?=$row['name'] ?>">
                                            <?=$row['name'] ?>
                                        </label>
                                    </div>
                               </li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Poster</label>
                    <input class="form-control" type="file" id="formFile" name="poster">
                </div>
                <div class="mt-4" style="display: flex;">
                    <input class="btn btn-primary me-2" type="submit" value="Create Movie" name="create" >
                    <button class="btn btn-outline-primary"><a style="text-decoration:none; color:black;" href="index.php?tab=movie">Back To List</a></button>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    const checkboxes = document.querySelectorAll('.form-check-input');
    const input = document.getElementById('dropdownCheckboxesButton');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            const selectedOptions = [];
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    selectedOptions.push(cb.value);
                }
            });
            input.value = selectedOptions.join(', ');
        });
    });
</script>
<?php 
include('../partial/footer.php');
?>