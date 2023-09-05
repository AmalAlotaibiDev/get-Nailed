<?php
session_start();
if (isset($_SESSION['ID'])) {
    header('Location: index.php');
}
include 'admin/connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['pass'];
    $hashedpass = sha1($password);

    $stmt = $con->prepare(" SELECT id, email, pass, name
								FROM customer 
								WHERE email = ? AND pass = ?
								LIMIT 1 ");

    $stmt->execute(array($email, $hashedpass));
    $row = $stmt->fetch();
    $cont = $stmt->rowCount();

    if ($cont > 0) {
        $_SESSION['USERNAMECustomer'] = $row['name'];
        $_SESSION['ID_customer'] = $row['id'];
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login Customer</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <h3>Login Customer</h3>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <p>
            <label>E-mail:
                <input name="email" type="text" size="25">
            </label>
        </p>
        <p>
            <label>password:
                <input name="pass" type="password" size="25">
            </label>
        </p>
        <input type="submit" name="submit" value="Login">
    </form>
</body>

</html>
<?php
ob_flush();
?>