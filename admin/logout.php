<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
    <style>
        .main-div{
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background-color: black;
        }
        .inner-div{
            background-color: rgba(34, 23, 241, 0.2);
            color:white;
            text-align: center;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php 
    session_start();
    if(isset($_POST['yes'])){
        session_destroy();
        header("location:login.php");
    }
    if(isset($_POST['no'])){
        header("location:index.php");
    }
    ?>
    <div class="main-div">
        <div class="inner-div">
            <h4 class="mt-3">Are you sure you want to Logout ?</p>
            <div class="mt-5 mb-3">
                <form action="" method="post">
                    <button class="btn btn-danger py-2 px-4 mx-2" name="yes">Yes</button>
                    <button class="btn btn-success py-2 px-4" name="no">No</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="../layout/js/bootstrap.min.js"></script>
</html>