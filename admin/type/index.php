<?php
include('../partial/header.php');
$sql="SELECT * FROM types WHERE `isDisable`=1";
$result=$conn->query($sql);

?>
    <div class="container">
      <form action="" method="post">
        <button class="btn btn-dark my-4 text-right" name="addnew"><a href="add.php?tab=type" style="text-decoration:none; color:white;">Add New Type</a></button>
      </form>
      <table class="table table-bordered" border="1" >
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Create AT</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($row=$result->fetch_assoc()){
           ?>
              <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['created_at']?></td>
                <td>
                  <a href="edit.php?tab=type&id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen-to-square text-warning"></i></a>
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