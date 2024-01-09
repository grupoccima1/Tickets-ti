
<?php

session_start();

session_destroy();

    echo "<script> window.location='./../index.php ' </script>";
//header("location: ../index.php");
//header("location: ../index.php");
exit();

?>