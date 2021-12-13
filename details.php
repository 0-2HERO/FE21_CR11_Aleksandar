<?php
session_start();
require_once 'components/db_connect.php';


// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM user WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);




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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $row['first_name']; ?></title>
    <?php require_once 'components/bootcss.php' ?>
    <link rel="stylesheet" href="components/style.css">
    <style>
        .userImage {
            width: 200px;
            height: 200px;
        }

        .hero {
            background: rgb(2, 0, 36);
            background: linear-gradient(24deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 100%);
        }

        .det-div{
    margin-top: 30rem;
}
    </style>
</head>

<body>
    <!-- navbar -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand me-5" href="#">VIENNA ADOPT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="senior.php">Senior Pets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="contact.php">Contact Us</a>
                    </li>
                </ul>
                <li class="d-flex align-items-center ">
                    <img class="userHome" style=" width: 25px;" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
                    <p class="text-dark ms-2 pt-3">Hi <?php echo $row["first_name"]; ?></p>
                 </li>
                 
                <a class="ms-3 text-decoration-none" href="update.php?id=<?php echo $_SESSION['user'] ?>">Update profile</a>
                <li class="d-flex">

                    <a href="/logout.php?logout"><button style="width: 6rem; height: 2.3rem;" class="btn btn  border-0"> Sign Out</button></a>
                </li>

            </div>
    </nav>
    <!-- navbar -->
  



<div class="container position-relative bg-light py-6 shadow">
	<div class="lc-block position-absolute start-0 top-0 mt-xl-n6 mt-n6 d-none d-xl-block ms-xl-n5">
		<img class="ratio img-fluid " style="max-height:35vh" src="pictures/<?= $picture?>"  loading="lazy">
	</div>
	<div class="row justify-content-xl-start justify-content-center ">

		<div class="col-10 d-block d-xl-none mt-n8 mb-4">
			<img class="ratio img-fluid" style="max-height:700px;object-fit:cover;" src=" pictures/<?= $picture?>" loading="lazy">
		</div>


		<div class="col-10 col-xl-5 offset-xl-5 mb-5">
			<div class="lc-block text-dark text-center text-xl-start">
				<div editable="rich">
					<h1><?=  $name ?></h1>
				</div>
			</div>
		</div>

	</div>
	<div class="row px-3 px-xl-0 col-xl-6 offset-xl-5 text-dark">
		<div class="col-sm-6 text-center text-sm-start mb-5">
		
			<div class="lc-block mb-4">
				<div editable="rich">
					<h3 class="fst-italic">About me</h3>
				</div>
			</div>
			<div class="lc-block">
				<div editable="rich">
					<p class="lead text-dark fs-4 fst-normal"> <?= $location ?></p>
					<p class="lead text-dark fs-4 fst-normal"> <?= $age ?> year old</p>
					<p class="lead text-dark fs-4 fst-normal">Breed: <?= $breed ?></p>
				
                   	<p class="lead text-dark fs-4 fst-normal"> <?= $size ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 text-center text-sm-start mb-5">
			<div class="lc-block mb-5">
			</div>
			<div class="lc-block mb-4">
				<div editable="rich">
					<h3 class="fst-italic">Short Description</h3>
				</div>
			</div>
			<div class="lc-block">
				<div editable="rich">
					<p class="lead text-dark-50"> <?= $description ?> </p>
				</div>
			</div>
	
		</div>
	</div>
</div>




    <?php require_once 'components/bootjs.php' ?>

 
</body>

</html>


   
