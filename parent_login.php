<?php require_once('includes/header.php')?>

<?php  if($session->is_signed_in()){  $session->logout();}?> 

<?php

if(isset($_POST['submit'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

   // method to check database user
   $user_found= Guidian::verify_user($email, $password);


    if($user_found) {
        $session->login($user_found);
        redirect('admin/index.php?role=parent');
    }else{
        $the_message = "Password and Email incorrect";
    }
}else{
    $email = "";
    $password = "";
    $the_message = "";
}

if($session->is_signed_in()){

  $user_info = Guidian::find_by_id($session->user_id);
  if($user_info){
      $_SESSION['firstname'] = $user_info->first_name;
      $_SESSION['lastname'] = $user_info->last_name;
      $_SESSION['email'] = $user_info->email ;
      $_SESSION['role'] =  $user_info->user_role ;
   }
  
      $_SESSION['firstname'] ="";
      $_SESSION['lastname'] = "";
      $_SESSION['email'] ="";
      $_SESSION['role'] ="";
  
   }
  
?>
    <body class="Parent">

    <!-- Page Heading -->
    <div class="container top-margin">
        <div class="fake-Headline mt-5">
            <h1>FAKE SCHOOL</h1>
        </div>
        <div class="fake-title text-white text-center">
            <h5>PARENTS LOGIN PORTAL</h5>
        </div>
        <h4 class="bg-danger text-white  text-center "><?php echo $the_message; ?></h4>
    </div>

    <!-- Page Heading End -->

    <!-- Form Section -->

    <div class="container-form">
    <form id="" action="" method="post">

<div class="form-group  my-3">
    <label for="email" class="text-white ">Email</label>
    <input type="text" class="form-control" name="email" required >

</div>

<div class="form-group my-3">
    <label for="password" class="text-white">Password</label>
    <input type="password" class="form-control" name="password" required>

</div>
<div class="col-12 my-3 text-center">
          <input class="btn btn-primary" name="submit" type="submit" value='Login'/>
        </div>
</form>
        <div class="container text-center text-white">
            <h6>Not a Parent? Login as a <a href="./student_login.php">Student</a> or <a
                    href="./teacher_login.php">Teacher</a>
            </h6>
        </div>
    </div>
    <!-- Form Section End -->



    <script src="./css and Js/bootstrap.min.js"></script>
</body>

</html>