<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
    redirect("../index.php");
}
?>
<?php
 $user_role = $_SESSION['role'];
 $author = $_SESSION['user_id'];
 if($user_role != "admin" && $user_role != "teacher" ){ 
     redirect('./index.php');  
 }

$results_by_author = Result::result_by_author($author);

$Results = Result::find_all();

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
                    View Result
                        <small></small>
                    </h1>

                    <div class="col-md-12">
                        <div class="row">   <a href="add_result.php" class="btn btn-primary"> Add Result</a></div>
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                           
                                 <th>File</th>
                                <th>Filename</th>
                                <th>Student id</th>
                                <th>For class</th>
                                <th>Result id</th>
                                <th>Posted by</th>
                             
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($user_role == "admin"){?> 
                            <?php foreach ($Results as $result) :?>
                            <tr>
                                <td><i class="fa fa-fw fa-file" class="lg"></i>
                                <div class="action_link">
                                    <a href="delete.php?id=<?php echo $result->id?>?class=Asessment&link=assessment.php">Delete</a>
                                    <a href="edit_result.php?id=<?php echo $result->id?>">Edit</a>
                                    <a> Download</a>
                                </div>
                                </td>
                                 <td><?php echo $result->filename?></td>
                                <td><?php echo $result->student_id?></td>
                                <td><?php echo $result->std_class_id?>
                                <td><?php echo $result->id?>
                                    <?php //$teacher = Teacher::find_by_id( $result->author);
                                    //echo $teacher->first_name. $teacher->last_name;?> 
                                </td>
                                <td><?php echo $result->teacher_id?>
                               
                                
                            </tr>
                    <?php endforeach; ?>
                    <?php } else{?>
                        <?php foreach ($results_by_author as $result) :?>

                            <tr>
                                <td><i class="fa fa-fw fa-file" class="lg"></i>
                                <div class="action_link">
                                    <a href="delete.php?id=<?php echo $result->id?>?class=Asessment&link=assessment.php">Delete</a>
                                    <a href="edit_result.php?id=<?php echo $result->id?>">Edit</a>
                                    <a> Download</a>
                                </div>
                                </td>
                                 <td><?php echo $result->filename?></td>
                                <td><?php echo $result->student_id?></td>
                                <td><?php echo $result->std_class_id?>
                                <td><?php echo $result->id?>
                                    <?php //$teacher = Teacher::find_by_id( $result->author);
                                    //echo $teacher->first_name. $teacher->last_name;?> 
                                </td>
                                <td><?php echo $result->teacher_id?>
                               
                                
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