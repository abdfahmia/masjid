<?php
    include "../koneksi.php";
    include "../assets/hashids/lib/Hashids/HashGenerator.php";
    include "../assets/hashids/lib/Hashids/Hashids.php";

    use Hashids\Hashids;

    $hashids = new Hashids('', 20);
    $conn = open_db();
    $result_array = array();

    $sql = "SELECT p.tanggal, p.bulan, p.tahun, p.uraian, p.jumlah, jp.jenis FROM pemasukan AS p INNER JOIN jenis_pemasukan AS jp ON p.jenis = jp.id WHERE p.status = 'aktif'";
    $array_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $retval = $conn->query($sql);
    while ($data = $retval->fetch_array(MYSQLI_ASSOC)) {
        $tanggal = $data['tanggal'];
        $bulan = (int)$data['bulan'];
        $tahun = $data['tahun'];
        $tanggal = $tanggal." ".$array_bulan[$bulan]." ".$tahun;
        $jenis = $data['jenis'];
        $uraian = $data['uraian'];
        $jumlah = $data['jumlah'];
        $jumlah = number_format($jumlah);
        $tipe = '<span class="text-primary">Pemasukan</span>';
        $result_array[] = array(
            "tanggal" => $tanggal,
            "jenis" => $jenis,
            "uraian" => $uraian,
            "jumlah" => "Rp. ".$jumlah,
            "tipe" => $tipe,
        );
    }

    $sql = "SELECT p.tanggal, p.bulan, p.tahun, p.uraian, p.jumlah, jp.jenis FROM pengeluaran AS p INNER JOIN jenis_pengeluaran AS jp ON p.jenis = jp.id WHERE p.status = 'aktif'";
    $retval = $conn->query($sql);
    while ($data = $retval->fetch_array(MYSQLI_ASSOC)) {
        $tanggal = $data['tanggal'];
        $bulan = (int)$data['bulan'];
        $tahun = $data['tahun'];
        $tanggal = $tanggal." ".$array_bulan[$bulan]." ".$tahun;
        $jenis = $data['jenis'];
        $uraian = $data['uraian'];
        $jumlah = $data['jumlah'];
        $jumlah = number_format($jumlah);
        $tipe = '<span class="text-danger">Pengeluaran</span>';
        $result_array[] = array(
            "tanggal" => $tanggal,
            "jenis" => $jenis,
            "uraian" => $uraian,
            "jumlah" => "Rp. ".$jumlah,
            "tipe" => $tipe,
        );
    }
    echo json_encode($result_array);

    close_db($conn);
?>