<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()){  redirect("../index.php");}?>


<?php  $Teachers = Teacher::find_all(); 
    $user_role = $_SESSION['role'];
    if($user_role != "admin"  ){ 
        redirect('./index.php');  
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
                        Teacher
                        <small>Manage Teachers</small>
                    </h1>

                    <a href="add_teacher.php" class="btn btn-primary"> Add Teacher</a>

                    <div class="col-md-12">
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>class</th>
                                <th>Password</th>
                            </tr>
                            </thead>
                            <tbody>
                       
                               
                           <?php foreach ($Teachers as $teacher):?>

                                <tr>
                                <td><?php echo $teacher->id?>
                                  <td><img width="62px" src="<?php  echo $teacher->image_path_and_placeholder();?>" height= "62px" alt="image"></td>

                                     <td><?php echo $teacher->first_name?>
                                        <div class="actions_link">
                                            <a href="delete.php?id=<?php echo $teacher->id?>&class=teacher&link=teacher.php">Delete</a>
                                            <a href="edit_teacher.php?id=<?php echo $teacher->id?>">Edit</a>
                                            <!-- <a href="#">View</a> -->
                                        </div>
                                    </td>
                                 <td><?php echo $teacher->last_name?></td>
                                 <td><?php echo $teacher->email?></td>
                                 <td><?php echo $teacher->class_id?></td>
                                 <td><?php echo $teacher->password?></td>
                                    
                                  
                                </tr>

                            <?php endforeach; ?> 
                            </tbody>
                        </table>


                    </div>


                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>