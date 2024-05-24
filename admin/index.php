<?php
include('./partials/menu.php');
include('check-login.php');
?>


<!--Main Section Starts -->
<div class="main-content">
    <h1>DashBoard</h1>
    <?php
    if (isset($_SESSION['login-success'])) {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['login-success'] . '</div>';
        unset($_SESSION['login-success']);
    }

    ?>
    <div class="row">
        <div class="col p-3 text-center box">
            <h2>5</h2>
            </br>
            <p>Categories</p>
        </div>
        <div class="col p-3 text-center box">
            <h2>5</h2>
            </br>
            <p>Categories</p>
        </div>
        <div class="col p-3 text-center box">
            <h2>5</h2>
            </br>
            <p>Categories</p>
        </div>
        <div class="col p-3 text-center box">
            <h2>5</h2>
            </br>
            <p>Categories</p>
        </div>
    </div>
</div>
<!--Main Section End -->
<?php include('./partials/footer.php'); ?>