<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
    redirect("login.php");
}
?>
<?php

$Administrators = Admin::find_all();
//   foreach ($Administrators as $Admin){
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
                        Admin
                        <small>Subheading</small>
                    </h1>

                    <a href="add_Administrator.php" class="btn btn-primary"> Add Administrator</a>

                    <div class="col-md-12">
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>Admin ID</th>
                                <th> Photo</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th> email</th>
                            </tr>
                            </thead>
                            <tbody>
                       
                               
                           <?php foreach ($Administrators as $Admin):?>

                                <tr>
                                <td><?php echo $Admin->id?>
                                  <!-- <td><img width="62px" src="<?php  //echo $Admin>image_path_and_placeholder();?>" height= "62px" alt="image"></td> -->

                                     <td><?php echo $Admin->first_name?>
                                        <div class="actions_link">
                                            <a href="delete.php?id=<?php echo $Admin->id?>">Delete</a>
                                            <a href="edit_admin.php?id=<?php echo $Admin->id?>">Edit</a>
                                            <!-- <a href="#">View</a> -->
                                        </div>
                                    </td>
                                 <td><?php echo $Admin->last_name?></td>
                                 <td><?php echo $Admin->email?></td>
                                    
                                  
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