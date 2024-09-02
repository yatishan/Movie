<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
    <style>
        h1{
            text-align: center;
            margin: 20px;
        }
        .main-div{
            width: 60%;
            margin: 0 auto;
        }
        
        .dropdown-checkboxes {
            max-height: 200px;
            overflow-y: 200px;
            padding: 5px;
        }
        .form-control.select-checkbox-input {
            cursor: pointer;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];
    if(isset($username) && isset($password)){
        if(isset($_SESSION['movie-list'])){
        $id=$_GET['id'];
        $movie_list=$_SESSION['movie-list'];
        $movie=array_filter($movie_list,function($value) use($id){
            return $value["id"] == $id;
        });
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST['title']) && !empty($_POST['type']) && !empty($_POST['year']) && isset($_FILES['poster'])){
                include("../upload/upload.php");
                if(($_FILES['poster'])['size'] !==0){
                    $file=$_FILES['poster'];
                    $upload=new Upload($file);
                    if($upload->isValidformat()){
                        $result=$upload->uploadNow();
                        if($result){
                            $title=$_POST['title'];
                            $type=$_POST['type'];
                            $year=$_POST['year'];
                            $image="../upload/{$file['name']}";
                            $movie=[
                                'id'=>time(),
                                'title'=>$title,
                                'type'=>$type,
                                'year'=>$year,
                                'image'=>$image,
                                "create_at"=>date("Y-m-d h:iA"),
                            ];
                            
                            $_SESSION['movie-list']=array_filter($movie_list,function($value) use($id){
                                return $value["id"] != $id;
                            });
                            $_SESSION['movie-list'][]=$movie;
                            header("location:index.php");
                            
                            
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
    }
    }else{
    header("location:login.php");
    }
    foreach($movie as $mov){
    ?>
    <div class="container">
        <h1>Update Movie</h1>
        <div class="main-div">
            <p class="text-danger"><?php echo $mesg?></p>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?=$mov['title'] ?>">
                </div>
                <div class="mb-4">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" class="form-control" id="year" name="year" value="<?=$mov['year'] ?>">
                </div>
                <div class="mb-4">
                        <div class="dropdown">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" name="type" class="form-control select-checkbox-input" placeholder="Select Options" readonly id="dropdownCheckboxesButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <ul class="dropdown-menu dropdown-checkboxes" aria-labelledby="dropdownCheckboxesButton">
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="movie" name="type[]" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1">
                                            Movie
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="series" name="type[]" id="checkbox2">
                                        <label class="form-check-label" for="checkbox2">
                                            Series
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="drama" name="type[]" id="checkbox3">
                                        <label class="form-check-label" for="checkbox3">
                                            Drama
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Poster</label>
                    <input class="form-control" type="file" id="formFile" name="poster" >
                </div>
                <div class="mt-4" style="display: flex; justify-content:center;">
                    <input class="btn btn-primary mx-2" type="submit" value="Update Movie" name="update" >
                    <button class="btn btn-outline-primary"><a style="text-decoration:none; color:black;" href="index.php">Back To List</a></button>
                </div>
            </form>
        </div>
    </div>
</body>
<?php }?>
<script src="../layout/js/bootstrap.bundle.min.js"></script>
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
</html>