<?php include("includes/header.php");
?>

<?php
if(!$session->is_signed_in()){
    redirect("../index.php");
}
?>


<?php
$message = "";
$students = Student::find_all();
if(isset($_POST['submit'])){

    $result = new Result();

    $result->filename = $_POST['filename'];
    $result->student_id = $_POST['student_id'];
    $result->std_class_id = $_POST['std_class_id'];
    $result->teacher_id = $_SESSION['user_id'];
    $result->set_file($_FILES['file_upload']);

    if($result->save()){
        $message = "user upload successfuly";
        redirect("result.php");
    }else{

        $message = join("<br>", $result->errors);
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
                        Upload Student
                        <small> Result</small>
                    </h1>

                    <div class="col-md-9">
                        <?php echo $message; ?>
                    <form action="" method="post" class="form-group" enctype="multipart/form-data">

                        <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label for="filename">File name</label>
                            <input type="text" required name="filename" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="student_id">Student name</label> 
                            <select name="student_id" class="form-control">
                            <option></option>
                            <?php foreach($students as $student):?>
                                <option value="<?php echo $student->id?>"><?php echo $student->first_name?> <?php echo $student->last_name?></option>
                                <?php endforeach?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="std_class_id">For Class</label>
                            <select name="std_class_id" required class="form-control">
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