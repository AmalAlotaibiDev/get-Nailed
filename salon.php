<?php
ob_start();
session_start();
$pagetitle = 'Get Nailed';
include_once 'admin/connect.php';
include_once 'includes/function.php';
include_once 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stmt = $con->prepare("INSERT INTO
                    review(id_customer, id_salon, comment)
                    VALUES(:id_customer, :id_salon, :comment)");
    $stmt->execute(array(
        'id_customer'   => $_SESSION['ID_customer'],
        'id_salon'      => $_POST['id'],
        'comment'       => $_POST['Review']
    ));
    $msg = '<div>Sent successfully</div>';

    $getuser = $con->prepare("SELECT * FROM salon WHERE id = ?");
    $getuser->execute(array($_POST['id']));
    $info = $getuser->fetch();

    $stmt = $con->prepare("SELECT * FROM review inner join customer on customer.id = review.id_customer where id_salon=?");
    $stmt->execute(array($_POST['id']));
    $rows = $stmt->fetchAll();
} else if (isset($_GET['id'])) {
    $stmt = $con->prepare("SELECT * FROM review inner join customer on customer.id = review.id_customer where id_salon=?");
    $stmt->execute(array($_GET['id']));
    $rows = $stmt->fetchAll();

    $getuser = $con->prepare("SELECT * FROM salon WHERE id = ?");
    $getuser->execute(array($_GET['id']));
    $info = $getuser->fetch();
} else {
    echo '<br><div>No Salon To Show !!!</div><br>';
    exit();
}
?>

<div class="Salons">
    <div class="feat">
        <img src="admin/uploads/<?php echo $info['logo']; ?>" width="180" height="180" alt="<?php echo $info['name']; ?>">
        <div style="text-align: left; margin-left: 25px;">
            <h3>Name: <?php echo $info['name']; ?></h3>
            <p>Location: <?php echo $info['location']; ?></p>
            <p>Mobile: <?php echo $info['mobile']; ?></p>
            <p>Description: <?php echo $info['description']; ?></p>

            <br>
            <hr>
            <hr>
            <br>

            <h2>Reviews:</h2>
            <?php foreach ($rows as $r) { ?>
                <div class="feat" style="padding: 0;">
                    <div style="text-align: left; margin-left: 25px;">
                        <h4>Name: <?php echo $r['name']; ?></h4>
                        <p>Review: <?php echo $r['comment']; ?></p>
                    </div>
                </div>
            <?php } ?>

            <hr>
            <?php if (isset($msg)) echo $msg; ?>
            <br>

            <?php if (isset($_SESSION['ID_customer'])) { ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $info['id'] ?>">
                    <textarea name="Review" rows="10" style="width: 50%;"></textarea>

                    <br><br>
                    <input type="submit" value="Sent">
                </form>
            <?php } else { ?>
                <a href="LogIn.php">Login To Review</a>
            <?php } ?>
            <br>
        </div>

    </div>

</div>
</div>

<?php
include "includes/footer.php";
ob_flush();
?>