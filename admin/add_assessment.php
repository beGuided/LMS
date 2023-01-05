<?php include("includes/header.php");
?>

<?php
if(!$session->is_signed_in()){
    redirect("../index.php");
}
?>
<?php
$user_role = $_SESSION['role'];
 if($user_role != "admin" && $user_role != "teacher" ){ 
    redirect('./index.php');  
}
$message = "";
$teachers = Teacher::find_all();
if(isset($_POST['submit'])){

    $assessment = new Assessment();

    $assessment->title = $_POST['title'];
    $assessment->author = $_POST['author'];
    $assessment->deadline = $_POST['deadline'];
    $assessment->asse_class_id = $_POST['asse_class_id'];
    $assessment->set_file($_FILES['file_upload']);

    if($assessment->save()){
        $message = "user upload successfuly";
    }else{

        $message = join("<br>", $assessment->errors);
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
                        Upload
                        <small>Assessment</small>
                    </h1>

                    <div class="col-md-9">
                        <?php echo $message; ?>
                    <form action="" method="post" class="form-group" enctype="multipart/form-data">

                        <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" required name="title" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="author">Author name</label> 
                            
                            <select name="author" class="form-control">
                            <option></option>
                            <?php foreach($teachers as $teacher):?>
                                <option value="<?php echo $teacher->id?>"><?php echo $teacher->first_name?> <?php echo $teacher->last_name?></option>
                                <?php endforeach?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="asse_class_id">For Class</label>
                            <select name="asse_class_id" required class="form-control">
                                <option></option>
                                <option value="JSS1">JSS1</option>
                                <option value="JSS2">JSS2</option>
                                <option value="JSS3">JSS3</option>
                                <option value="SS1">SS1</option>
                                <option value="SS2">SS2</option>
                                <option value="SS3">SS3</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="text" name="deadline" required class="form-control" >
                        </div>


                        <div class="form-group">
                            <label for="file_upload">Choose File:</label>
                            <input type="file" name="file_upload">
                        </div>

                        <button class="btn btn-primary" type="submit" name="submit"> Upload </button>
                    </form>
                    </div>



                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>