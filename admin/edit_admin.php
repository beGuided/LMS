<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
    redirect("login.php");
}
?>
<?php

if(empty($_GET['id'])) {
    redirect("admin.php");
}

    $admin= Admin::find_by_id($_GET['id']);
   if(isset($_POST['update'])) {
       if($admin) {

           $admin->first_name = $_POST['first_name'];
           $amin->last_name = $_POST['last_name'];
           $amin->email = $_POST['email'];
           $amin->password = $_POST['password'];
           if(empty($_FILES['image'])){
               $admin->save();
           }else {
               $admin->set_file($_FILES['image']);
               $admin->upload_photo();
               $admin->save();
               redirect("edit_admin.php?id={$user->id}");
           }
       }

   }


?>


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <?php include("includes/top_nav.php");?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

        <?php include("includes/side_nav.php") ?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Photos
                        <small>Subheading</small>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 ">
                            <img src="<?php echo $admin->image_path_and_placeholder();?>" width="100px" height="100px">
                        </div>

                    <div class="col-md-6 ">

                        <div class="form-group">
                            <label for="user_image">Profiles image</label>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?Php echo $admin->first_name;?>">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control"  value="<?Php echo $admin->last_name;?>" >
                        </div>

                       <div class="form-group">
                           <label for="email">Email</label>
                           <input type="text" name="email" class="form-control"  value="<?Php echo $admin->email;?>">
                       </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control"  value="<?Php echo $admin->password;?>">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="update" value="update" class="btn btn-primary pull-right">
                        </div>
                        <div class="form-group">
                            <a href="delete.php?id=<?php echo $admin->id; ?>" class="btn btn-danger" >Delete</a>
                        </div>


                    </div>



                    </form>



                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>