<?php
session_start();
require_once 'components/db_connect.php';


if (isset($_SESSION['user']) != "") {
   header("Location: ../home.php");
   exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
   header("Location: ../index.php");
   exit;
}

$sql = "SELECT * FROM animals";
$result = mysqli_query($connect, $sql);

$displayPets = ''; //this variable  holds the body for the table
if (mysqli_num_rows($result)  > 0) {
   while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $displayPets .= "

      <div class='card m-5 border-0' style='max-width: 20rem;'>
  <img src='../pictures/" . $row['picture'] . "' class='card-img-top' alt='...'>
  <div class='card-body'>
        <h5 class='card-title'>" . $row['name'] . " </h5>

    <p class='card-text'>ID: " . $row['id'] . "</p>
    <p class='card-text'>Location: " . $row['location'] . "</p>
    <p class='card-text'>Hobby: " . $row['hobby'] . "</p>
    <p class='card-text'>Breed: " . $row['breed'] . "</p>
    <p class='card-text'>Breed: " . $row['size'] . "</p>
    <p class='card-text'>Age: " . $row['age'] . "</p>
    <p class='card-text'>Description: " . $row['description'] . "</p>
    <a href='animals/update.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
    <a href='animals/delete.php?id=" . $row['id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a>
  </div>
</div>

     ";
   };
} else {
   $displayPets =  "<div class='m-5'><center>No Data Available </div>";
}



mysqli_close($connect);

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">


   <!-- css, bootstrap -->
   <link rel="stylesheet" href="../components/style.css">
   <?php require_once 'components/bootcss.php' ?>

   </head>

<body>
        <!-- navbar -->

        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5 mt-3">
    <div class="container-fluid ">
    <a class="navbar-brand me-5 fs-2 fw-bold font-monospace" href="#">VIENNA ADOPT</a>
    <div class=" navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">

       

        <li class="d-flex nav-item  me-3"> 
        <img class="userImage  rounded-circle" style="width: 45px; height: 45px;"; src="../pictures\admavatar.png" alt="Adm avatar">
        <p class="text-dark pt-2">Admin</p>
        </li>
        
        <li class="d-flex nav-item ">                             
           <a href="logout.php?logout"><button style="width: 6rem; height: 2.3rem;" class="btn btn  border-0"> Sign Out</button></a>
        </li>
       
        </div>
      </nav>
     
            <!-- navbar -->

   
  
   <a href= "animals/create.php" ><button class='btn btn-primary mb-5'type= "button" >Add new animal</button></a>   
<div class="row">
        <?= $displayPets; ?>
        </div>






      <!-- scripts -->
      <?php require_once 'components/bootjs.php' ?>


</body>

</html>

<tr>

<!--<td><img class='img-thumbnail' src='../pictures/" . $row['picture'] . "'></td>
<td>" . $row['name'] . "</td>
<td class='text-wrap'>" . $row['description'] . "</td>
<td>" . $row['location'] . "</td>
<td>" . $row['hobby'] . "</td>
<td>" . $row['size'] . "</td>
<td>" . $row['breed'] . "</td>
<td>" . $row['age'] . "</td>
<td><a href='animals/update.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
<a href='animals/delete.php?id=" . $row['id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
</tr -->

