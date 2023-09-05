<?php
ob_start();
session_start();
$pagetitle = 'Edit Salon';
include_once 'connect.php';
include_once 'includes/function.php';
include_once 'includes/header.php';

if (isset($_SESSION['ID'])) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_FILES['Logo']['name'] != "") {
            $img = $_POST['oldimg'];
            unlink("uploads/$img");

            $imgname = $_FILES['Logo']['name'];
            $imgtemp = $_FILES['Logo']['tmp_name'];

            $img = rand(0, 1000) . '_' . $imgname;
            move_uploaded_file($imgtemp, "uploads\\" . $img);
        } else {
            $img = $_POST['oldimg'];
        }

        $stmt = $con->prepare("UPDATE salon SET name = ?, description = ?, logo = ?, location = ?, mobile = ? WHERE id = ?");
        $stmt->execute(array(
            $_POST['Name'],
            $_POST['Description'],
            $img,
            $_POST['Location'],
            $_POST['Mobile'],
            $_POST['id']
        ));

        $getuser = $con->prepare("SELECT * FROM salon WHERE id = ?");
        $getuser->execute(array($_POST['id']));
        $info = $getuser->fetch();
        $id = $_POST['id'];
        $msg =  '<div>Update successfully</div>';
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $getuser = $con->prepare("SELECT * FROM salon WHERE id = ?");
        $getuser->execute(array($_GET['id']));
        $info = $getuser->fetch();
    }
?>

    <p>
        <strong>Add New Salon</strong>
        <br><br>

        <?php if (isset($msg)) echo $msg; ?>
        <br><br>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="oldimg" value="<?php echo $info['logo'] ?>">
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <label>Name:
            <input name="Name" type="text" size="25" value="<?php echo $info['name'] ?>">
        </label>
        <br><br>
        <label>Location:
            <input name="Location" type="text" size="25" value="<?php echo $info['location'] ?>">
        </label>
        <br><br>
        <label>Mobile:
            <input name="Mobile" type="text" size="25" value="<?php echo $info['mobile'] ?>">
        </label>
        <br><br>
        <label>Description:
            <textarea name="Description" type="text" size="25" rows="10">value="<?php echo $info['description'] ?>"</textarea>
        </label>
        <br><br>
        <label>Logo:
            <input name="Logo" type="file" size="25">
        </label>
        <br><br>
        <input name="add" type="submit" value="Edit">
    </form>
    <br><br>
    </p>

<?php
    include "includes/footer.php";
} else {
    header('location: index.php');
    exit();
}
ob_flush();
?>