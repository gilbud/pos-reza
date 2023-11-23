<div class="row clearfix">
<?php include 'kodebl.php'; ?>
   
    <h1 class="mt-4">Data Pembelian Detail</h1>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-body">
                <form method="post" action="page/laporan_pembelian/cetak_pembelian.php" target="_blank" >
                    <table>
                        <div ><br>
                            <label>Bulan :</label>
                            <select name="bulan" class="number_format">
                                <option value="">Pilih</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <input type="submit" name="cetak" value="cetak" class="btn btn-primary" >        
                        </div>
                    </table>

                </form>
            </div>
            <div class="card-body">
                
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Faktur</th>
                            <th>Tanggal</th>
                            <th>Nama Supplier</th>
                            <th>Nama Barang</th>
                            <th>Harga Beli</th>
                            <th>Jumlah Beli</th>
                            <th>Total</th>
                            
                        </tr>
                    </thead>
                    
                    <tbody>
                     <?php
                     $no = 1;
                    $nofaktur=$_GET['nofaktur'];
                     $sql = $koneksi->query("select tb_barang.nama_barang,tb_pembelian.*,tb_pembelian_detail.* from tb_pembelian,tb_pembelian_detail,tb_barang where tb_pembelian.nofaktur=tb_pembelian_detail.nofaktur and tb_pembelian_detail.kode_barcode=tb_barang.kode_barcode and tb_pembelian_detail.nofaktur='$nofaktur';");

                     while ($data = $sql->fetch_assoc()) {
                       
                      
                         ?>
                         <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $data['nofaktur']?></td>
                            <td><?php echo $data['tanggal']?></td>
                            <td><?php echo $data['nama_supplier']?></td>
                            <td><?php echo $data['nama_barang']?></td>
                            <td><?php echo $data['harga_beli']?></td>
                            <td><?php echo $data['jumlah_beli']?></td>
                            <td><?php echo $data['harga_beli']*$data['jumlah_beli']?></td>
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>
        