<?php
$sql= $koneksi->query("select * from tb_barang");
while ($tampil = $sql->fetch_assoc()) {
    $jumlah_barang = $sql->num_rows;
}
$sql1= $koneksi->query("select * from tb_penjualan_detail");
while ($tampil = $sql1->fetch_assoc()) {
    $jumlah_penjualan = $sql1->num_rows;
}
$sql2= $koneksi->query("select * from tb_supplier");
while ($tampil = $sql2->fetch_assoc()) {
    $jumlah_supplier = $sql2->num_rows;
}
$sql3= $koneksi->query("select * from tb_pembelian");
while ($tampil = $sql3->fetch_assoc()) {
    $jumlah_pembelian = $sql3->num_rows;
}
?>

<div id="content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Data Barang <b><u><?php echo $jumlah_barang;?></u></b></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="?page=barang">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Data Supplier <b><u><?php echo $jumlah_supplier;?></u></b></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="?page=supplier">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Laporan Penjualan <b><u><?php echo $jumlah_penjualan;?></b></u></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="?page=laporan_penjualan">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Data Pembelian <b><u><?php echo $jumlah_pembelian;?></b></u></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="?page=pembelian">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            