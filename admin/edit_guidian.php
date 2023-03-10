<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
    redirect("login.php");
}
?>
<?php

if(empty($_GET['id'])) {
    redirect("giudian.php");
}

    $guidian= Guidian::find_by_id($_GET['id']);
   if(isset($_POST['update'])) {
       if($guidian) {

    //    echo "<h1> $guidian->first_name </h1>";
           $guidian->first_name = $_POST['first_name'];
           $guidian->last_name = $_POST['last_name'];
           $guidian->email = $_POST['email'];
           $guidian->password = $_POST['password'];
            $guidian->save();
            redirect("guidian.php");
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

                      
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?Php echo $guidian->first_name;?>">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control"  value="<?Php echo $guidian->last_name;?>" >
                        </div>

                       <div class="form-group">
                           <label for="email">Email</label>
                           <input type="text" name="email" class="form-control"  value="<?Php echo $guidian->email;?>">
                       </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control"  value="<?Php echo $guidian->password;?>">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="update" value="update" class="btn btn-primary pull-right">
                        </div>
                        <div class="form-group">
                            <a href="delete.php?id=<?php echo $guidian->id; ?>" class="btn btn-danger" >Delete</a>
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