<?php

session_start();

if (isset($_SESSION['user']) != "") {
   header("Location: ../../home.php");
   exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
   header("Location: ../../index.php");
   exit;
}


require_once '../../components/db_connect.php';
require_once '../../components/file_upload.php';


if ($_POST) {    
   $name = $_POST['name' ];
   $location = $_POST['location'];
   $description = $_POST['description'];
   $size = $_POST['size'];
   $hobby = $_POST['hobby'];
   $breed = $_POST['breed'];
   $age = $_POST['age'];
   $id = $_POST['id'];

   //variable for upload pictures errors is initialized
   $uploadError = '';

   $picture = file_upload($_FILES['picture'], 'animal');//file_upload() called  
   if($picture->error===0){
       ($_POST["picture" ]=="animal.png")?: unlink("../pictures/$_POST[picture]");          
       $sql = "UPDATE animals SET name = '$name', picture = '$picture->fileName', location = '$location', description = '$description', size = '$size', hobby = '$hobby', breed = '$breed', age = '$age'  WHERE id = {$id}";
   }else{
       $sql = "UPDATE animals SET name = '$name', location = '$location', description = '$description', size = '$size', hobby = '$hobby', breed = '$breed', age = '$age'  WHERE id = {$id}";
   }    
   if (mysqli_query($connect, $sql) === TRUE) {
       $class = "success";
       $message = "The record was successfully updated" ;
       $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'' ;
   } else {
       $class = "danger";
       $message = "Error while updating record : <br>" . mysqli_connect_error();
       $uploadError = ($picture->error != 0)? $picture->ErrorMessage :'';
   }
   mysqli_close($connect);    
} else {
   header("location: ../error.php");
  
}
?>


<!DOCTYPE html>
<html lang= "en">
   <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../../components/bootcss.php'?> 
    </head>
   <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
           </div>
            <div class="alert alert-<?php echo $class;?>"  role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?id=<?=$id;?>' ><button class="btn btn-warning"  type='button'>Back </button></a>
                <a href='../../dashboard.php    ' ><button class="btn btn-success"  type='button'>Home </button></a>
           </div>
       </div>

       <?php require_once '../../components/bootjs.php'?> 
   </body>
</html>