<script type ="text/javascript">
	function sum(){
		var harga_beli = document.getElementById('harga_beli').value;
		var harga_jual = document.getElementById('harga_jual').value;
		var result = parseInt(harga_jual) - parseInt(harga_beli);
		if (!isNaN(result)) {
			document.getElementById('profit').value = result;
		}

	}

</script>
<div class="row clearfix">
  <h1 class="mt-4">Tambah Barang</h1>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
     <div class="body">
      <form method="POST">
        <label for="">Kode Barcode</label>
        <div class="form-group">
          <div class="form-line">
            <input type="text" name="kode_barcode" class="form-control" />
          </div>
        </div>

        <label for="">Nama Barang</label>
        <div class="form-group">
          <div class="form-line">
            <input type="text" name="nama_barang" class="form-control" />
          </div>
        </div>

        <label for="">Supplier</label> <a href="?page=supplier&aksi=tambah"><i class="fas fa-plus-square"></i></a>
     <div class="form-group">
      <div class="form-line">
       <select name="id" id="nama_supplier" class="form-control" required="" >
        <option value="">-- Pilih Supplier --</option>
        <?php 
        $sql = $koneksi->query("select * from tb_supplier");
        
        while ($data = $sql->fetch_assoc()) {
         echo '<option value="'.$data['id'].'">'
         .$data['nama_supplier'].'</option>';
         
       } ?>                                 
     </select>

   </div>
 </div>

        <label for="">Satuan</label>
        <div class="form-group">
          <div class="form-line">
            <select name="satuan" class="form-control show-tick">
              <option value="">-- Pilih Satuan --</option>
             <!--  <option value="LUSIN">LUSIN</option>
              <option value="PACK">PACK</option> -->
              <option value="PCS">PCS</option>
              <option value="KG">KG</option>
              <option value="Kardus">Kardus</option>
            </select>
          </div>
        </div>

        <label for="">Stok</label>
        <div class="form-group">
          <div class="form-line">
            <input type="number" name="stok" class="form-control" />
          </div>
        </div>

        <label for="">Harga Beli</label>
        <div class="form-group">
          <div class="form-line">
            <input type="number" id="harga_beli" name="harga_beli" onkeyup="sum()" class="form-control" />
          </div>
        </div>

        <label for="">Harga Jual</label>
        <div class="form-group">
          <div class="form-line">
            <input type="number" id="harga_jual" name="harga_jual" onkeyup="sum()" class="form-control" />
          </div>
        </div>

        <label for="">Profit</label>
        <div class="form-group">
          <div class="form-line">
            <input type="number" name="profit" id="profit" readonly="" style="background-color:#e7e3e9;" value="0" class="form-control" />
          </div>
        </div>

        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
      </form>

      <?php 

      if (isset($_POST['simpan'])) {
        $kode_barcode = $_POST['kode_barcode'];
        $nama_barang = $_POST['nama_barang'];
        $id = $_POST['id'];
        $satuan = $_POST['satuan'];
        $stok = $_POST['stok'];
        $harga_beli = $_POST['harga_beli'];
        $harga_jual = $_POST['harga_jual'];
        $profit = $_POST['profit'];


        $sql2 = $koneksi->query("insert into tb_barang (kode_barcode,nama_barang,id, satuan,stok,harga_beli,harga_jual,profit) values('$kode_barcode','$nama_barang','$id','$satuan','$stok','$harga_beli','$harga_jual','$profit')");

        if ($sql2) {
         ?>

         <script type="text/javascript">
          alert("Data Berhasil di Simpan");
          window.location.href="?page=barang";
        </script>


        <?php
      }
    }
    ?>
