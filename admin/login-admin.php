<?php include('./configuration/database.php'); ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <?php
                if (isset($_SESSION['login-failed'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['login-failed'] . '</div>';
                    unset($_SESSION['login-failed']);
                }
                ?>
                <p class="text-danger font-weight-bold text-center">Please login to access Admin Panel.</p>
                <form action="" method="POST">
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" name="user-name" class="form-control form-control-lg" placeholder="Enter a username" />
                        <label class="form-label">UserName</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-3">
                        <input type="password" name="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" />
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>
                        </div>
                        <a href="#!" class="text-body">Forgot password?</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!" class="link-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
if (isset($_POST['submit'])) {
    $user_name = $_POST['user-name'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_admin WHERE username = '$user_name' AND password = '$password'";
    if ($connection != null) {
        try {
            $statement = $connection->prepare($sql);
            $statement->execute();
            // Check if the query was executed successfully
            if ($statement->rowCount() > 0) {
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                $_SESSION['login-success'] = 'Welcome, ' . $result['full_name'];
                header('location:' . SITE_URL . '/admin/index.php');
            } else {
                $_SESSION['login-failed'] = 'Login failed. Try again';
                header('location:' . SITE_URL . '/admin/login-admin.php');
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}


?>