<div class="row clearfix">
    <h1 class="mt-4">Data Retur</h1>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Retur</th>
                            <th>Tanggal Retur</th>
                            <th>Supplier</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Retur</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                       <?php
                       $no = 1;

                       $sql = $koneksi->query("SELECT *, p.id AS idsup, p.jumlah_retur AS jumlah_returr from tb_retur p LEFT JOIN tb_supplier s on p.nama_supplier=s.nama_supplier left join tb_barang b on b.kode_barcode=p.kode_barcode  ");

                       while ($data = $sql->fetch_assoc()) {


                           ?>
                           <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $data['kode_retur']?></td>
                            <td><?php echo $data['tanggal_retur']?></td>
                            <td><?php echo $data['nama_supplier']?></td>
                            <td><?php echo $data['nama_barang']?></td>
                            <td><?php echo $data['jumlah_retur']?></td>
                            <td id="demo"><?php echo $data['status']?></td>
                            <td><?php echo $data['keterangan']?></td>
                            <td>
                            <?php if($data['status']=='Yes'){?>
                                <input type="submit" class="btn btn-success" value="Complete" name="submit">

                            <?php }else{?>
                                <form action="" method="POST">
                                <input type="hidden" value="<?php echo $data['kode_retur']?>" name="kode_retur">
                            <input type="submit" class="btn btn-danger" value="Complete" name="submit">

                            </form>
                                <?php }?>
                            <!-- <a onclick="return confirm('Sudah diRetur?')" id="update" value="Update" href="" class="btn btn-danger" >Complete</a>

 -->

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            
            <?php
  if (isset($_POST['submit'])) {
    someFunction();
  }
  function someFunction() {
    $koneksi = mysqli_connect("localhost","root","","kasir4revisi");
    $kode_retur=$_POST['kode_retur'];
    $status='Yes';
    $query = mysqli_query($koneksi, "UPDATE tb_retur SET status='$status' WHERE kode_retur='$kode_retur'");
    ?>
    <script type="text/javascript">
       alert("Data Berhasil di Retur");
       window.location.href="?page=retur_pembelian";
   </script>


   <?php
  }
?>
        </table>
<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "Yes";
}
</script>
    </div>