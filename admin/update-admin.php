<?php
include('./partials/menu.php'); ?>
<?php
//get id clicked
$id = $_GET['id'];
//sql query
$sql = 'SELECT * FROM tbl_admin WHERE id = :id';
//execute query
if ($connection != null) {
    try {
        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        // Check if the query was executed successfully
        if ($statement->rowCount() > 0) {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $full_name = $result['full_name'];
            $username = $result['username'];
        } else {
            echo "Không tìm thấy kết quả nào.";
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
<h3>Update Admin</h3>
<form action="" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">User Name</label>
        <input type="text" name="username" class="form-control" id="username" value="<?php echo $username; ?>">
    </div>
    <div class="mb-3">
        <label for="full-name" class="form-label">FullName</label>
        <input type="text" name="full_name" class="form-control" id="full-name" value="<?php echo $full_name; ?>">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Update</button>
</form>

<?php include('./partials/footer.php'); ?>
<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $full_name = $_POST['full_name'];
        $sql = "UPDATE tbl_admin SET full_name = :full_name, username = :username WHERE id = :id";
        if ($connection != null) {
        }try {
                $statement = $connection->prepare($sql);
                $statement->bindParam(':full_name', $full_name, PDO::PARAM_STR);
                $statement->bindParam(':username', $username, PDO::PARAM_STR);
                $statement->bindParam(':id', $id, PDO::PARAM_INT);
                $statement->execute();
                $_SESSION['update'] = 'Update admin successfully';
                header("location:" . SITE_URL . "admin/manage-admin.php");
            } catch (PDOException $e) {
                $_SESSION['update'] = 'Update admin failed';
                header("location:" . SITE_URL . "admin/manage-admin.php");
            }
    }
?>