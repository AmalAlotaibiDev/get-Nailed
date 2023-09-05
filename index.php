<?php
ob_start();
session_start();
$pagetitle = 'Get Nailed';
include_once 'admin/connect.php';
include_once 'includes/function.php';
include_once 'includes/header.php';

$stmt = $con->prepare("SELECT * FROM salon");
$stmt->execute();
$rows = $stmt->fetchAll();
?>

<div class="Salons">
    <div class="container">
        <?php foreach ($rows as $r) { ?>
            <div class="feat">
                <a href="salon.php?id=<?php echo $r['id']; ?>">
                    <img src="admin/uploads/<?php echo $r['logo']; ?>" width="180" height="180" alt="<?php echo $r['name']; ?>">
                </a>
                <div style="text-align: left; margin-left: 25px;">
                    <h3><?php echo $r['name']; ?></h3>
                    <p>Location: <?php echo $r['location']; ?></p>
                    <a href="salon.php?id=<?php echo $r['id']; ?>">Visit</a>
                </div>

            </div>
        <?php } ?>
    </div>
</div>

<?php
include "includes/footer.php";
ob_flush();
?>