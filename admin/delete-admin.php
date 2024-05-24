<?php
include('./configuration/database.php');
//1. Get to the ID at admin to be deleted
$id = $_GET['id'];
//2.Create SQL Query to delete admin from
$sql = "DELETE FROM tbl_admin WHERE id = :id";
//3. Execute SQL
if ($connection != null) {
    try {
        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $_SESSION['delete'] = 'Delete admin successfully';
        header("location:" . SITE_URL . "admin/manage-admin.php");
    } catch (PDOException $e) {
        $_SESSION['delete'] = 'Delete admin failed';
        header("location:" . SITE_URL . "admin/manage-admin.php");
    }
}
//4. Redirect to admin with message(succeess/error)
