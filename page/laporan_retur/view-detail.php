<div class="row clearfix">
    <h1 class="mt-4">Detail Laporan Retur Pembelian</h1>
    <p></p>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="body">
                    <form method="post" action="page/laporan_retur/cetak.php" target="_blank" >
                        <table>
                            <div ><br>
                                <label>Bulan :</label>
                                <select name="bulan" class="number_format">
                                    <option value="">Pilih</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="April">April</option>
                                    <option value="Maret">Maret</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                                <input type="submit" name="cetak" value="cetak" class="btn btn-primary" >        
                            </div>
                        </table>

                    </form>
                </div>

                <div class="body">
                 
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Retur</th>
                                    <th>Tanggal Retur</th>
                                    <th>Nama Supplier</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Retur</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            
                            <tbody>

                                <?php
                                $no = 1;

                                $kode_retur = $_GET['kode_retur'];
                                $sql = $koneksi->query("SELECT r.*, brg.* FROM tb_retur r JOIN tb_barang brg ON r.kode_barcode = brg.kode_barcode WHERE r.kode_retur ='$kode_retur'");
                                while ($data = $sql->fetch_assoc()) {
                                    
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['kode_retur']?></td>
                                        <td><?php echo $data['tanggal_retur']?></td>
                                        <td><?php echo $data['nama_supplier']?></td>
                                        <td><?php echo $data['nama_barang']?></td>
                                        <td><?php echo $data['jumlah_retur']?></td>
                                        <td><?php echo $data['status']?></td>
                                        <td><?php echo $data['keterangan']?></td>

                                        
                                    </tr>
                                    <?php 
                                    
                                } ?>
                            </tbody>
                            
                        </table>
                        
                    </div>