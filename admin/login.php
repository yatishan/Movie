<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
    <style>
        .main-div{
            /* margin: 0px auto; */
            display: flex;
            justify-content: center;
            height: 100vh;
            align-items: center;
            background-image: url(../layout/images/Netflix-Hintergrund-4.webp);
            background-size: cover;
        }
        h1{
            text-align: center;
            color:red;
        }
        .inner-div{
            background-color: black;
            padding: 20px;
            border-radius: 5px;
            color:white;    
        }
        
        
    </style>
</head>
<body>
    <?php 
    include('../db_connection.php');
    if(isset($_POST['btn'])){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $username=$_POST['username'];
            $password=$_POST['password'];
            $sql="SELECT * FROM account WHERE `isDisable`=1";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();
            if($username===$row['name'] && $password===$row['pass']){
                header("location:index.php");
            }else{
                $message="something is wrong";
            }
        }else{
            $message="Please fail your name and password!";            /* display: flex; */
        }
    }
    ?>
    <div class="main-div">
        <div class="inner-div">
        <form action="login.php" method="post">
            <h1>Login Form</h1>
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" value="administrator">
            <label for="password" class="form-label">Password</label>
            <input type="number" class="form-control" name="password" value="77778888">
            <p class="text-danger"><?php echo $message ?></p>
            <div>
                <input type="submit" value="Login" name="btn" class="btn px-4 py-2 mt-4" style="background-color:red; color:black; font-weight:bold;">
            </div>
        </form>
        </div>
    </div>
</body>
<script src="../layout/js/bootstrap.min.js"></script>
</html>