<?php
$kode = $_GET['kodepj'];
$id_produk = $_GET['id'];
session_start();
$index_produk = array_search($id_produk, array_column($_SESSION['penjualan'], 'kode_barcode'));

		if ($index_produk !== false) {			
			array_splice($_SESSION['penjualan'], $index_produk, 1);
		}
?>

<script type="text/javascript">
	alert("Data Berhasil di Hapus");
	window.location.href="?page=penjualan&kodepj=<?php echo $kode;?>";
</script> 