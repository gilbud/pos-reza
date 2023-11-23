<div class="row clearfix">
    <h1 class="mt-4">Data Supplier</h1>
    <p><a href="?page=supplier&aksi=tambah" class="btn btn-primary">Tambah Data</a></p>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i> Data Tabel 
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Supplier</th>
                            <th>TLP</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = $koneksi->query("select * from tb_supplier");
                        while ($data = $sql->fetch_assoc()) {      		
                            ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['nama_supplier']?></td>
                                <td><?php echo $data['tlp']?></td>
                                <td><?php echo $data['alamat']?></td>
                                <td>           	
                                    <a href="?page=supplier&aksi=edit&id=<?php echo $data['id']?>" class="btn btn-success" >Edit</a>
                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini !')" href="?page=supplier&aksi=delete&id= <?php echo $data['id']?>" class="btn btn-danger" >Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>