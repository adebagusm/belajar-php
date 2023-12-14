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
                            <h1>CRUD Products</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- create/tambah data -->
                        <div class="col-lg-2 col-3">
                            <!-- small box -->
                            <div class="">
                                <div class="inner">
                                    <!-- <h4>Tambah Data</h4> -->
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="form-tambah-data.php" class="btn btn-block btn-primary">Tambah Data <i
                                        class="nav-icon fas fa-plus mr-2"></i></a>
                                <br>
                            </div>
                        </div>
                        <!-- akhir tambah data -->
                        <!-- Search Data -->
                        <div class="card-tools">
                            <form method="post" action="">
                                <div class="input-group input-group-mb">
                                    <input type="text" name="search" id="search-input" class="form-control float-right"
                                        placeholder="Search Product">
                                    <div class="input-group-append">
                                        <button type="submit" name="search_button" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                        </div>
                        <!-- /.Akhir Search Data -->
                        <div class="col-12">
                            <div class="card">
                                <!-- <div class="card-header">
                  <h3 class="card-title">DataTable with minimal features & hover style</h3>
                </div> -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Product Code</th>
                                                <!-- <th>Is Active</th> -->
                                                <!-- <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Created By</th>
                                                <th>Updated By</th> -->
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Unit</th>
                                                <!-- <th>Discount Amount</th> -->
                                                <th>Stock</th>
                                                <th>Image</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Array category
                                            $categories = array(
                                                1 => 'Sports',
                                                2 => 'Daily',
                                                3 => 'Accessories'
                                            );

                                            // Periksa koneksi
                                            if ($connection->connect_error) {
                                                die("Koneksi gagal: " . $connection->connect_error);
                                            }

                                            $per_page = 10;
                                            $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
                                            $start_from = ($page - 1) * $per_page;
                                            if ($page == 1) {
                                                $start_from = 0;
                                            } else if ($page == 2) {
                                                $start_from = 10;
                                            }
                                            // Search
                                            if (isset($_POST['search_button'])) {
                                                $search = $_POST['search'];

                                                // Query untuk mengambil data
                                                $sql = "SELECT id, product_name, category_id, product_code, is_active, created_at, updated_at, created_by, updated_by, description, price, unit, discount_amount, stock, image 
                        FROM products 
                        WHERE product_name LIKE '%$search%' OR category_id LIKE '%$search%' OR description LIKE '%$search%'
                        LIMIT $per_page OFFSET $start_from";
                                            } else {
                                                $sql = "SELECT id, product_name, category_id, product_code, is_active, created_at, updated_at, created_by, updated_by, description, price, unit, discount_amount, stock, image 
                        FROM products 
                        LIMIT $per_page OFFSET $start_from";
                                            }

                                            $result = $connection->query($sql);

                                            // Menampilkan data dalam HTML
                                            $i = 1 + $start_from;
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $i . "</td>";
                                                    echo "<td>" . $row["product_name"] . "</td>";
                                                    echo "<td>" . $categories[$row["category_id"]] . "</td>";
                                                    echo "<td>" . $row["product_code"] . "</td>";
                                                    // echo "<td>" . $row["is_active"] . "</td>";
                                                    // echo "<td>" . $row["created_at"] . "</td>";
                                                    // echo "<td>" . $row["updated_at"] . "</td>";
                                                    // echo "<td>" . $row["created_by"] . "</td>";
                                                    // echo "<td>" . $row["updated_by"] . "</td>";
                                                    echo "<td>" . $row["description"] . "</td>";
                                                    echo "<td>" . $row["price"] . "</td>";
                                                    echo "<td>" . $row["unit"] . "</td>";
                                                    // echo "<td>" . $row["discount_amount"] . "</td>";
                                                    echo "<td>" . $row["stock"] . "</td>";
                                                    echo "<td>";
                                                    // Uraikan JSON gambar menjadi array
                                                    $imagesArray = json_decode($row["image"], true);

                                                    // Periksa apakah ada gambar dalam array
                                                    if (!empty($imagesArray)) {
                                                        // Loop 
                                                        foreach ($imagesArray as $image) {
                                                            echo '<div style="margin-bottom: 10px;">';
                                                            echo '<img src="../dist/upload/' . $image . '" alt="image" style="width: 100px; height: 100px;">';
                                                            echo '</div>';
                                                        }
                                                    } else {
                                                        // Tampilkan pesan jika tidak ada gambar
                                                        echo 'Tidak ada gambar';
                                                    }
                                                    echo "</td>";
                                                    echo '<td>
                                        <a href="form-edit-data.php?id=' . $row["id"] . '" class="btn btn-warning">Edit</a>
                                        <a href="proses-delete.php?id=' . $row["id"] . '" class="btn btn-danger">Hapus</a>
                                     </td>';
                                                    echo "</tr>";
                                                    $i++;
                                                }
                                            } else {
                                                echo "Data tidak ditemukan.";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    // Pagination
                                    $sql = "SELECT COUNT(id) FROM products";
                                    $result = $connection->query($sql);
                                    $row = $result->fetch_row();
                                    $total_records = $row[0];
                                    $total_pages = ceil($total_records / $per_page);

                                    echo "<ul class='pagination'>";
                                    if ($page > 1) {
                                        echo "<li class='page-item'><a class='page-link' href='pos-shop.php?page=" . ($page - 1) . "'>Previous</a></li>";
                                    }

                                    for ($i = max(1, $page - 2); $i <= min($page + 2, $total_pages); $i++) {
                                        echo "<li class='page-item ";
                                        if ($i == $page) {
                                            echo "active";
                                        }
                                        echo "'><a class='page-link' href='pos-shop.php?page=" . $i . "'>" . $i . "</a></li>";
                                    }

                                    if ($page < $total_pages) {
                                        echo "<li class='page-item'><a class='page-link' href='pos-shop.php?page=" . ($page + 1) . "'>Next</a></li>";
                                    }
                                    echo "</ul>";
                                    ?>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
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