<?php include('./configuration/database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FoodOrder - Home Page</title>
  <link rel="stylesheet" href="../css/admin-style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <!--Menu Section Starts -->
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4">Simple header</span>
      </a>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="manage-admin.php" class="nav-link">Admin</a></li>
        <li class="nav-item"><a href="manage-food.php" class="nav-link">Food</a></li>
        <li class="nav-item"><a href="manage-order.php" class="nav-link">Order</a></li>
        <li class="nav-item"><a href="manage-category.php" class="nav-link">Category</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link">Log out</a></li>
      </ul>
    </header>
    <!--Menu Section End -->