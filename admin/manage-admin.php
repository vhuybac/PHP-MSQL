<?php include('./partials/menu.php'); ?>
<?php
//execute sql query
$sql = 'SELECT id, full_name,username FROM tbl_admin';
if ($connection != null) {
    try {
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $sn = 1;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>

<!--Main Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manege Admin</h1>
        <?php
        if (isset($_SESSION['add'])) {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION['add'] . '</div>';
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['delete'])) {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION['delete'] . '</div>';
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['update'])) {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION['update'] . '</div>';
            unset($_SESSION['update']);
        }
        if (isset($_SESSION['update_password'])) {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION['update_password'] . '</div>';
            unset($_SESSION['update_password']);
        }
        if(isset($_SESSION['user-not-found'])){
            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['user-not-found'] . '</div>';
            unset($_SESSION['user-not-found']);
        }
        ?>




        <a href="add-admin.php" class="btn btn-primary">Add Admin</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">UserName</th>
                    <th scope="col">FullName</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider ">
                <?php foreach ($result as $arr) : ?>
                    <tr>
                        <th scope="row"><?php echo $sn++; ?>.</th>
                        <td> <?= $arr['full_name']; ?></td>
                        <td> <?= $arr['username']; ?></td>
                        <td>
                            <a href="<?php echo SITE_URL; ?>admin/change-password-admin.php?id=<?php echo $arr['id']; ?>" class="btn btn-secondary btn-sm">Change Password</a>
                            <a href="<?php echo SITE_URL; ?>admin/update-admin.php?id=<?php echo $arr['id']; ?>" class="btn btn-info btn-sm">Update Admin</a>
                            <a href="<?php echo SITE_URL; ?>admin/delete-admin.php?id=<?php echo $arr['id']; ?>" class="btn btn-danger btn-sm">Delete Admin</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</div>
<?php include('./partials/footer.php'); ?>