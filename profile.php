<?php
ob_start();
session_start();
include_once 'Admin/connect.php';
include_once 'includes/function.php';
include_once 'includes/header.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['password'] != "")
        $password = sha1($_POST['password']);
    else
        $password = $_POST['oldpass'];

    $stmt = $con->prepare("UPDATE customer SET name = ?, email = ?, pass = ?, mobile = ? WHERE id = ?");
    $stmt->execute(array(
        $_POST['name'],
        $_POST['email'],
        $password,
        $_POST['mobile'],
        $_SESSION['ID_customer']
    ));

    $msg =  '<div>Update successfully</div>';
}
$getuser = $con->prepare("SELECT * FROM customer WHERE id = ?");
$getuser->execute(array($_SESSION['ID_customer']));
$info = $getuser->fetch();

?>


    <h2>Profile</h2>
    <?php if (isset($msg)) echo $msg; ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" name="oldpass" value="<?php echo $info['pass'] ?>">
        <p>
            <label>User Name:
                <input name="name" type="text" size="25" value="<?php echo $info['name'] ?>">
            </label>
        </p>

        <p>
            <label>E-mail:
                <input name="email" type="text" size="25" value="<?php echo $info['email'] ?>">
            </label>
        </p>

        <p>
            <label>Mobile:
                <input name="mobile" type="text" size="25" value="<?php echo $info['mobile'] ?>">
            </label>
        </p>

        <p>
            <label>Password:
                <input name="password" type="password" size="25">
            </label>
        </p>

        <input type="submit" name="submit" value="sign up">
    </form>
    <p>Already have an account? <a href="LogIn.html">Login</a></p>
    <br>
</body>

</html>

<?php
ob_flush();
?>