<?php
$kode = $_GET['kodebl'];
$id_produk = $_GET['id'];
session_start();
$index_produk = array_search($id_produk, array_column($_SESSION['pembelian'], 'kode_barcode'));

		if ($index_produk !== false) {			
			array_splice($_SESSION['pembelian'], $index_produk, 1);
		}
?>

<script type="text/javascript">
	alert("Data Berhasil di Hapus");
	window.location.href="?page=pembelian&aksi=tambah&kodebl=<?php echo $kode?>";
</script> 