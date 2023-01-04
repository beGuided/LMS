<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
    redirect("login.php");
}
?>
<?php

if(empty($_GET['id'])) {
    redirect("teacher.php");
}

    $teacher= Teacher::find_by_id($_GET['id']);
   if(isset($_POST['update'])) {
       if($teacher) {

    //    echo "<h1> $teacher->first_name </h1>";
           $teacher->first_name = $_POST['first_name'];
           $teacher->last_name = $_POST['last_name'];
           $teacher->email = $_POST['email'];
           $teacher->class_id = $_POST['class_id'];
           $teacher->password = $_POST['password'];
        
            $teacher->set_file($_FILES['image']);
            $teacher->upload_photo();
            $teacher->save();
            redirect("teacher.php");
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
                            <img src="<?php echo $teacher->image_path_and_placeholder();?>" width="100px" height="100px">
                        </div>

                    <div class="col-md-6 ">

                        <div class="form-group">
                            <label for="image">Profiles image</label>
                            <input name="MAX_FILE_SIZE" type="hidden" value="1000000">
                            <input name="image" type="file"  accept=".png, .jpg, .jpeg">
                            <!-- <input type="file" name="image"> -->
                        </div>

                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?Php echo $teacher->first_name;?>">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control"  value="<?Php echo $teacher->last_name;?>" >
                        </div>

                       <div class="form-group">
                           <label for="email">Email</label>
                           <input type="text" name="email" class="form-control"  value="<?Php echo $teacher->email;?>">
                       </div>
                      
                       <div class="form-group">
                            <label for="std_class_id">Teacher Class</label>
                            <select name="std_class_id" class="form-control">
                              <option value='<?Php echo $teacher->class_id;?> '><?Php echo $teacher->class_id;?></option>
                                <option value="JSS1">JSS1</option>
                                <option value="JSS2">JSS2</option>
                                <option value="JSS3">JSS3</option>
                                <option value="SS1">SS1</option>
                                <option value="SS2">SS2</option>
                                <option value="SS3">SS3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control"  value="<?Php echo $teacher->password;?>">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="update" value="update" class="btn btn-primary pull-right">
                        </div>
                        <div class="form-group">
                            <a href="delete.php?id=<?php echo $teacher->id; ?>" class="btn btn-danger" >Delete</a>
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