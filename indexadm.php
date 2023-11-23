<?php
include 'koneksi.php';
include 'tgl_indo.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 

include "kodepj.php";
session_start();
if ($_SESSION['admin']) {

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kasir 4</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->

        <!-- Waves Effect Css -->
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="css/style.css" rel="stylesheet">
        <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css/themes/all-themes.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="js/axios.min.js"></script>
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="indexadm.php">Halaman Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main Navigation</div>
                            <a class="nav-link" href="indexadm.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Master</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="?page=supplier">Supplier</a>
                                    <a class="nav-link" href="?page=barang">Barang</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="?page=laporan_penjualan">
                                <div class="sb-nav-link-icon"><i class="fas fa-cart-plus"></i></div>
                                Laporan Penjualan
                            </a>
                            <a class="nav-link" href="?page=laporan_pembelian">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-basket"></i></div>
                                Laporan Pembelian
                            </a>
                            <a class="nav-link" href="?page=laporan_retur">
                                <div class="sb-nav-link-icon"><i class="fas fa-cart-plus"></i></div>
                                Laporan Retur
                            </a>
                            <div class="sb-sidenav-menu-heading">Akun</div>
                            <a class="nav-link" href="?page=user">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Akun
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Aplikasi POS</div>
                        By LReza
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="block-header">
                            <?php 
                            $page = $_GET['page'];
                            $aksi = $_GET['aksi'];
                            
                            
                            if ($page == "barang") {
                                if ($aksi == "") {
                                  include "page/barang/barang.php";
                              }
                              
                              if ($aksi == "tambah") {
                                  include "page/barang/tambah.php";
                              }
                              
                              if ($aksi == "edit") {
                                  include "page/barang/edit.php";
                              }
                              
                              if ($aksi == "delete") {
                                  include "page/barang/delete.php";
                              }
                          }
                          
                          if ($page == "supplier") {
                            if ($aksi == "") {
                                include "page/supplier/supplier.php";
                            }
                            
                            if ($aksi == "tambah") {
                                include "page/supplier/tambah.php";
                            }
                            
                            if ($aksi == "edit") {
                                include "page/supplier/edit.php";
                            }
                            
                            if ($aksi == "delete") {
                                include "page/supplier/delete.php";
                            }
                        }
                        

                           if ($page == "pembelian") {
                            if ($aksi == "") {
                                include "page/pembelian/pembelian.php";
                            }
                            
                            if ($aksi == "tambah") {
                                include "page/pembelian/tambah.php";
                            }
                            
                            if ($aksi == "edit") {
                                include "page/pembelian/edit.php";
                            }
                            
                            if ($aksi == "delete") {
                                include "page/pembelian/delete.php";
                            }
                      }
                      
                
                if ($page == "user") {
                    if ($aksi == "") {
                      include "page/user/user.php";
                  }
                  
                  if ($aksi == "tambah") {
                      include "page/user/tambah.php";
                  }
                  
                  if ($aksi == "edit") {
                      include "page/user/edit.php";
                  }
                  
                  if ($aksi == "delete") {
                      include "page/user/delete.php";
                  }
              }
              
              
              if ($page == "laporan_penjualan") {
                if ($aksi == "") {
                    include "page/laporan_penjualan/laporan.php";
                }
                if ($aksi == "view-detail") {
                    include "page/laporan_penjualan/view-detail.php";
                }
                
                
            }
            
            if($page == "laporan_pembelian") {
                if ($aksi == "") {
                    include "page/laporan_pembelian/laporan_pembelian.php";
                }
                if ($aksi == "view") {
                    include "page/laporan_pembelian/view.php";
                }
                if($aksi=="detail"){
                    include "page/laporan_pembelian/pembeliandetail.php";     
                }
            }

            if ($page == "laporan_retur") {
                if ($aksi == "") {
                    include "page/laporan_retur/laporan_retur.php";
                }
                if ($aksi == "view-detail") {
                    include "page/laporan_retur/view-detail.php";
                }
            }

            if ($page == "") {
                include "homeadm.php";
            }
            ?>
        </div>
    </div>
</div>
</div>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">&copy; LRezza 2021</div>
            <div>
                <?php echo tgl_indo(date('Y-m-d')); ?>
                
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>


<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>

<!-- Custom Js -->



<!-- Custom Js -->
<script src="js/admin.js"></script>

<script src="js/pages/tables/jquery-datatable.js"></script>


<!-- Demo Js -->
<script src="js/demo.js"></script>
</body>
</html>
<?php 
}else{
    header("location:login.php");
}

?>