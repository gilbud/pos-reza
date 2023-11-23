<div class="row clearfix">
    <h1 class="mt-4">Data Laporan Retur Pembelian</h1>
    <p></p>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Retur</th>
                            <th>Tanggal Retur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                        <?php
                        $no = 1;

                        $sql = $koneksi->query("SELECT * FROM tb_retur ");

                        while ($data = $sql->fetch_assoc()) {
                            
                            
                            ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['kode_retur']?></td>
                                <td><?php echo $data['tanggal_retur']?></td>
                                <td>
                                    <a href="?page=laporan_retur&aksi=view-detail&kode_retur=<?php echo $data['kode_retur']?>" class="btn btn-success" ><i class="fa fa-eye" aria-hidden="true" style="border-radius: 5px"></i> View Detail</a>
                                </td>

                                
                            </tr>
                            <?php 
                            
                        } ?>
                    </tbody>
                    
                </table>
                
            </div>