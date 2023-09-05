<?php
ob_start();
session_start();
$pagetitle = 'Add New Salon';
include_once 'connect.php';
include_once 'includes/function.php';
include_once 'includes/header.php';

if (isset($_SESSION['ID'])) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $imgname = $_FILES['Logo']['name'];
        $imgtemp = $_FILES['Logo']['tmp_name'];
        $img = rand(0, 1000) . '_' . $imgname;
        move_uploaded_file($imgtemp, "uploads\\" . $img);

        $stmt = $con->prepare("INSERT INTO
                    salon(name, description, logo , location, mobile)
                    VALUES(:name, :description, :logo, :location, :mobile)");
        $stmt->execute(array(
            'name'          => $_POST['Name'],
            'description'   => $_POST['Description'],
            'logo'          => $img,
            'location'      => $_POST['Location'],
            'mobile'        => $_POST['Mobile']
        ));

        $msg =  '<div>Saved successfully</div>';
    }
?>

<p>
    <strong>Add New Salon</strong>
    <br><br>
    
    <?php if (isset($msg)) echo $msg; ?>
    <br><br>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <label>Name:
            <input name="Name" type="text" size="25">
        </label>
        <br><br>
        <label>Location:
            <input name="Location" type="text" size="25">
        </label>
        <br><br>
        <label>Mobile:
            <input name="Mobile" type="text" size="25">
        </label>
        <br><br>
        <label>Description:
            <textarea name="Description" type="text" size="25" rows="10"></textarea>
        </label>
        <br><br>
        <label>Logo:
            <input name="Logo" type="file" size="25">
        </label>
        <br><br>
        <input name="add" type="submit" value="Save">
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