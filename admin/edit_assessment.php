<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
    redirect("../index.php");
}
?>
<?php
if(empty($_GET['id'])){
    redirect("assessment.php");
}else{
    $teachers = Teacher::find_all();
    $assessment=Assessment::find_by_id($_GET['id']);
    if(isset($_POST['update'])){
       if($assessment){

        $assessment->title = $_POST['title'];
        $assessment->author = $_POST['author'];
        $assessment->deadline = $_POST['deadline'];
        $assessment->asse_class_id = $_POST['asse_class_id'];
          $assessment->save();
          redirect("assessment.php");
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
                        Assessment
                        <small></small>
                    </h1>
                    <form action="" method="post">
                    <div class="col-md-8">
                    <div class="form-group">

                            <label for="title">Title</label>
                            <input type="text" required name="title" class="form-control" value="<?php echo $assessment->title?>">
                        </div>
                        <div class="form-group">
                            <label for="author">Author name</label> 
                            <select name="author" class="form-control">

                            <option selected value="<?php echo $assessment->author?>"><?php echo $assessment->author?></option>
                            <?php foreach($teachers as $teacher):?>
                                <option value="<?php echo $teacher->id?>"><?php echo $teacher->first_name?> <?php echo $teacher->last_name?></option>
                                <?php endforeach?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="asse_class_id">For Class</label>
                            <select name="asse_class_id" required class="form-control">
                                <option selected value="<?php echo $assessment->asse_class_id?>"><?php echo $assessment->asse_class_id?></option>
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
                            <input type="text" name="deadline" required class="form-control" value="<?php echo $assessment->deadline?>" />
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