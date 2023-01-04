<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()){ redirect("../index.php"); } ?>
<?php

 $user_role = $_SESSION['role'];
 $teacher_class_id = $_SESSION['class_id'];
 if($user_role != "admin" && $user_role != "teacher" ){ 
     redirect('./index.php');  
 }

$Students = Student::find_all();
$students_by_class = Student::student_by_class_id($teacher_class_id);

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
                        Student Information
                        <small>Manage all Student</small>
                    </h1>

                    <a href="add_student.php" class="btn btn-primary"> Add Student</a>

                    <div class="col-md-12">
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Class </th>
                                <th>Parent id </th>
                            </tr>
                            </thead>
                            <tbody>
                       
                        <?php if($user_role == "admin"){?> 
                           <?php foreach ($Students as $student):?>

                                <tr>
                                <td><?php echo $student->id?>
                                  <td><img width="62px" src="<?php // echo $student->image_path_and_placeholder();?>" height= "62px" alt="image"></td>

                                     <td><?php echo $student->first_name?>
                                        <div class="actions_link">
                                            <a href="delete.php?id=<?php echo $student->id?>&class=Student&link=student.php">Delete</a>
                                            <a href="edit_student.php?id=<?php echo $student->id?>">Edit</a>
                                            <!-- <a href="#">View</a> -->
                                        </div>
                                    </td>
                                 <td><?php echo $student->last_name?></td>
                                 <td><?php echo $student->email?></td>
                                 <td><?php echo $student->std_class_id?></td>
                                 <td><?php echo $student->std_parent_id?></td>
                                  
                                </tr>
                            <?php endforeach; ?> 
                            <?php } else{?>
                                <?php foreach ($students_by_class as $student):?>

                                <tr>
                                <td><?php echo $student->id?>
                                <td><img width="62px" src="<?php echo $student->image_path_and_placeholder();?>" height= "62px" alt="image"></td>

                                    <td><?php echo $student->first_name?>
                                        <div class="actions_link">
                                            <a href="delete.php?id=<?php echo $student->id?>&class=Student&link=student.php">Delete</a>
                                            <a href="edit_student.php?id=<?php echo $student->id?>">Edit</a>
                                            <!-- <a href="#">View</a> -->
                                        </div>
                                    </td>
                                <td><?php echo $student->last_name?></td>
                                <td><?php echo $student->email?></td>
                                <td><?php echo $student->std_class_id?></td>
                                <td><?php echo $student->std_parent_id?></td>
                                
                                </tr>
                                <?php endforeach; ?> 
                           

                            <?php  } ?>

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