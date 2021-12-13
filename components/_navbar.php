  <?php
      if (isset($_SESSION['adm'])) {
          echo '
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand me-5" href="#">VIENNA ADOPT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="animals/index.php">Pets for Adoption
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../senior.php">Seniors</a>
             </li>   
        </ul>
        <li class="d-flex align-items-center "> 
        <img class="userImage  rounded-circle" style="width: 30px"; src="../pictures\admavatar.png" alt="Adm avatar">
        <p class="text-dark pt-3 ms-3">Admin</p>
        </li>
        <li class="d-flex ms-5">                             
           <a href="logout.php?logout"><button style="width: 6rem; height: 2.3rem;" class="btn btn  border-0"> Sign Out</button></a>
        </li>
       
        </div>
      </nav>
     
    ';

    }

    if (isset($_SESSION['user'])) {

        echo '

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
              <a class="nav-link active" aria-current="page" href="#">Adopted Pets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Contact Us</a>
            </li>
           
            </ul>
            <li class="d-flex align-items-center "> 
            <img class="userHome" src="<?php echo $row["picture"]; ?>" alt="<?php echo $row["first_name"]; ?>">
            <p class="text-dark ms-2 pt-3">Hi <?php echo $row["first_name"]; ?></p>
            <a class="nav-link active me-5" aria-current="page" href="#">My profile</a>
            
        </li>
        <li class="d-flex">                             
           <a href="/logout.php?logout"><button style="width: 6rem; height: 2.3rem;" class="btn btn  border-0"> Sign Out</button></a>
        </li>
       
        </div>
      </nav>
           ';

    } 
    

    ?>
    