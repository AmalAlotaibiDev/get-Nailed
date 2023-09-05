<?php
ob_start();
session_start();
include_once 'Admin/connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stmt = $con->prepare("INSERT INTO
                            customer(name, email, pass, mobile)
                            VALUES(:zname, :zemail, :zpass, :mobile)");
    $stmt->execute(array(
        'zname' 	=> $_POST['name'],
        'zemail' 	=> $_POST['email'],
        'zpass' 	=> sha1($_POST['pass']),
        'mobile' 	=> $_POST['mobile']
    ));
    header('Location: Login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
    <br>
    <p>
        <a href="HomePage.html">
            <img src="images/projectLogo.jpg" class="logo" width="150" height="150">
        </a>
    </p>
    <h3>Join our website</h3>
    <p>Sign up here</p>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <p>
            <label>User Name:
                <input name="name" type="text" size="25">
            </label>
        </p>

        <p>
            <label>E-mail:
                <input name="email" type="text" size="25">
            </label>
        </p>

        <p>
            <label>Mobile:
                <input name="mobile" type="text" size="25">
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