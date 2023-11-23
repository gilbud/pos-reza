<?php
$kode = $_GET['kodepj'];
if(isset($_POST['simpan'])){
  
    // SIMPAN DATA PENJUALAN
  $date = date("Y-m-d");
  $bayar = $_POST['bayar'];
  $kembali = $_POST['kembali'];

  $tampil = $koneksi->query("INSERT into tb_penjualan (kode_penjualan,tgl_penjualan,bayar,kembali) values ('$kode','$date','$bayar','$kembali')");
  $id = mysqli_insert_id($koneksi);

  if ($tampil) {
    ?>
    <script>
      alert('data berhasil disimpan ');
      window.location="page/penjualan/struk.php?id=<?= $id ?>";
    </script>
  <?php }
  
  session_start();
  $jumlah=count($_SESSION['penjualan']);
   foreach ($_SESSION['penjualan'] as $index => $row) {
    $kode_bar=$row['kode_barcode'];
    $jumlah=$row['jumlah'];
    $diskon=$row['diskon'];
    $potongan=$row['potongan'];
    $total=$row['s_total'];
   $penjualaninsert=$koneksi->query("INSERT into tb_penjualan_detail (kode_penjualan,kode_barcode,jumlah,diskon,potongan,total) values ('$kode','$kode_bar','$jumlah','$diskon','$potongan','$total')");
  }
  $barang =  $koneksi->query("SELECT * FROM tb_penjualan_detail WHERE kode_penjualan='$kode'");
  while ($data_barang = $barang->fetch_assoc()) {
    $koneksi->query("UPDATE tb_barang SET stok=stok -'$data_barang[jumlah]' WHERE kode_barcode='$data_barang[kode_barcode]'");
    echo "<script>alert('data tidak mencukupi ');</script>";
  }
  unset($_SESSION['penjualan']);
}

if(isset($_POST['tambahkan'])){
    // TAMBAH BARANG KE PENJUALAN
  $kode = $_GET['kodepj'];
  session_start();
  if (!isset($_SESSION['penjualan'])) {
    $_SESSION['penjualan'] = array();
  } else {
    $index_produk = array_search($_POST['kode_barcode'], array_column($_SESSION['penjualan'], 'kode_barcode'));
  }
  if (count($_SESSION['penjualan']) == 0 || $index_produk === false) {
  $penjualan=[
    'kode_barcode'=> $_POST['kode_barcode'],
    'harga'=> $_POST['total_bayar'],
    'jumlah'=> $_POST['jumlah'],
    'diskon'=> $_POST['diskon'],
    'potongan'=> $_POST['potongan'],
    's_total'=>$_POST['s_total']
  ];
  $_SESSION['penjualan'][]=$penjualan;
}else {
  $jum=$_SESSION['penjualan'][$index_produk]['jumlah']+$_POST['jumlah'];
  $_SESSION['penjualan'][$index_produk]['jumlah']=$jum;
}
}
?>

<div class="row clearfix">
  <h1 class="mt-4">Transaksi Penjualan</h1>
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="header">
        <h2>Data barang</h2>
      </div>
      <div class="body">
        <div class="row">
          <form method="POST">
            <div class="col-md-6 cols-xs-12">
              <div class="form-group">
                <input type="text" name="kode" value="<?php echo $kode; ?>" class="form-control" readonly="" />
              </div>
              <div class="form-group">
                <div class="form-line">
                <select name="kode_barcode" id="kode_barcode" class="form-control" required="" onchange="hitung()">
                    <option value="">-- Pilih  --</option>
                    <?php 
                    $sql = $koneksi->query("select * from tb_barang");
                    
                    while ($data = $sql->fetch_assoc()) {
                     echo '<option value="'.$data['kode_barcode'].'">'
                     .$data['nama_barang'].'</option>';
                     
                   } ?>   
                   </select> 
                 </div>
                <!-- <label>Kode Barcode</label>
                <input type="text" name="kode_barcode"  class="form-control" autofocus="" onkeyup="hitung()" />
              </div> -->
            </div>
          </div>
            
            <div class="col-md-6 col-xs-12">      
              <label>Harga Barang :</label>
              <input type="text" style="text-align: right;" name="total_bayar" id="total_bayar" onkeyup="hitungSubTotal(detail_barang)" value="<?php echo $total_bayar;?>" class="form-control">
            </div>
            <div class="col-md-6 col-xs-12">
              <label>Jumlah : </label>
              <input type="number" style="text-align: right;" name="jumlah" id="jumlah" min="1" value="" onkeyup="hitungSubTotal(detail_barang)" class="form-control" required>
            </div>
            <div class="col-md-6 col-xs-12 text-right">
              <label>Diskon (%) : </label>
              <input type="number" style="text-align: right;" name="diskon" step=".1" id="diskon" onkeyup="hitungSubTotal(detail_barang)" class="form-control" required>
            </div>
            <div class="col-md-6 col-xs-12">
              <label>Potongan Diskon : </label>
              <input type="number" style="text-align: right;" name="potongan" id="potongan" class="form-control"required>
            </div>
            <div class="col-md-6 col-xs-12">
              <label>Sub Total : </label>
              <input type="number" readonly="" style="text-align: right;" name="s_total" id="s_total" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" name="tambahkan" value="Tambahkan" class="btn btn-primary">
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="header">
        <h2>
          DAFTAR BELANJAAN
        </h2>
      </div>
      <div class="body">
        <div class="table-responsive">
          <table class="table table-striped ">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Harga</th>
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
               $jumlah=count($_SESSION['penjualan']);

                foreach ($_SESSION['penjualan'] as $index => $row) {
                  $total_bayar+=$row['s_total']; ?>
                
                
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?= $row['kode_barcode'] ?></td>
                  <td><?= $row['harga'] ?></td>
                  <td><?php echo number_format($row['jumlah'])?></td>
                  <td><?php echo "Rp. ".number_format($row['s_total'])?></td>
                  <td>
                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini !')" href="?kodepj=<?=$_GET['kodepj']?>&page=penjualan&aksi=delete&id=<?= $row['kode_barcode'] ?>" class="btn btn-danger" >Delete</a>
                  </td>
                </tr>
              <?php
                }  
              
               ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="body">
        <form method="POST" action="" target="_blank" >
          <div class="row">
            <div class="col-md-6 col-xs-12 text-right">
              Total
            </div>
            <div class="col-md-6 col-xs-12 text-right">
              <?php echo $total_bayar; ?>
              <input type="hidden" name="total_bayar" value="<?php echo $total_bayar; ?>" />
            </div>
            <div class="col-md-6 col-xs-12 text-right" >
              Bayar
            </div>
            <div class="col-md-6 col-xs-12 text-right">
              <input type="number" name="bayar" id="bayar" class="form-control" />
            </div>
            <div class="col-md-6 col-xs-12 text-right">
              Kembali
            </div>
            <div class="col-md-6 col-xs-12 text-right">
              <input type="number" name="kembali" id="kembali" class="form-control" />
            </div>
          </div>
          <input type="submit" name="simpan" value="Print" class="btn btn-info">
          <input type="reset" value="Reset" class="btn btn-danger">
          <!-- <input type="submit" name="struk" value="Cetak" class="btn btn-info"> -->
        </form>
      </div>
    </div>

    <script type="text/javascript">
      var detail_barang = null;
      function hitung(){
        var kode_barcode = document.getElementsByName("kode_barcode")[0].value;
        if(kode_barcode != "")
        {
        // Jika barcode sudah terisi, maka ambil data barangnya
        axios.get("page/penjualan/ambil-detail-barang.php?kode_barcode=" + kode_barcode)
        .then(function(res){
          detail_barang = res.data;

          if(detail_barang == null)
          {
            document.getElementsByName("total_bayar")[0].value = 1;
          }
          else
          {
            document.getElementsByName("total_bayar")[0].value = detail_barang.harga_jual;
          }
          hitungSubTotal(detail_barang);
        })
      }
    }

    function hitungSubTotal(detail_barang_sekarang) {
      var jumlah = parseInt(document.getElementById('jumlah').value);
      detail_barang_sekarang.stok = parseInt(detail_barang.stok);

      // cek jumlah yang diketik apakah dibawah stok atau tidak
      if(jumlah > detail_barang_sekarang.stok)
      {
        alert("Jumlah barang melebihi stok");
        document.getElementById('jumlah').value = 0;  
      }
      else if(jumlah == 0)
      {
        alert("Jumlah barang tidak boleh kosong");
        document.getElementById('jumlah').value = 1;  
      }
      else
      {
        var total_bayar = document.getElementById('total_bayar').value * jumlah;
        var diskon = document.getElementById('diskon').value;
        var diskon_pot = parseInt(total_bayar) * parseFloat(diskon) / parseInt(100);
        if (!isNaN(diskon_pot)) {
          var potongan = document.getElementById('potongan').value = diskon_pot;
        }
        var sub_total = parseInt(total_bayar) - parseInt(potongan);
        if (!isNaN(sub_total)) {
          var s_total = document.getElementById('s_total').value = sub_total;
        }
      }
    }
    function hitungTotal(){
      var total_bayar = document.getElementsByName('total_bayar')[1].value;
      var bayar = document.getElementById('bayar').value ;
      var kembali = bayar - total_bayar;
      document.getElementById("kembali").value = kembali;
    }

    document.getElementById("bayar").addEventListener("keyup", hitungTotal)
  </script>