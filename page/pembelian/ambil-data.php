<?php

include '../../koneksi.php';
      
if (isset($_POST['supplier'])) {
    $kategori = $_POST["supplier"];
    $querygambar = mysqli_query($koneksi,"SELECT * FROM tb_supplier WHERE nama_supplier='$kategori' LIMIT 1");
    $rowgambar = mysqli_fetch_array($querygambar);
    $id=$rowgambar['id'];
    $sql = "SELECT * FROM tb_barang, tb_supplier where tb_barang.id = '$id' and tb_barang.id=tb_supplier.id ORDER BY nama_barang";
    $hasil = mysqli_query($koneksi, $sql);
    ?>		<option value="#">Pilih Barang</option><?php
    while ($data = mysqli_fetch_array($hasil)) {
        ?>
        <option value="<?php echo $data['kode_barcode']; ?>"><?php echo $data['nama_barang']; ?></option>
        <?php
    }
       
}
if(isset($_POST['barang'])){
    $idbarang=$_POST['barang'];
    $querybarang = mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE kode_barcode='$idbarang' LIMIT 1");
    $rowbarang = mysqli_fetch_array($querybarang);
 
    ?>
      <input type="number" name="harga"  class="form-control" value="<?php echo $rowbarang['harga_beli']; ?>"/>
    <?php
}
?>