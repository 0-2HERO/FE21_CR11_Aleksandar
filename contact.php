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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once 'components/bootcss.php' ?>
    <link rel="stylesheet" href="components/style.css">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light mt-3"  >
        <div class="container-fluid">
            <a class="navbar-brand me-5 fs-2 fw-bold font-monospace" href="#">VIENNA ADOPT</a>
            <button class="navbar-toggler rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="seniors.php">Senior Pets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Contact Us</a>
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


		</div>
	</div>
</div>

   <!-- hero -->

    
    

<div class="container py-5">
    <div class="row g-0">
        <div class="col-md-6 text-center d-flex flex-column justify-content-center min-vh-50 bg-light">
            <div class="lc-block mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" fill="currentColor" viewBox="0 0 16 16" lc-helper="svg-icon">
                    <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98l4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"></path>
                </svg>
            </div>
            <!-- /lc-block -->

            <div class="lc-block mb-4">
                <div editable="rich">
                    <h2 class="fw-bolder">Address</h2>
                </div>
            </div>
            <div class="lc-block">
                <div editable="rich">
                    <p class="lead">
                        Stephanplatz 1 -<br>
                        <br>
                        Zip 1100
                    </p>
                </div>
            </div>
            <!-- /lc-block -->
        </div>
        <!-- /col -->
        <div class="col-md-6 bg-dark text-white d-flex flex-column justify-content-center text-center py-5">
            <div class="lc-block mb-4 border-bottom border-white py-4">
                <div class="lc-block mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" fill="currentColor" viewBox="0 0 16 16"  lc-helper="svg-icon">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                    </svg>
                </div>
                <!-- /lc-block -->

                <div class="lc-block mb-4">
                    <div editable="rich">
                        <h2 class="fw-bolder">Phone</h2>
                    </div>
                </div>
                <div class="lc-block">
                    <div editable="rich">
                        <p class="lead">0660-773-4045<br></p>
                    </div>
                </div>
                <!-- /lc-block -->
            </div>
            <div class="lc-block py-4">
                <div class="lc-block mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" fill="currentColor" viewBox="0 0 16 16"  lc-helper="svg-icon">
                        <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z"></path>
                        <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z"></path>
                    </svg>
                </div>
                <!-- /lc-block -->

                <div class="lc-block mb-4">
                    <div editable="rich">
                        <h2 class="fw-bolder">Mail</h2>
                    </div>
                </div>
                <div class="lc-block">
                    <div editable="rich">
                        <p class="lead">viennaadopt@mail.com<br></p>
                    </div>
                </div>
                <!-- /lc-block -->
            </div>
            <!-- /lc-block -->
        </div>
        <!-- /col -->
    </div>
</div>



 

    <?php require_once 'components/bootjs.php' ?>

</body>
</html>

