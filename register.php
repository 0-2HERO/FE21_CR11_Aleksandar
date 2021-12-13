<?php
session_start(); // start a new session or continues the previous
if (isset($_SESSION['user']) != "") {
    header("Location: home.php"); // redirects to home.php
}
if (isset($_SESSION['adm']) != "") {
    header("Location: dashboard.php"); // redirects to home.php
}
require_once 'components/db_connect.php';
require_once 'components/file_upload.php';
$error = false;
$first_name = $last_name = $email = $phone_number = $address = $password = $picture = '';
$fnameError = $lnameError = $emailError = $phoneError = $addressError = $passError = $picError = '';
if (isset($_POST['btn-signup'])) {

    // sanitize user input to prevent sql injection
    $first_name = trim($_POST['first_name']);

    //trim - strips whitespace (or other characters) from the beginning and end of a string
    $first_name = strip_tags($first_name);

    // strip_tags -- strips HTML and PHP tags from a string

    $first_name = htmlspecialchars($first_name);
    // htmlspecialchars converts special characters to HTML entities

    $last_name = trim($_POST['last_name']);
    $last_name = strip_tags($last_name);
    $last_name = htmlspecialchars($last_name);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $phone_number = trim($_POST['phone_number']);
    $phone_number = strip_tags($phone_number);
  

    $address = trim($_POST['address']);
    $address = htmlspecialchars($address);

    $pass = trim($_POST['password']);
   $pass = strip_tags($pass);
   $pass = htmlspecialchars($pass);

 $redirectMSG = " You'll be redirected to Log In in about 3 secs. If not, click <a href='index.php'>here</a>.";
    $uploadError = '';
    $picture = file_upload($_FILES['picture'],'animal');

    // basic name validation
    if (empty($first_name) || empty($last_name)) {
        $error = true;
        $fnameError = "Please enter your full name and surname";
    } else if (strlen($first_name) < 3 || strlen($last_name) < 3) {
        $error = true;
        $fnameError = "Name and surname must have at least 3 characters.";
    } else if (!preg_match("/^[a-zA-Z]+$/", $first_name) || !preg_match("/^[a-zA-Z]+$/", $last_name)) {
        $error = true;
        $fnameError = "Name and surname must contain only letters and no spaces.";
    }

    //basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    } else {
        // checks whether the email exists or not
        $query = "SELECT email FROM user WHERE email='$email'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count != 0) {
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }
    //checks if the date input was left empty
    if (empty($phone_number)) {
        $error = true;
        $phoneError = "Please enter your phone number.";
    }

    //checks if the address input was left empty
    if (empty($address)) {
        $error = true;
        $addressError = "Please enter your address.";

        // password validation

    }
    if (empty($pass)) {
        $error = true;
        $passError = "Please enter password.";
    } else if (strlen($pass) < 6) {
        $error = true;
        $passError = "Password must have at least 6 characters.";
    }

    // password hashing for security
    $password = hash('sha256', $pass);
    // if there's no error, continue to signup
    if (!$error) {

        $query = "INSERT INTO user(first_name, last_name, email, phone_number, address, picture, password)
                  VALUES('$first_name', '$last_name', '$email','$phone_number','$address','$picture->fileName','$pass')";
        $res = mysqli_query($connect, $query);

       // var_dump($password);
        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
            header("refresh:4;url=index.php");
           
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
        }
    }
}


mysqli_close($connect);
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration System</title>
    <link rel="stylesheet" href="components/style.css">
    <?php require_once "components/bootcss.php" ?>

</head>

<body>
   
            <?php
            if (isset($errMSG)) {
            ?>^
            
                <div class="col text-center alert alert-<?php echo $errTyp ?>" >
                    <div class="row text-center">
                        <p><?php echo $errMSG; ?></p>
                    </div>
                    <div class="row text-center">
                        <p><?php echo $uploadError; ?></p>  </div>
                        <div class="col text-center">    <h3 class="fw-light"><?php echo $redirectMSG; ?></h3> </div>
                  
                </div>

            <?php
            }
            ?>

<div class="container-fluid">
                <div class="row no-gutter">
                    <div class="col-md-7 d-none d-md-flex bg-imagetwo "></div>
                    <div class="col-md-5 bg-light">
                        <div class="login d-flex align-items-center py-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7 col-xl-6 mx-auto">
                                        <h3 class="display-4">Register</h3> <br>
                                        <form class="w-75"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" enctype="multipart/form-data" >
                                            <div class="form-group mb-3"> 
            <input type="text" name="first_name" class="form-control rounded-pill" placeholder="First name" maxlength="50" value="<?php echo $first_name ?>" />
            <span class="text-danger"> <?php echo $fnameError; ?> </span> </div>
                                            <div class="form-group mb-3"> 
            <input type="text" name="last_name" class="form-control rounded-pill" placeholder="Surname" maxlength="50" value="<?php echo $last_name ?>" />
            <span class="text-danger"> <?php echo $fnameError; ?> </span> </div>
                                            <div class="form-group mb-3"> 
            
                                            <input type="email" name="email" class="form-control rounded-pill" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
            <span class="text-danger"> <?php echo $emailError; ?> </span> </div>
                                            <div class="form-group mb-3"> 
           
                                            <input type="text" name="phone_number" class="form-control rounded-pill" placeholder="Phone number" maxlength="50" value="<?php echo $phone_number ?>" />
                <span class="text-danger"> <?php echo $phoneError; ?> </span></div>
                                            <div class="form-group mb-3"> 
            
                                            <input class='form-control rounded-pill w-60' type="text" name="address" placeholder="Address" value="<?php echo $address ?>" />
                <span class="text-danger"> <?php echo $addressError; ?> </span> </div>
                                            <div class="form-group mb-3"> 
            
                                            <input class='form-control w-65 rounded-pill' type="file" name="picture">
                <span class="text-danger"> <?php echo $picError; ?> </span> </div>
                                            <div class="form-group mb-3"> 
                                            <input type="password" name="password" class="form-control rounded-pill" placeholder="Enter Password" maxlength="15" />
            <span class="text-danger"> <?php echo $passError; ?> </span>
            <hr /> </div>
                                            <div class="custom-control custom-checkbox mb-3"> <button type="submit" class="btn btn-block btn-primary rounded-3" name="btn-signup">Create account</button></div>
                                            <div class="text-center d-flex justify-content-between mt-4">
                                                <p> OR &nbsp<a href="index.php" class="font-italic text-muted"> <u>Sign In</u></a></p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php require_once "components/bootjs.php" ?>
</body>

</html>
