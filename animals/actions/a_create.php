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
    $name = $_POST['name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $hobby = $_POST['hobby'];
    $breed = $_POST['breed'];
    $age =  $_POST['age'];
    $uploadError = '';
    //this function exists in the service file upload.
    $picture = file_upload($_FILES['picture'], 'animal'); 

    $sql = "INSERT INTO `animals`(`name`, `picture`, `location`, `description`, `size`, `hobby`, `breed`, `age`) VALUES ('$name', '$picture->fileName','$location','$description','$size','$hobby','$breed','$age')";

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> NAME: $name </td>
            <td>AGE: $age </td>
            </tr></table><hr>";
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <?php require_once "../../components/bootcss.php" ?>
    <link rel="stylesheet" href="components/style.css">

</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                    <a href='../../dashboard.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>
    <?php require_once '../../components/bootjs.php' ?>
</body>

</html>