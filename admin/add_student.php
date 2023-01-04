<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
    redirect("login.php");
}
?>
 
<?php

$Parent = Guidian::find_all(); 

$student = new Student();

    if(isset($_POST['create'])){
        if($student){

            $student->first_name = $_POST['first_name'];
            $student->last_name = $_POST['last_name'];
            $student->email = $_POST['email'];
            $student->std_class_id = $_POST['std_class_id'];
            $student->std_parent_id = $_POST['std_parent_id'];
            $student->password = $_POST['password'];
            $student->set_file($_FILES['image']);
            $student->upload_photo();
            //$session->message("The user {$user->username} has been added");
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
                        Add Student
                        <small></small>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" required name="first_name" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" required name="last_name" class="form-control" >
                        </div>
                        
                        
                       <div class="form-group">
                           <label for="email">email</label>
                           <input type="text" required name="email" class="form-control">
                       </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" required name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="std_class_id"> Student Class</label>
                            <select name="std_class_id" required class="form-control">
                            <option></option>    
                            <option value="JSS1">JSS1</option>
                                <option value="1">JSS2</option>
                                <option value="2">JSS3</option>
                                <option value="3">SS1</option>
                                <option value="4">SS2</option>
                                <option value="5">SS3</option>
                            </select>
                        </div>
                            
                        <div class="form-group">
                            <label for="std_class_id">Student Parent</label> 
                            <select name="std_parent_id" required class="form-control">
                            <option></option>
                            <?php foreach($Parent as $parent):?>
                                <option value="<?php echo $parent->id?>"><?php echo "$parent->first_name $parent->last_name" ?></option>
                                <?php endforeach?>
                            </select>
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