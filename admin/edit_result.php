<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
    redirect("../index.php");
}
?>
<?php
if(empty($_GET['id'])){
    redirect("result.php");
}else{
    $students = Student::find_all();
    $result=Result::find_by_id($_GET['id']);
    if(isset($_POST['update'])){
       if($result){
    
        $result->filename = $_POST['filename'];
        $result->student_id = $_POST['student_id'];
        $result->std_class_id = $_POST['std_class_id'];
        $result->set_file($_FILES['file_upload']);

          $result->save();
          redirect("result.php");
       }
    }



}

//$user = assessment::find_all();

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
                        Edit Result
                        <small></small>
                    </h1>
                    <form action="" method="post">
                    <div class="col-md-8">
                    <div class="form-group">

                            <label for="title">File name</label>
                            <input type="text" required name="filename" class="form-control" value="<?php echo $result->filename?>">
                        </div>
                        <div class="form-group">
                            <label for="student_id">Student name</label> 
                            <select name="student_id" class="form-control">

                            <option selected value="<?php echo $result->student_id?>"><?php echo $result->student_id?></option>
                            <?php foreach($students as $student):?>
                                <option value="<?php echo $student->id?>"><?php echo $student->first_name?> <?php echo $student->last_name?></option>
                                <?php endforeach?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="std_class_id">For Class</label>
                            <select name="std_class_id" required class="form-control">
                                <option selected value="<?php echo $result->std_class_id?>"><?php echo $result->std_class_id?></option>
                                <option value="JSS1">JSS1</option>
                                <option value="JSS2">JSS2</option>
                                <option value="JSS3">JSS3</option>
                                <option value="SS1">SS1</option>
                                <option value="SS2">SS2</option>
                                <option value="SS3">SS3</option>
                            </select>
                        </div>


                        <div class="info-box-footer clearfix">
                                    
                                    <div class="info-box-update pull-right ">
                                        <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                    </div>
                                </div>
                    </div> 


                   

                    </form>



                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>