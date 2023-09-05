<?php
ob_start();
session_start();
$pagetitle = 'Contact us';
include_once 'admin/connect.php';
include_once 'includes/function.php';
include_once 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stmt = $con->prepare("INSERT INTO
                    contactus(id_customer, message)
                    VALUES(:id_customer, :message)");
    $stmt->execute(array(
        'id_customer'   => $_SESSION['ID_customer'],
        'message'       => $_POST['Review']
    ));
    $msg = '<div>Sent successfully</div>';
}
?>

<h2>Contact us</h2>
<p>Feel Free To Contact us With Your Suggestion</p>
<?php if (isset($msg)) echo $msg; ?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="hidden" name="id">
    <textarea name="Review" rows="10" style="width: 50%;"></textarea>
    <br><br>
    <input type="submit" value="Sent">
</form>

<br><br>

<?php
include "includes/footer.php";
ob_flush();
?>