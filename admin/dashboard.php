<?php
ob_start();
session_start();
$pagetitle = 'Get Nailed';
include_once 'connect.php';
include_once 'includes/function.php';
include_once 'includes/header.php';
?>



<?php
include "includes/footer.php";
ob_flush();
?>