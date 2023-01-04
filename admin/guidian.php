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

$Parents = guidian::find_all();
//   foreach ($parent as $Admin){
//     echo $Admin->id;
//   }
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
                        Parent Informations
                        <small>Manage all Parent</small>
                    </h1>

                    <a href="add_guidian.php" class="btn btn-primary"> Add parent</a>

                    <div class="col-md-12">
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                            </thead>
                            <tbody>
                       
                               
                           <?php foreach ($Parents as $parent):?>

                                <tr>
                                <td><?php echo $parent->id?>
                                  <td><img width="62px" src="<?php  echo $parent->image_path_and_placeholder();?>" height= "62px" alt="image"></td>

                                     <td><?php echo $parent->first_name?>
                                        <div class="actions_link">
                                            <a href="delete.php?id=<?php echo $parent->id?>&class=Parent&link=parent.php">Delete</a>
                                            <a href="edit_guidian.php?id=<?php echo $parent->id?>">Edit</a>
                                            <!-- <a href="#">View</a> -->
                                        </div>
                                    </td>
                                 <td><?php echo $parent->last_name?></td>
                                 <td><?php echo $parent->email?></td>
                                 <td><?php echo $parent->user_role?></td>
                                    
                                  
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