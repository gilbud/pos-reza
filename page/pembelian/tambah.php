<?php
  include 'koneksi.php';
  $kodebl=$_GET['kodebl'];
  ?>
<div class="row clearfix">
  <h1 class="mt-4">Tambah Pembelian</h1>
  <p></p>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card mb-4">
      <div class="card-body">
        <form method="POST">
         <label for="">No Faktur</label>
         <div class="form-group">
          <div class="form-line">
           <input type="text" name="nofaktur" required="required" value="<?php echo $kodebl ?>" class="form-control" readonly>
         </div>
       </div>
    
       <label for="">Tanggal</label>
       <div class="form-group">
        <div class="form-line">
         <input type="date" name="tanggal" class="form-control" id="tanggal" required/>
       </div>
     </div>

     <!-- <label for="">Supplier</label>
     <div class="form-group">
      <div class="form-line">
       <select name="nama_supplier" id="nama_supplier" class="form-control" required="" >
        <option value="">-- Pilih Supplier --</option>
        <?php 
        //$sql = $koneksi->query("select * from tb_supplier");
        
        //while ($data = $sql->fetch_assoc()) {
         //echo '<option value="'.$data['nama_supplier'].'">'
         //.$data['nama_supplier'].'</option>';
         
      // } ?>                                 
     </select>
   </div>
 </div>
 <label for="">Nama Barang</label>
 <div class="form-group">
  <div class="form-line">
   <select name="kode_barcode" id="kode_barcode" class="form-control" required="" >
    <option value="">-- Pilih Barang --</option>
    <?php 
    //$sql = $koneksi->query("select * from tb_barang");
    
   // while ($data = $sql->fetch_assoc()) {
    // echo '<option value="'.$data['kode_barcode'].'">'
    // .$data['nama_barang'].'</option>';
     
   // } ?>                                 
 </select>
</div>
</div> -->


            <!--supplier-->
           <select id="supplier" class="form-control" name="supplier" required>
                <option value="">Pilih Supplier</option>
                <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_supplier ORDER BY nama_supplier");
                    while ($row = mysqli_fetch_array($query)) { ?>

                        <option value="<?php echo $row['nama_supplier']; ?>">
                            <?php echo $row['nama_supplier']; ?>
                        </option>
                <?php } ?>
            </select>
            <br>
            <!--barang-->
            <select id="barang" class="form-control" name="barang" required>
                <option value="">Pilih Barang</option>
            </select>
<br>
<label for="">Harga Beli</label> 
<div class="form-group">
  <div class="form-line" id="harga">
 </div>
</div>
<label for="">Jumlah Beli</label> 
<div class="form-group">
  <div class="form-line">
   <input type="number" name="stok" class="form-control" required />
 </div>
</div>


<input type="submit" name="tambah" value="Tambah" class="btn btn-primary">
</form>
        

      <script src="js/bootstrap.min.js"></script>
       <script src="js/jquery-chained.min.js"></script>

       <script>
            $(document).ready(function() {
                $("#barang").chained("#supplier");

            });
        </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script>
var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;

document.getElementById("tanggal").value = today;

$("#supplier").change(function(){
	// variabel dari nilai combo box kendaraan
	var id_kendaraan = $("#supplier").val();

	// Menggunakan ajax untuk mengirim dan dan menerima data dari server
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "page/pembelian/ambil-data.php",
		data: "supplier="+id_kendaraan,
		success: function(data){
		   $("#barang").html(data);
		}
	});
});
</script>
<script>
$("#barang").change(function(){
	// variabel dari nilai combo box kendaraan
	var id_barang = $("#barang").val();

	// Menggunakan ajax untuk mengirim dan dan menerima data dari server
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "page/pembelian/ambil-data.php",
		data: "barang="+id_barang,
		success: function(data){
		   $("#harga").html(data);
		}
	});
});
</script>
<?php 
if (isset($_POST['simpan'])) {
  $nofaktur;
  $tanggal;
  session_start();
  $jumlah=count($_SESSION['pembelian']);
   foreach ($_SESSION['pembelian'] as $index => $row) {
    $nofaktur=$row['nofaktur'];
    $tanggal=$row['tanggal'];
    $supplier=$row['nama_supplier'];
    $kode_bar=$row['kode_barcode'];
    $harga_beli=$row['harga_beli'];
    $jumlah_beli=$row['jumlah_beli'];
   $pembelianinsert=$koneksi->query("INSERT into tb_pembelian_detail (nofaktur,nama_supplier,kode_barcode,harga_beli,jumlah_beli) values ('$nofaktur','$supplier','$kode_bar','$harga_beli','$jumlah_beli')");
   $updatestok=$koneksi->query("UPDATE tb_barang SET stok=stok+'$jumlah_beli' where kode_barcode='$kode_bar'");
  }
  $sql = $koneksi->query("insert into tb_pembelian (nofaktur,tanggal) values('$nofaktur','$tanggal')");
  
 
 if ($sql) {
  ?>
  <script type="text/javascript">
   alert("Data Berhasil di Simpan");
   window.location.href="?page=pembelian";
 </script>
 <?php
}
}

if (isset($_POST['tambah'])) {
  session_start();
  if (!isset($_SESSION['pembelian'])) {
    $_SESSION['pembelian'] = array();
  } else {
    $index_produk = array_search($_POST['barang'], array_column($_SESSION['pembelian'], 'kode_barcode'));
  }
  if (count($_SESSION['pembelian']) == 0 || $index_produk === false) {
  $pembelian=[
    'nofaktur'=> $_POST['nofaktur'],
    'tanggal'=> $_POST['tanggal'],
    'nama_supplier'=> $_POST['supplier'],
    'kode_barcode'=> $_POST['barang'],
    'harga_beli'=> $_POST['harga'],
    'jumlah_beli'=>$_POST['stok']
  ];
  $_SESSION['pembelian'][]=$pembelian;
}else {
  $jum=$_SESSION['pembelian'][$index_produk]['jumlah_beli']+$_POST['stok'];
  $_SESSION['pembelian'][$index_produk]['jumlah_beli']=$jum;
}
}
?>
      </div>

    </div>
      <div class="card">
      <div class="body">
        <div class="table-responsive">
          <table class="table table-striped ">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Supplier</th>
                <th>Harga Beli</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $total_bayar = 0;
                session_start();
               $jumlah=count($_SESSION['pembelian']);

                foreach ($_SESSION['pembelian'] as $index => $row) {
                  $total_bayar+=($row['harga_beli']*$row['jumlah_beli']); ?>
                
                
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?= $row['kode_barcode'] ?></td>
                  <td><?= $row['nama_supplier'] ?></td>
                  <td><?= $row['harga_beli'] ?></td>
                  <td><?php echo number_format($row['jumlah_beli'])?></td>
                  <td><?php echo "Rp. ".number_format($row['harga_beli']*$row['jumlah_beli'])?></td>
                  <td>
                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini !')" href="index.php?page=pembelian&aksi=delete&id=<?= $row['kode_barcode'] ?>&kodebl=<?php echo $kodebl?>" class="btn btn-danger" >Delete</a>
                  </td>
                </tr>
              <?php
                }
                  
              
               ?>
               <tr>
                 
               <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td><?php echo "Rp. ". number_format($total_bayar)?></td>
                 <td>
               </tr>
            </tbody>
          </table>
        </div>
       <form method="POST">
        <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">
</form>
      </div>
    </div>