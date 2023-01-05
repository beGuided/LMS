<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
    redirect("../index.php");
}
?>

<?php
 $user_role= $_SESSION['role'];
 $user_id= $_SESSION['user_id'];

 if($user_role != "student" && $user_role != "guidian" ){ 
    redirect('./index.php');  
}
 $id = Student::find_by_id($user_id);
 if($id){
$assessments_by_class_id = Assessment::assessment_by_class_id($id->std_class_id);
// $assessments_by_class_id = Assessment::assessment_by_class_id($id->std_class_id);

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
                    View Assessment
                        <small></small>
                    </h1>

                    <div class="col-md-12">
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                 <th>ID</th>
                                <th>File</th>
                                <th>Title</th>
                                <th>Author id</th>
                                <th>For class</th>
                                <th>Deadline</th>
                                
                               
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($user_role == "student"){?> 
                            <?php foreach ($assessments_by_class_id as $assesment) :?>

                            <tr>
                             <td><?php echo $assesment->id?></td>
                                <td><i class="fa fa-fw fa-file" class="lg"></i>
                                <div class="action_link">
                                    <!-- <a href="delete.php?id=<?php echo $assesment->id?>?class=Asessment&link=assessment.php">Delete</a> -->
                                    <!-- <a href="edit_assessment.php?id=<?php // echo $assesment->id?>">Edit</a> -->
                                    <a href="<?php  echo $assesment->picture_path();?>" download> Download</a>
                                </div>
                                </td>
                                 <td><?php echo $assesment->title?></td>                         
                                <td><?php echo $assesment->author?>
                                    <?php //$teacher = Teacher::find_by_id( $assesment->author);
                                    //echo $teacher->first_name. $teacher->last_name;?> 
                                </td>
                                <td><?php echo $assesment->asse_class_id?></td>
                                <td><?php echo $assesment->deadline?></td>
                                
                            </tr>

                    <?php endforeach; ?>
                    <?php } else{?>
                     
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