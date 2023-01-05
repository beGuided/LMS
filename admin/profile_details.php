<?php include("includes/header.php"); ?>
<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
}
?>
    <?php
    // $first_name = ucfirst($_SESSION['firstname']);
    // $last_name =ucfirst($_SESSION['lastname']);
    $role = ucfirst($_SESSION['role']);
    $id = $_SESSION['user_id'];

    ?>
    <?php  $user = $role::find_by_id($id); ?> 

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php include("includes/top_nav.php"); ?>

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
                    Profile
                    <small>Details</small>
                </h1>

                <div class="container-fluid">
                   

                    <!-- Page Heading -->
                    
                    <!-- /.row -->
                    <div class="text-left">
                        <h3>Profile Information</h3>
                    </div>
                    <?php if ($role == "Guidian") {  
                          $students = Student::student_by_parent_id($id);
                        ?>
                         <?php foreach($students as $student):?>
                               
                        <div class="row">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td> 
                                                <div class="col-lg-6">
                                                    <img width="200px" src="<?php echo $student->image_path_and_placeholder(); ?>" height="200px" alt="image">
                                                </div>
                                            </td>
                                            <td>
                                            <div class="col-lg-6">
                                                <h3><?php echo "$student->first_name  $student->last_name " ?></h3>
                                                <h4><?php echo  $student->email ?></h4>
                                                <h4><?php echo $student->user_role ?></h4>
                                            </div>
                                            </td>
                                           
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            
                        </div>
                        <?php endforeach?>
                        <?php } ?>
                        
                    <?php if ($role == "Student") {
                        $parent = Guidian::parent_by_std_id($user->std_parent_id);
                    ?>

                        <div class="row">

                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <td> 
                                        <div class="col-lg-6">
                                            <img width="200px" src="<?php echo $parent->image_path_and_placeholder(); ?>" height="200px" alt="image">
                                        </div>
                                    </td>
                                    <td>
                                    <div class="col-lg-6">
                                        <h3><?php echo "$parent->first_name  $parent->last_name " ?></h3>
                                        <h3><?php echo  $parent->email ?></h3>
                                        <h4><?php echo $parent->user_role ?></h4>
                                     </div>
                                    </td>
                                    
                                </tr>
                                
                            </tbody>
                        </table>
                           
                          
                        </div>

                    <?php } ?>
                    


                </div>


            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>