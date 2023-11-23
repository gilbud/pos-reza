<div class="row clearfix">
    <h1 class="mt-4">Data Barang</h1>
    <p><a href="?page=barang&aksi=tambah" class="btn btn-primary">Tambah Data </a></p>
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
                            <th>Kode Barcode</th>
                            <th>Nama Barang</th>
                            <th>Supplier</th>
                            <th>Satuan</th>
                            <th>Stok Tersedia</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Untung</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Barcode</th>
                            <th>Nama Barang</th>
                            <th>Supplier</th>
                            <th>Satuan</th>
                            <th>Stok Tersedia</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Untung</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = $koneksi->query("SELECT b.*, sup.* FROM tb_barang b JOIN tb_supplier sup ON b.id = sup.id ");
                        while ($data = $sql->fetch_assoc()) {            
                            ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['kode_barcode']?></td>
                                <td><?php echo $data['nama_barang']?></td>
                                <td><?php echo $data['nama_supplier']?></td>
                                <td><?php echo $data['satuan']?></td>
                                <td><?php echo $data['stok']?></td>
                                <td><?php echo "Rp. ".number_format($data['harga_beli'])?></td>
                                <td><?php echo "Rp. ".number_format($data['harga_jual'])?></td>
                                <td><?php echo "Rp. ".number_format($data['profit'])?></td>
                                <td>         
                                    <a href="?page=barang&aksi=edit&id=<?php echo $data['kode_barcode']?>" class="btn btn-success" >Edit</a>
                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini !')" href="?page=barang&aksi=delete&id=<?php echo $data['kode_barcode']?>" class="btn btn-danger" >Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        