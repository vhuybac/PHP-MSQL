<?php
if (!isset($_SESSION['login-success'])) {
    header('location:' . SITE_URL . 'admin/login-admin.php');
}
