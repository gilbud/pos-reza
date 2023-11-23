<?php
class penjualan_proses
{	
	function __construct()
	{
		session_start();

		if (isset($_COOKIE['penjualan'])) {
			$_SESSION['penjualan'] = json_decode($_COOKIE['penjualan'], true);
		}
	}

	public function tambahkan_penjualan()
	{
		if (!isset($_SESSION['penjualan'])) {
			$_SESSION['penjualan'] = array();
		} else {
			$index_produk = array_search($_GET['kode_barcode'], array_column($_SESSION['penjualan'], 'kode_barcode'));
		}

		if (count($_SESSION['penjualan']) == 0 || $index_produk === false) {
			$penjualan_baru = [
				'kode_barcode' => $_GET['id_produk'],
				'nama_produk' => $_GET['nama_produk'],
				'harga_produk' => $_GET['harga_produk'],
				'jumlah' => $_POST['jumlah'],
			];

			$_SESSION['pesanan'][] = $pesanan_baru;
		} else {
			$jum=$_SESSION['pesanan'][$index_produk]['jumlah']+$_POST['jumlah'];
			$_SESSION['pesanan'][$index_produk]['jumlah']=$jum;
		}

		setcookie("pesanan", json_encode($_SESSION['pesanan']), strtotime('+7 days'), '/');

		header('Location: http://localhost/FINALPROJECT1/pesanan.php');
		exit();
	}

	public function hapus_pesanan($id_produk)
	{
		$index_produk = array_search($id_produk, array_column($_SESSION['pesanan'], 'id_produk'));

		if ($index_produk !== false) {			
			array_splice($_SESSION['pesanan'], $index_produk, 1);
		}	

		setcookie("pesanan", json_encode($_SESSION['pesanan']), strtotime('+7 days'), '/');	

		header('Location: http://localhost/FINALPROJECT1/pesanan.php');
		exit();	
	}
}
?>

<?php
$proses_k = new pesanan_proses();

if ($_GET['aksi'] == 'hapus') {
	$proses_k->hapus_pesanan($_GET['id_produk']);
} else {
	$proses_k->tambahkan_pesanan();
}

?>