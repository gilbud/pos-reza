<?php
//session_start();
//ob_start();
include_once("../../koneksi.php"); 
?>
<html>
<head>
  <title>LAPORAN RETUR PEMBELIAN</title>
</head>
<body>

  <center>

    <h2>LAPORAN RETUR PEMBELIAN</h2>
    
  </center>
  <?php
  $nama_bulan=$_POST['bulan'];
  echo '<b>Data Transaksi Bulan '.$nama_bulan.' </b><br /><br />';

  ?>
  
  
  <table border="1" style="width: 100%">
    <tr>
      <th width="1%">No</th>
      <th>Kode Retur</th>
      <th>Tanggal Retur</th>
      <th>Nama Supplier</th>
      <th>Nama Barang</th>
      <th>Jumlah Retur</th>
      <th>Status</th>
      <th>Keterangan</th>
    </tr>
    <?php
    $no = 1;

    $sql = $koneksi->query("SELECT r.*, brg.* FROM tb_retur r JOIN tb_barang brg ON r.kode_barcode = brg.kode_barcode WHERE tanggal_retur LIKE '%$_POST[bulan]%' ");


    while($data = mysqli_fetch_array($sql)){


      ?>
      <tr>
       <td><?php echo $no++;?></td>
       <td><?php echo $data['kode_retur']?></td>
       <td><?php echo $data['tanggal_retur']?></td>
       <td><?php echo $data['nama_supplier']?></td>
       <td><?php echo $data['nama_barang']?></td>
       <td><?php echo $data['jumlah_retur']?></td>
       <td><?php echo $data['status']?></td>
       <td><?php echo $data['keterangan']?></td>
       


     </tr>
     <?php 
     
   } 
   ?>

   
 </table>
 <p><br>
  <div align="right" >Pimpinan </div><p></br>
    <div align="right">Lely Reza</div>
    <script>
      window.print();
    </script>
    
  </body>
  </html>


