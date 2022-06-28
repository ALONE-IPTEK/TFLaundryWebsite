
<?php
// @ini_set('display_errors', 0);
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:login.php'); 
}
else { 
    $usr = $_SESSION['username']; 
}
require ("lib/fpdf/fpdf.php");
require("lib/lib-function.php");
require("../koneksi.php");
$query = mysqli_query($conn, "SELECT * FROM transaksi WHERE id='$_GET[id]'");
$hasil = mysqli_fetch_array($query);
$hhh=$hasil['pengguna'];
$query2 = mysqli_query($conn, "SELECT * FROM pengguna WHERE username='$hhh'");
$hasil2 = mysqli_fetch_array($query2);

function TanggalIndo($date){
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);
 
	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
	return($result);
}
Class Kwitansi extends FPDF
{
	var $tanggal,$kwnums,$admins,$notevalid,$pt,$headerCo,$headerAddr,$headerTel;
	/* Header Kwitansi */
	function Header(){
		$this->SetFont('Arial','B',12);
		$this->Cell(40,7,$this->headerCo,0,1,'L');
		$this->SetFont('Arial','B',11);
		$this->Cell(0,7,$this->headerAddr,0,1,'L');
		$this->Cell(120,7,$this->headerTel,0,0,'L');
		$this->SetFont('Arial','',12);
		$this->Cell(28,7,'',0,0,'L');
		$this->SetFont('Courier','',12);
		$this->Cell(0,7,'',0,1,'L');
		$this->SetFillColor(95, 95, 95);
		$this->Rect(5, 27.5, 198, 3, 'FD');
	}
	/* Footer Kwitansi*/
	function Footer(){
		$this->SetY(-47);
		$this->Ln(18);
		$this->Cell(90);
		$this->SetFont('Courier','B',12);
		$this->Cell(0,-2,$this->admins,0,1,'C');
		$this->Ln(5);
		$this->SetFont('Arial','I',10);
		$this->Cell(0,6,$this->notevalid,0,1,'R');
		
	}
	function setHeaderParam($pt,$jl,$tel){
		$this->headerCo=$pt;
		$this->headerAddr=$jl;
		$this->headerTel=$tel;
		}
	function setAdmins($admins){$this->admins=$admins;}
	function setValidasi($word){$this->notevalid=$word;}
}
/*Deklarasi variable untuk cetak*/

$pt='T & F LAUNDRY';
$jl='Jl. Taman Toram 10';
$tel='0813-8320-5359';
$cash=$hasil['jumlah'];
$nota=$hasil['nota'];
$pembayar=$hasil['konsumen'];
$tglambil= TanggalIndo($hasil['tgl_ambil']);
$tgltransaksi= TanggalIndo($hasil['tgl_transaksi']);

$admins='T&F Laundry';
$payment=$hasil['jenis'];
$payment2=$hasil['jenis2'];
$payment3=$hasil['jenis3'];
$berat=$hasil['berat'];
$kg=$hasil['kg'];
$pcs=$hasil['pcs'];

$notevalid='*Syarat & Ketentuan Berlaku..!';
/*parameter kertas*/
$pdf=new Kwitansi('P','mm','A5');
$fungsi=new Fungsi();
/* Retrieve No. Kwitansi*/
/*Persiapan Parameter*/
$pdf->setAdmins($admins);
$pdf->setValidasi($notevalid);
$pdf->setHeaderParam($pt,$jl,$tel);
/* Bagian di mana inti dari kwitansi berada*/
$pdf->setMargins(7,5,5);
$pdf->AddPage();
$pdf->SetLineWidth(0.6);
$pdf->Ln(10);
$pdf->Cell(-7);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,8,'No. Nota  : ',0,0,'R');
$pdf->SetFont('Courier','',14);
$pdf->Cell(16,8,$nota,0,1,'L');
$pdf->SetFont('Arial','B',14);

$pdf->Ln(1);
$pdf->Cell(-7);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,8,'Terima Dari  : ',0,0,'R');
$pdf->SetFont('Courier','',14);
$pdf->Cell(16,8,$pembayar,0,1,'L');
$pdf->SetFont('Arial','B',14);



$pdf->SetFont('Arial','B',14);
$pdf->SetY(55);
$pdf->Cell(10);
$pdf->Cell(40,8,'Untuk Pembayaran  : ',0,0,'R');
$pdf->SetFont('Courier','',12);
$pdf->SetY(-148);
$pdf->Cell(10);
$pdf->MultiCell(120,8,$payment,2,'L');

$pdf->SetY(-137);
$pdf->Cell(35);
$pdf->MultiCell(10,2,$kg,$berat,0,0,'R');



$pdf->SetFont('Arial','B',14);
$pdf->SetY(78);
$pdf->Cell(10);
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,$payment2,0,'L');
$pdf->SetY(85);
$pdf->Cell(10);
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,$payment3,0,'L');

$pdf->SetFont('Arial','B',14);
$pdf->SetY(90);
$pdf->Cell(-2);
$pdf->Cell(40,20,'Tanggal Ambil  : ',0,0,'R');
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,20,$tglambil,0,'L');
$pdf->SetY(120);
$pdf->SetFont('Courier','B','16');
$pdf->Cell(60,12,'Rp '.$fungsi->Ribuan($cash),1,0,'C');
$pdf->SetY(135);
$pdf->Cell(2);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,'###'.$fungsi->Terbilang($cash).' RUPIAH ###',0,'L');
$pdf->SetAuthor('https://www.sityoy.com',true);
$pdf->SetY(-40);
$pdf->SetFont('Courier','',12);
$pdf->Cell(90);
$pdf->Cell(0,6,$tgltransaksi,0,1,'C');
$pdf->Ln(10);
$pdf->Output();
?>
<title>Kwitansi Pembayaran</title>