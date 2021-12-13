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
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <?php require_once '../components/bootcss.php' ?>
    <link rel="stylesheet" href="../components/style.css">
</head>

<body>


 
    <center>
        <div class="mt-5" >
            <fieldset>
                <legend class='h2 mb-3'> Delete request <img class='img-thumbnail rounded-circle' src='../pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
                <h5>You have selected the data below:</h5>
                    <table class="table w-75 mt-3">
                        <tr>
                            <td><?php echo  $name ?></td>
                        </tr>
                    </table>
                    <h3 class="mb-4">Do you really want to delete this product? </h3>
                    <form action="actions/a_delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>" />
                        <input type="hidden" name="picture" value="<?php echo $picture ?>" />
                        <button class="btn b btn-danger" type="submit"> Yes, delete it! </button>

                    <a href="../dashboard.php"><button class="btn btn-warning text-decoration-none" type="button"> No, go back! </button></a>
                    </form>
            </fieldset>
        </div>
    </center>

    

   <div class="container ">
		<div >
			<img src="https://cdn.pixabay.com/photo/2020/08/15/18/02/paws-5491105_960_720.png" class="d-block mx-lg-auto img-fluid" style="min-width: 550px;" alt="" loading="lazy">
		</div>
        </div>
		


    <?php require_once '../components/bootjs.php' ?>
</body>

</html>