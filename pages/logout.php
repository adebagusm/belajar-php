<?php
session_start();
session_destroy();
// jika user belum login, maka ketika mengakses halaman dashboard akan di redirect ke halaman login
header("Location: login.php");
exit();
