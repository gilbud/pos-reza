<div class="row clearfix">
<?php include 'kodebl.php'; ?>
   
    <h1 class="mt-4">Data Pembelian</h1>
    <p><a href="?page=pembelian&aksi=tambah&kodebl=<?php echo $kodebl?>" class="btn btn-primary">Tambah Pembelian</a></p>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Faktur</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                     <?php
                     $no = 1;

                     $sql = $koneksi->query("select * from tb_pembelian,tb_pembelian_detail where tb_pembelian.nofaktur=tb_pembelian_detail.nofaktur group by tb_pembelian.nofaktur ");

                     while ($data = $sql->fetch_assoc()) {
                       
                      
                         ?>
                         <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $data['nofaktur']?></td>
                            <td><?php echo $data['tanggal']?></td>
                            <td>
                                <a href="?page=pembelian&aksi=detail&nofaktur=<?php echo $data['nofaktur']?>" class="btn btn-success">Detail</a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>
        