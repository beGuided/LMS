<?php ob_start();?>
<?php require_once("admin/includes/init.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' type='text/css' href='css and Js/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='css and Js/style.css'>
    <title>Fake School Portal</title>
</head>
<!-- navbar section -->

<nav class="navbar navbar-expand-sm bg-black p-3">
    <div class=" pad container-fluid">
        <a class="align-middle navbar-brand text-white" href="./index.php">Fake School Portal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./teacher_login.php">Teacher Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./student_login.php">Student Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./parent_login.php">Parent Login</a></a>
                </li>
                <!-- <li class="nav-item">
                <?php  //if($session->is_signed_in()){
                     // $dashboard_link = "admin/index.php";?>
                      <a class="nav-link text-white"  href="<?php// echo $dashboard_link?>">Dashboard</a>
                   <?php //} else{$dashboard_link = "";   }        ?>
                </li> -->

            </ul>
        </div>
    </div>
</nav>

<!-- navbar section end -->