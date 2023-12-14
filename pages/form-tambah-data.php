<?php
include '../oop/Database.php';
include '../oop/Product.php';

// Membuat objek koneksi database
$database = new Database();
$connection = $database->getConnection();

// Tutup koneksi
$product = new Product($connection);

$per_page = 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $per_page;
if ($page == 1) {
    $start_from = 0;
} else if ($page == 2) {
    $start_from = 10;
}

// Search Produk
if (isset($_POST['search_button'])) {
    $search = $_POST['search'];
    $products = $product->searchProducts($search, $per_page, $start_from);
} else {
    $products = $product->getProducts($per_page, $start_from);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUDProduct </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Card Produk style -->
    <link rel="stylesheet" href="../dist/css/cardproduk.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto"></ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../assets/img/hildamn.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Mundial Store</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../assets/img/profile.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Hildan Adisqi Ali Hasan</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <!-- /.Dashboard -->
                        <!-- Product Variabel -->
                        <li class="nav-item">
                            <a href="product.php" class="nav-link active">
                                <i class="nav-icon 	fas fa-shopping-cart"></i>
                                <p>
                                    Product
                                </p>
                            </a>
                        </li>
                        <!-- /.Product Variabel -->
                        <!-- CRUD Product -->
                        <li class="nav-item">
                            <a href="pos-shop.php" class="nav-link active">
                                <i class="nav-icon 	fas fa-shopping-cart"></i>
                                <p>
                                    CRUD Products
                                </p>
                            </a>
                        </li>
                        <!-- /.CRUD Product -->
                        <!-- Login -->

                        <li class="nav-item">
                            <a href="login-session.php" class="nav-link active">
                                <i class="nav-icon 	fas fa-sign-out-alt"></i>
                                <p>
                                    Login
                                </p>
                            </a>
                        </li>

                        <!-- Login -->
                        <!-- Logout -->
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link active">
                                <i class="nav-icon 	fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                        <!-- /.Logout -->
                        <!-- /.sidebar-menu -->
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Form Tambah Data</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="proses-tambah.php" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="product_name">Product Name:</label>
                                            <input type="text" id="product_name" name="product_name"
                                                class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Category:</label>
                                            <select id="category_id" name="category_id" class="form-control" required>
                                                <option value="" selected>Select</option>
                                                <option value="1">Sports</option>
                                                <option value="2">Daily</option>
                                                <option value="3">Accessories</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_code">Product Code:</label>
                                            <input type="text" id="product_code" name="product_code"
                                                class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description:</label>
                                            <input type="text" id="description" name="description" class="form-control"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price:</label>
                                            <input type="text" id="price" name="price" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="stock">Stock:</label>
                                            <input type="text" id="stock" name="stock" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Upload Image:</label>
                                            <input type="file" id="image" name="image[]" class="form-control"
                                                accept=".jpg, .jpeg, .png, .gif" multiple required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                </form>
                                <!-- /.card -->
                            </div>
                            <!--/.col (right) -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Ekko Lightbox -->
    <script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- Filterizr-->
    <script src="../plugins/filterizr/jquery.filterizr.min.js"></script>
</body>

</html>

</html>