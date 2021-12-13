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



$sql = "SELECT * FROM animals  WHERE age >= 8";
$result = mysqli_query($connect, $sql);

$displayPets = ''; //this variable  holds the body for the table
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $displayPets .= "


        <div class='col-md-6 col-lg-4 g-4'>
        <div class='lc-block border rounded shadow'>
           <img class='img-fluid' src='../pictures/" . $row['picture'] . "' sizes='(max-width: 1080px) 100vw, 1080px' width='1080' height='768'  loading='lazy'>
           <h3>" . $row['name'] . "</h3><p>" . $row['location'] . ", " . $row['age'] . " year old</p>
           <a href='details.php?id=" . $row['id'] . "'><button class='btn btn-outline-primary m-1' type='button'>More details</button></a>
           </div>
           </div>


     ";
    };
} else {
    $displayPets =  "<tr><td colspan='10'><center>No animals available </center></td></tr>";
}


// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM user WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);


mysqli_close($connect);
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
    </style>
</head>

<body class="">
    <!-- navbar -->

    <nav class="navbar navbar-expand-lg navbar-light mt-3"  >
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold  fs-2 font-monospace" href="#">VIENNA ADOPT</a>
            <button class="navbar-toggler rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
  
   <!-- hero -->
   <div class="container col-xxl-8 px-4 py-5">
	<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
		<div class="col-10 col-sm-8 col-lg-6">
			<img src="https://cdn.pixabay.com/photo/2020/08/15/18/02/paws-5491105_960_720.png" class="d-block mx-lg-auto img-fluid" style="min-width: 550px;" alt="" loading="lazy">
		</div>
		<div class="col-lg-6">
			<div class="lc-block mb-3">
				<div editable="rich">
					<h2 class="fw-bold display-5">Why Adopt a Dog or Cat Over Buying?</h2>
				</div>
			</div>

			<div class="lc-block mb-3">
				<div editable="rich">
					<p class="lead">Did you know that over 1,000 people per hour run a search right here looking to adopt a pet? Pet adoption is quickly becoming the preferred way to find a new dog, puppy, cat or kitten. Best of all, there are so many benefits when you adopt a dog 
					</p>
				</div>
			</div>

			<div class="lc-block d-grid gap-2 d-md-flex justify-content-md-start">
				<a class="btn btn-outline-secondary px-4" href="contact.php" role="button">Contact Us</a>
			</div>

		</div>
	</div>
</div>

   <!-- hero -->

   <div class="container py-5">
   <div class="row mb-4">
      <div class="lc-block text-center">
         <div editable="rich">
            <h2 class="fw-bold fs-2 display-2"> Senior animals for adoption</h2>
         </div>
      </div>
      <div class="lc-block ">
         <div editable="rich text-center">
            <p class="lead">Did you know that most dogs do not have a home due to no fault of their own? It is a common myth to think that all dogs up for adoption in shelters and rescues are damaged in some way. But, nothing could be less true! <br>Dog shelters and rescues are full of lovable, active and healthy adoptable dogs just waiting for someone to take them home.<br></p>
         </div>
         <div editable="rich">
            <h2 class="fw-bold fs-2 text-start mt-5 display-2">Featured Senior Pets</h2>
         </div>
      </div>
   </div>
   <div class="row">
      
   
         <!-- /lc-block -->
         <?= $displayPets; ?>
         <!-- /lc-block -->
         
      </div>
   </div>
</div>



    <?php require_once 'components/bootjs.php' ?>


</body>

</html>