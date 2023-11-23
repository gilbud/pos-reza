<?php 
$id = $_GET['id'];
$sql = $koneksi->query("select tb_pembelian.tanggal,tb_pembelian_detail.* from tb_pembelian_detail,tb_pembelian where tb_pembelian_detail.nofaktur=tb_pembelian.nofaktur and tb_pembelian_detail.id_pembelian_detail='$id'");
$tampil = $sql->fetch_assoc();

?>
<div class="row clearfix">
  <h1 class="mt-4">Retur Pembelian</h1>
  <p></p>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card mb-4">
      <div class="card-body">
        <form method="POST">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <label for="">No. Faktur</label>
          <div class="form-group">
            <div class="form-line">
              <input  type="text" name="nofaktur" value="<?php echo $tampil['nofaktur']?>" class="form-control" readonly/>
            </div>
          </div>
        </div>
                <?php
  include 'koneksi.php';
 
  // $query = mysqli_query($koneksi, "SELECT id as kodeTerbesar FROM tb_retur order by id desc limit 1");
  // $data = mysqli_fetch_array($query);
  // $kodeRetur = $data['kodeTerbesar'];
 
  // $urutan = $kodeRetur;
 
  // $urutan++;
  // $huruf = "RT";
  // $kodeRetur = $huruf . $urutan;
  // membaca kode barang terbesar
  $query = "SELECT id as maxKode FROM tb_retur order by id desc limit 1";
  $hasil = mysqli_query($koneksi, $query);
$data  = mysqli_fetch_array($hasil);
$kodeRetur = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut =$kodeRetur;

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "RT";
$newID = $char . sprintf("%03s", $noUrut);

//Memasukkan data textbox ke database


  ?>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
      <label for="">Kode Retur</label>
      <div class="form-group">
        <div class="form-line">
         <input type="text" name="kode_retur" required="required" value="<?php echo $newID ?>" class="form-control" readonly>
        </div>
      </div>
    </div>
  </div>
  
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <label for="">Tanggal Pembelian</label>
          <div class="form-group">
            <div class="form-line">
              <input  type="date" name="tanggal" value="<?php echo $tampil['tanggal']?>" class="form-control" readonly/>
            </div>
          </div>
        </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
               <label for="">Tanggal Retur</label>
          <div class="form-group">
            <div class="form-line">
              <input  name="tanggal_retur" value="<?php echo tgl_indo(date('Y-m-d')); ?>" class="form-control" />
            </div>
          </div>
    </div>
  </div>


          <label for="">Supplier</label>
          <div class="form-group">
            <div class="form-line">
               <input name="nama_supplier"  value="<?php echo $tampil['nama_supplier']?>" class="form-control" readonly></input>
          </div>
        </div>
      
        <label for="">Kode Barcode</label>
        <div class="form-group">
          <div class="form-line">
        <input name="kode_barcode" value="<?php echo $tampil['kode_barcode']?>" class="form-control" readonly></input>
        </div>
      </div>
      

      
      <label for="">Jumlah Beli</label>
      <div class="form-group">
        <div class="form-line">
          <input type="number" name="stok" value="<?php echo $tampil['jumlah_beli']?>" class="form-control" />
        </div>
      </div>
    
    


     

      

      <label for="">Jumlah Retur</label>
      <div class="form-group">
        <div class="form-line">
          <input type="number" name="jumlah_retur" class="form-control" required />
        </div>
      </div>

      <label for="">Status</label>
      <div class="form-group">
        <div class="form-line">
           <select name="status" class="form-control show-tick">
              <option value="">-- Pilih Status--</option>
             <!--  <option value="LUSIN">LUSIN</option>
              <option value="PACK">PACK</option> -->
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
        </div>
      </div>

      <label for="">Keterangan</label>
      <div class="form-group">
        <div class="form-line">
          <textarea class="col-12" name="keterangan"></textarea>
        </div>
      </div>

      

      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

    </form>

    <?php 

    if (isset($_POST['simpan'])) {
      $kode_retur = $_POST['kode_retur'];
      $tanggal_retur = $_POST['tanggal_retur'];
      $nama_supplier = $_POST['nama_supplier'];
      $kode_barcode = $_POST['kode_barcode'];
      $jumlah_retur = $_POST['jumlah_retur'];
      $status = $_POST['status'];
      $keterangan = $_POST['keterangan'];
      

      $sql = $koneksi->query("insert into tb_retur  set kode_retur='$kode_retur', tanggal_retur='$tanggal_retur', nama_supplier='$nama_supplier',kode_barcode='$kode_barcode',jumlah_retur='$jumlah_retur',status='$status',keterangan='$keterangan'");
      $jum=(int)$jumlah_retur;
      $sql2=$koneksi->query("update tb_barang set stok=stok-$jum where kode_barcode='$kode_barcode'");
      if ($sql) {
        ?>

        <script type="text/javascript">
          alert("Data Berhasil di Retur");
          window.location.href="?page=retur_pembelian";
        </script>


        <?php
      }
    }
    ?>