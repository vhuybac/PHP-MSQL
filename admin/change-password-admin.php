<?php include('./partials/menu.php') ?>
<?php
//get id clicked
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<h3>Change Password Admin</h3>
<form action="" method="post">
    <div class="mb-3">
        <label for="old_password" class="form-label">Current Password</label>
        <input type="password" name="old_password" class="form-control" id="old_password">
    </div>
    <div class="mb-3">
        <label for="new_password" class="form-label">New Password</label>
        <input type="password" name="new_password" class="form-control" id="new_password">
    </div>
    <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" id="confirm_password">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Update</button>
</form>

<?php include('./partials/footer.php') ?>
<?php
//check whether the submit button is clicked
if (isset($_POST['submit'])) {
    //1.Get all Data from form
    $old_password = md5($_POST['old_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //2.sql query check  whether the user with current password and current ID Exists or not
    $sql = "SELECT * FROM tbl_admin WHERE id =:id AND password = :old_password";
    //execute the Query
    if ($connection != null) {
        try {
            $statement = $connection->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->bindParam(':old_password', $old_password, PDO::PARAM_STR);
            $statement->execute();
            // Check if the query was executed successfully
            if ($statement->rowCount() > 0) {
                if ($new_password === $confirm_password) {
                    $sql = "UPDATE tbl_admin SET password = :new_password WHERE id = :id";
                    $statement = $connection->prepare($sql);
                    $statement->bindParam(':id', $id, PDO::PARAM_INT);
                    $statement->bindParam(':new_password', $new_password, PDO::PARAM_STR);
                    $statement->execute();
                    $_SESSION['update_password'] = 'Update password admin successfully';
                    header('location:' . SITE_URL . '/admin/manage-admin.php');
                }
            } else {
                $_SESSION['user-not-found'] = 'User not found';
                header('location:' . SITE_URL . '/admin/manage-admin.php');
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>