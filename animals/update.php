<?php
session_start();

if (isset($_SESSION['user']) != "") {
   header("Location: ../home.php");
   exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
   header("Location: ../index.php");
   exit;
}

require_once '../components/db_connect.php';


if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animals WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $location = $data['location'];
        $description = $data['description'];
        $size = $data['size'];
        $hobby = $data['hobby'];
        $breed = $data['breed'];
        $age =  $data['age'];
        $picture = $data['picture'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
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
    <?php require_once  "../components/bootcss.php" ?>


</head>

<body>

 
   <!-- hero -->
   <div class="container ">
		<div >
			<img src="https://cdn.pixabay.com/photo/2020/08/15/18/02/paws-5491105_960_720.png" class="d-block mx-lg-auto img-fluid" style="min-width: 550px;" alt="" loading="lazy">
		</div>
        </div>
		
   <!-- hero -->
    <center>
        <div class="w-50">
            <fieldset>
                <legend class='h2 mt-5'>Update request <img class='img-thumbnail rounded-circle' src='../pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
                <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <td><input class="form-control" type="text" name="name" value="<?php echo $name ?>" /></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><input class="form-control" type="text" name="description" step="any" value="<?php echo $description ?>" /></td>
                        </tr>
                        <tr>
                            <th>Picture </th>
                            <td><input class="form-control" type="file" name="picture" /></td>
                            </t>
                        <tr>
                        <tr>
                            <th>Location</th>
                            <td><input class="form-control" type="text" name="location" step="any" value="<?php echo $location ?>" /></td>
                        </tr>
                        <tr>
                            <th>Hobbies</th>
                            <td><input class="form-control" type="text" name="hobby" step="any" value="<?php echo $hobby ?>" /></td>
                        </tr>
                        <tr>
                            <th>Size</th>
                            <td><input class="form-control" type="text" name="size" step="any" value="<?php echo $size ?>" /></td>
                        </tr>
                        <tr>
                            <th>Breed</th>
                            <td><input class="form-control" type="text" name="breed" step="any" value="<?php echo $breed ?>" /></td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td><input class="form-control" type="text" name="age" step="any" value="<?php echo $age ?>" /></td>
                        </tr>
                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                        <input type="hidden" name="picture" value="<?php echo $data['picture'] ?>" />
                        <td><button class="btn btn-success" type="submit">Save Changes</button></td>
                        <td><a href="../dashboard.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                        </tr>
                    </table>
                </form>
            </fieldset>
        </div>
    </center>

   <div class="container ">
		<div >
			<img src="https://cdn.pixabay.com/photo/2020/08/15/18/02/paws-5491105_960_720.png" class="d-block mx-lg-auto img-fluid" style="min-width: 550px;" alt="" loading="lazy">
		</div>
        </div>
		
  

    <?php require_once "../components/bootjs.php" ?>
</body>

</html>