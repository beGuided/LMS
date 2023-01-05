<div class="container-fluid">
    <?php
    $first_name = ucfirst($_SESSION['firstname']);
    $last_name = ucfirst($_SESSION['lastname']);
    $role = ucfirst($_SESSION['role']);
    // $class_id = $_SESSION['class_id'];
    $id = $_SESSION['user_id'];

    ?>
    <?php $user = $role::find_by_id($id); ?>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Wellcome
                <small> <?php echo " $first_name $last_name " ?> </small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="text-left">
        <h3>Profile Information</h3>
    </div>
    <?php $user = $role::find_by_id($id); ?>
    <div class="row">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td>
                        <div class="col-lg-6">
                            <img  src="<?php  echo $user->image_path_and_placeholder(); ?>" width="200px" height="200px" alt="image">
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-6">
                            <h3><?php echo "$first_name  $last_name " ?></h3>
                            <h4><?php echo  $user->email ?></h4>
                            <h4><?php echo $role ?></h4>
                        </div>
                    </td>

                </tr>

            </tbody>
        </table>


    </div>

</div>


