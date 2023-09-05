<?php
ob_start();
session_start();
$pagetitle = 'Manage Salon';
include_once 'connect.php';
include_once 'includes/function.php';
include_once 'includes/header.php';
if (isset($_SESSION['ID'])) {
    if (isset($_GET['id'])) {
        $stmt = $con->prepare("DELETE FROM salon WHERE id = :zid");
        $stmt->bindParam(":zid", $_GET['id']);
        $stmt->execute();
        $msg = '<div>Delete successfully</div><br>';
    }

    $stmt = $con->prepare("SELECT * FROM salon ");
    $stmt->execute();
    $rows = $stmt->fetchAll();

?>
    <br><br>
    <h2><strong>Manage Salon</strong></h2>
    <br><br>

    <?php if (isset($msg)) echo $msg; ?>
    <div>
        <a href="add_salon.php">( + ) Add Place</a>
    </div>
    <br>

    <table align="center" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>location</th>
                <th>mobile</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) { ?>
                <tr>
                    <td><?php echo $r['id']; ?></td>
                    <td><?php echo $r['name']; ?></td>
                    <td><?php echo $r['location']; ?></td>
                    <td><?php echo $r['mobile']; ?></td>
                    <td>
                        <a href="edit_salon.php?id=<?php echo $r['id']; ?>">Edit || </a>
                        <a href="mng_salon.php?id=<?php echo $r['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br>
    <br><br>

<?php
    include "includes/footer.php";
} else {
    header('location: index.php');
    exit();
}
ob_flush();
?>