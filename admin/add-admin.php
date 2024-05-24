<?php include('./partials/menu.php') ?>
<h3>Add Admin</h3>
<?php if (isset($_SESSION['add'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['add'] . '</div>';
    unset($_SESSION['add']);
} ?>
<form action="" method="post">
    <div class="mb-3">
        <label for="inputName" class="form-label">FullName</label>
        <input type="text" name="full_name" class="form-control" id="inputName" aria-describedby="emailHelp">

    </div>
    <div class="mb-3">
        <label for="inputUserName" class="form-label">User Name</label>
        <input type="text" name="username" class="form-control" id="inputUserName">
    </div>
    <div class="mb-3">
        <label class="form-label" for="inputPassword">Password</label>
        <input type="password" name="password" class="form-control" id="inputPassword">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>


<?php include('./partials/footer.php') ?>

<?php
//Process the value from form and save it in database

if (isset($_POST['submit'])) {
    //Get the value from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //SQL query to save the data in database

    $sql = "INSERT INTO tbl_admin SET 
        full_name='$full_name',
        username='$username', 
        password='$password'
        ";
    if ($connection != null) {
        try {
            $statement = $connection->prepare($sql);
            $statement->execute();
            // Create session variable to display message
            $_SESSION['add'] = 'Admin added successfully';
            //redirect page manage admin
            header('location:' . SITE_URL . 'admin/manage-admin.php');
        } catch (PDOException $e) {
            $_SESSION['add'] = 'Failed to add admin';
            //redirect page add admin
            header('location:' . SITE_URL . 'admin/add-admin.php');
        }
    }
}
?>