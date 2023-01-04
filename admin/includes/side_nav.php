
<?php $user_role = $_SESSION['role'];?>

<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        
    <li>
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>

    <?php if($user_role == "admin"){ ?>
       
        <li>
             <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                  <li>
                    <a href="admin.php">Administrators</a>
                  </li>
                   <li>
                      <a href="teacher.php">Teachers</a>
                  </li>
                  <li>
                      <a href="student.php">Students</a>
                  </li>
                  <li>
                      <a href="guidian.php">Parents</a>
                  </li>
               </ul>
      </li>
        <li>
            <a href="result.php"><i class="fa fa-fw fa-bar-chart-o"></i> Result</a>
        </li> 
      
        <li>
            <a href="assessment.php"><i class="fa fa-fw fa-edit"></i> Assessement</a>
        </li>
        <?php  } elseif($user_role == "teacher" ){  ?>
            <li>
                 <a href="student.php"><i class="fa fa-fw fa-bar-chart-o"></i> Students</a>
            </li>
            <li>
            <a href="assessment.php"><i class="fa fa-fw fa-edit"></i> Assessement</a>
        </li>
        <li>
            <a href="result.php"><i class="fa fa-fw fa-bar-chart-o"></i> Result</a>
        </li> 

       
       <?php } elseif($user_role == "student" ){  ?>

            <li>
            <a href="display_assessment.php"><i class="fa fa-fw fa-edit"></i> Assessement</a>
        </li>
        <li>
            <a href="display_result.php"><i class="fa fa-fw fa-bar-chart-o"></i> Result</a>
        </li> 
      

       <?php } ?>

         <!-- <li>
  
            <a href="upload.php"><i class="fa fa-fw fa-table"></i> upload</a>
        </li> -->
        <!-- <li>
            <a href="photos.php"><i class="fa fa-fw fa-table"></i> photos</a>
        </li> -->
    </ul>
</div>
