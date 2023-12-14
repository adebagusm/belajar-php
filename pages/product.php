<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.108.0" />
    <title>Products</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, 0.1);
        border: solid rgba(0, 0, 0, 0.15);
        border-width: 1px 0;
        box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
            inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -0.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
    </style>

    <!-- Custom styles for this template -->
    <link href="../assets/css/dashboard.css" rel="stylesheet" />
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Ade Bagus</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
            aria-label="Search" />

    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../index.php">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">
                                <span data-feather="user" class="align-text-bottom"></span>
                                Login (Tugas 13)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product.php">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Products (Tugas 13 dan 14)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login-session.php">
                                <span data-feather="user" class="align-text-bottom"></span>
                                Login Session (Tugas 15)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pos-shop.php">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                CRUD Product
                            </a>
                        </li>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">MamatGunshop</h1>

                </div>
                <div class="row justify-content-center" id="card">
                    <?php
                    $products = [
                        ["img" => "../assets/img/product/gam1.jpg", "title" => "AK47", "price" => "Rp.2.100.000"],
                        ["img" => "../assets/img/product/gam2.jpg", "title" => "Adidas Speedportal Leyenda", "price" => "Rp.3.300.000"],
                        ["img" => "../assets/img/product/gam3.jpg", "title" => "Nike Zoom Mercurial Vapor 15 Elite", "price" => "Rp.2.700.000"],
                        ["img" => "../assets/img/product/gam4.jpg", "title" => "Nike Phantom GX Elite", "price" => "Rp.1.800.000"],
                        ["img" => "../assets/img/product/gam5.jpg", "title" => "Puma Future Ultimate", "price" => "Rp.1.680.000"],
                        ["img" => "../assets/img/product/gam6.jpg", "title" => "Puma Ultra Ultimate", "price" => "Rp.2.239.300"],
                        ["img" => "../assets/img/product/gam7.jpg", "title" => "Puma Ultra Ultimate", "price" => "Rp.2.239.300"],
                        ["img" => "../assets/img/product/gam22.jpg", "title" => "Puma Ultra Ultimate", "price" => "Rp.2.239.300"],
                    ];
                    foreach ($products as $key => $value) {
                        echo "<div class='card m-2' style='width: 18rem;'> <img src='{$value["img"]}' class='card-img-top mt-2' alt='...''> <div class='card-body col-12 text-align-center'> <h5 class='card-title text-center'> {$value["title"]}</h5> <p class='card-text text-center'>{$value["price"]}</p> </div> </div> ";
                    }
                    ?>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>