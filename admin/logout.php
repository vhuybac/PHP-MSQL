<?php
include('./partials/menu.php');
session_destroy();
header('location:' . SITE_URL . '/admin/login-admin.php');
