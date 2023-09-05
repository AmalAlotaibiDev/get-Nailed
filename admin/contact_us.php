<?php
ob_start();
session_start();
$pagetitle = 'Contact Us';
include_once 'connect.php';
include_once 'includes/function.php';
include_once 'includes/header.php';
if (isset($_SESSION['ID'])) {
    $stmt = $con->prepare("SELECT * FROM contactus INNER JOIN customer ON customer.id = contactus.id_customer");
    $stmt->execute();
    $rows = $stmt->fetchAll();
?>
    <br><br>
    <h2><strong>Contact Us Masseges</strong></h2>
    <br><br>

    <table align="center" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Customer Mobile</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) { ?>
                <tr>
                    <td><?php echo $r['id']; ?></td>
                    <td><?php echo $r['name']; ?></td>
                    <td><?php echo $r['mobile']; ?></td>
                    <td><?php echo $r['message']; ?></td>
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