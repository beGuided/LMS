<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
    redirect("login.php");
}
?>
<?php



if(empty($_GET['id'])) {
    redirect("student.php");
}

    
    $selected_parent = Guidian::find_by_id($_GET['id']); 
    $Parent = Guidian::find_all(); 

    $student= Student::find_by_id($_GET['id']);
   if(isset($_POST['update'])) {
       if($student) {

    //    echo "<h1> $student->first_name </h1>";
           $student->first_name = $_POST['first_name'];
           $student->last_name = $_POST['last_name'];
           $student->email = $_POST['email'];
           $student->std_class_id = $_POST['std_class_id'];
           $student->std_parent_id = $_POST['std_parent_id'];
           //!empty($_POST['updated_parent_id'])? $student->std_parent_id = $_POST['updated_parent_id']:false;

           $student->password = $_POST['password'];
           $student->save();
            redirect("student.php");
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
                        Edit Student
                        <small>information</small>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        

                    <div class="col-md-6 mx-5">


                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?Php echo $student->first_name;?>">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control"  value="<?Php echo $student->last_name;?>" >
                        </div>

                       <div class="form-group">
                           <label for="email">Email</label>
                           <input type="text" name="email" class="form-control"  value="<?Php echo $student->email;?>">
                       </div>
                        
                        <div class="form-group">
                            <label for="std_class_id">Student Class</label>
                            <select name="std_class_id" class="form-control">
                              <option value='<?Php echo $student->std_class_id;?> '><?Php echo $student->std_class_id;?></option>
                                <option value="JSS1">JSS1</option>
                                <option value="JSS2">JSS2</option>
                                <option value="JSS3">JSS3</option>
                                <option value="SS1">SS1</option>
                                <option value="SS2">SS2</option>
                                <option value="SS3">SS3</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="std_class_id">Student Parent</label> 
                            
                            <select name="std_parent_id" class="form-control">
                            <option selected value="<?php echo $student->std_parent_id?>"><?php echo $student->std_parent_id?></option>
                            <?php foreach($Parent as $parent):?>
                                <option value="<?php echo $parent->id?>"><?php echo " $parent->first_name $parent->last_name"?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control"  value="<?Php echo $student->password;?>">
                        </div>
                        <div class="form-group">
                            <label for="image">Profiles image</label>
                            <input name="MAX_FILE_SIZE" type="hidden" value="2000000">
                            <input name="image" type="file"  accept=".png, .jpg, .jpeg">
                            <!-- <input type="file" name="image"> -->
                        </div>

                        <div class="form-group">
                            <input type="submit" name="update" value="update" class="btn btn-primary pull-right">
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