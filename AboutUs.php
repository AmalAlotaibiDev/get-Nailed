<?php
ob_start();
session_start();
$pagetitle = 'About us';
include_once 'admin/connect.php';
include_once 'includes/function.php';
include_once 'includes/header.php';
?>
<br>
<h1>About us</h1>

<p>
    We are here to guide the girls to get pampered by providing them many options of spa's where they can relax and get their nails done.
</p>
<br><br><br>
<?php
include "includes/footer.php";
ob_flush();
?>