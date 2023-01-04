<?php require_once("includes/header.php");?>

<?php  if($session->is_signed_in()){ 
    redirect("index.php");}
?>
<?php

if(isset($_POST['submit'])){
    $last_name = trim($_POST['last_name']);
    $password = trim($_POST['password']);

    //method to check database user
    $user_found= Admin::verify_user($last_name, $password);
    if($user_found) {
        $login_user_role="admin";
        $session->login($user_found, $login_user_role);
        redirect('index.php');
    }else{
        $the_message = "your password and user last_name is incorrect";
    }
}else{
    $last_name = "";
    $password = "";
    $the_message = "";
}
if($session->is_signed_in()){

$user_info = Admin::find_by_id($session->user_id);
if($user_info){
    $_SESSION['firstname'] = $user_info->first_name;
    $_SESSION['lastname'] = $user_info->last_name;
    $_SESSION['email'] = $user_info->email ;
    $_SESSION['role'] =  $user_info->user_role ;
 }
else{
    $_SESSION['firstname'] ="";
    $_SESSION['lastname'] = "";
    $_SESSION['email'] ="";
    $_SESSION['role'] ="";

 }
}

?>

<div class="col-md-4 col-md-offset-3 ">

<h4 class="bg-danger"><?php echo $the_message; ?></h4>

<form id="login-id" action="" method="post">

    <div class="form-group">
        <label for="last_name">last_name</label>
        <input type="text" class="form-control" name="last_name" >

    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">

    </div>

    <div class="form-group">
        <input type="submit" name="submit" value="submit" class="btn btn-primary">

    </div>

</form>
</div>