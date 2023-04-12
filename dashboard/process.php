<?php
include "../koneksi.php";
include "../assets/hashids/lib/Hashids/HashGenerator.php";
include "../assets/hashids/lib/Hashids/Hashids.php";

use Hashids\Hashids;

$hashids = new Hashids('', 20);
session_start();

$conn = open_db();

    function setFlash($message, $type, $icon) {
        $_SESSION['flash'] = [
            "message" => $message,
            "type" => $type,
            "icon" => $icon
        ];
    }

if(isset($_POST['simpan_kas_masuk'])) {
    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
    $uraian = mysqli_real_escape_string($conn, $_POST['uraian']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);
    

    $jenis = htmlspecialchars($jenis, ENT_QUOTES);
    $uraian = htmlspecialchars($uraian, ENT_QUOTES);
    $jumlah = htmlspecialchars($jumlah, ENT_QUOTES);
    $jumlah = str_replace(',', '', $jumlah);

    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date("d");
    $bulan = date("m");
    $tahun = date("Y");
    $status = "aktif";

    $sql = "INSERT INTO pemasukan (tanggal, bulan, tahun, jenis, uraian, jumlah, status) VALUES ('$tanggal','$bulan','$tahun','$jenis','$uraian','$jumlah','$status')";
    $results = $conn->query($sql);
    setFlash('Berhasil menambahkan kas masuk!', 'success', 'fas fa-thumbs-up');
    header("location:income.php");
    
} else if(isset($_POST['edit_kas_masuk'])) {
    $id = $_POST['id'];
    $id = $hashids->decode_hex($id);
    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
    $uraian = mysqli_real_escape_string($conn, $_POST['uraian']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);

    $kas = $_POST['kas'];

    if($kas == "Masuk") {
        $url = "income.php";
        $table = "pemasukan";
    } else {
        $url = "outcome.php";
        $table = "pengeluaran";
    }

    $jenis = htmlspecialchars($jenis, ENT_QUOTES);
    $uraian = htmlspecialchars($uraian, ENT_QUOTES);
    $jumlah = htmlspecialchars($jumlah, ENT_QUOTES);
    $jumlah = str_replace(',', '', $jumlah);

    $sql = mysqli_query($conn, "UPDATE $table SET jenis='$jenis', uraian='$uraian', jumlah='$jumlah' WHERE id='$id'");

    

    setFlash('Berhasil mengubah data!', 'success', 'fas fa-thumbs-up');
    header("location:$url");

} else if(isset($_POST['hapus_kas_masuk'])) {
    $id = $_POST['id'];
    $id = $hashids->decode_hex($id);
    $kas = $_POST['kas'];

    if($kas == "Masuk") {
        $url = "income.php";
    } else {
        $url = "outcome.php";
    }

    $status = "hapus";

    $sql = mysqli_query($conn, "UPDATE pemasukan SET status='$status' WHERE id='$id'");

    setFlash('Berhasil menghapus data!', 'success', 'fas fa-thumbs-up');
    header("location:$kas");
} else if(isset($_POST['simpan_kas_keluar'])) {
    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
    $uraian = mysqli_real_escape_string($conn, $_POST['uraian']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);

    $jenis = htmlspecialchars($jenis, ENT_QUOTES);
    $uraian = htmlspecialchars($uraian, ENT_QUOTES);
    $jumlah = htmlspecialchars($jumlah, ENT_QUOTES);
    $jumlah = str_replace(',', '', $jumlah);

    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date("d");
    $bulan = date("m");
    $tahun = date("Y");
    $status = "aktif";

    $sql = "INSERT INTO pengeluaran (tanggal, bulan, tahun, jenis, uraian, jumlah, status) VALUES ('$tanggal','$bulan','$tahun','$jenis','$uraian','$jumlah','$status')";
    $results = $conn->query($sql);
    setFlash('Berhasil menambahkan kas keluar!', 'success', 'fas fa-thumbs-up');
    header("location:outcome.php");
} else {
    setFlash('Koneksi Gagal!', 'danger', 'fas fa-exclamation-triangle');
    header("location:index.php");
}

close_db($conn);

?>