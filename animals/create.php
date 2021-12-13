<?php
session_start();
require_once '../components/db_connect.php';


if (isset($_SESSION['user']) != "") {
   header("Location: ../home.php");
   exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
   header("Location: ../index.php");
   exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css, bootstrap -->
    <link rel="stylesheet" href="../components/style.css">
    <?php require_once '../components/bootcss.php' ?>
    <title>Document</title>

</head>

<body>
    <div class="container w-50">

        <legend class='h2'>Add new pet</legend>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" /></td>
                </tr>
                <tr>
                    <th>description</th>
                    <td><input class='form-control' type="text" name="description" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="file" name="picture" /></td>
                </tr>
                <tr>
                    <th>Location </th>
                    <td><input class='form-control' type="text" name="location" /></td>
                </tr>
                <tr>
                    <th>Hobbies</th>
                    <td><input class='form-control' type="text" name="hobby" /></td>
                </tr>
                <tr>
                    <th>Size </th>
                    <td><input class='form-control' type="text" name="size" /></td>
                </tr>
                <tr>
                    <th>Breed</th>
                    <td><input class='form-control' type="text" name="breed" /></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="text" name="age" /></td>
                </tr>
                <tr>
                    <td>
                        <button class='btn btn-success' type="submit"> Insert </button>
                    </td>

                </tr>
            </table>
        </form>
        </fieldset>

    </div>

    <!-- scripts -->
    <?php require_once '../components/bootjs.php' ?>

</body>

</html>