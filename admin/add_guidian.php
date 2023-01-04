<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
    redirect("login.php");
}
?>
<?php

$guidian = new Guidian();

    if(isset($_POST['create'])){
        if($guidian){

            $guidian->first_name = $_POST['first_name'];
            $guidian->last_name = $_POST['last_name'];
            $guidian->email = $_POST['email'];
            $guidian->password = $_POST['password'];
            $guidian->set_file($_FILES['image']);
            $guidian->upload_photo();

            //$session->message("The user {$user->username} has been added");
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
                        All Parent
                        <small></small>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" >
                        </div>

                       <div class="form-group">
                           <label for="email">email</label>
                           <input type="text" name="email" class="form-control">
                       </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image">Profiles image</label>
                            <input name="MAX_FILE_SIZE" type="hidden" value="2000000">
                            <input name="image" type="file"  accept=".png, .jpg, .jpeg">
                            <!-- <input type="file" name="image"> -->
                        </div>
                       
                        <div class="form-group">
                                 <input type="submit" value="Create" name="create" class="btn-primary btn-sm pull-right">
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