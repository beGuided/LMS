<?php ob_start();?>
<?php require_once("includes/init.php");?>


<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
}
?>


                <?php

                if (isset($_GET['source'])) {

                    $source = $_GET['source'];
                } else {
                    $source = "";
                }
                switch ($source) {

                        // blog post channel start

                    case 'admin':
                        include "./admin.php";
                        break;

                    case 'parent':
                        include "../parent.php";
                        break;

                      case 'teacher':
                        include "../teacher.php";
                        break;

                    case 'student':
                       include "../student.php";
                      break;

                    default:
                        include "../index.php";
                        break;
                }


                ?>

        

<?php include("footer.php"); ?>