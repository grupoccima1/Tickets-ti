<?php
require_once("../../config/conexion.php");
session_destroy();
header("Location:"."https://ti.grupoccima.com/"."index.php");
exit();
?>