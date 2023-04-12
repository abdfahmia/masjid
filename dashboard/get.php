<?php
    require "../koneksi.php";
    include "../assets/hashids/lib/Hashids/HashGenerator.php";
    include "../assets/hashids/lib/Hashids/Hashids.php";

    use Hashids\Hashids;

    $hashids = new Hashids('', 20);

    $conn = open_db();
    
if(isset($_POST['income'])) {
    $result_array = array();
    $sql = "SELECT p.id, p.tanggal, p.bulan, p.tahun, p.uraian, p.jumlah, jp.jenis FROM pemasukan AS p INNER JOIN jenis_pemasukan AS jp ON p.jenis = jp.id WHERE p.status = 'aktif'";
    $retval = $conn->query($sql);
    $array_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $i = 0;
    while ($data = $retval->fetch_array(MYSQLI_ASSOC)) {
        $id = $data['id'];
        $id = $hashids->encode_hex($id);
        $tanggal = $data['tanggal'];
        $bulan = (int)$data['bulan'];
        $tahun = $data['tahun'];
        $tanggal = $tanggal." ".$array_bulan[$bulan]." ".$tahun;
        $jenis = $data['jenis'];
        $uraian = $data['uraian'];
        $kas = "Masuk";
        $jumlah = $data['jumlah'];
        $jumlah = number_format($jumlah);
        $aksi = '<a href="edit.php?id='.$id.'&kas='.$kas.'" class="btn btn-secondary btn-sm me-2">Edit</a><form action="process.php" method="POST" class="d-inline"><input type="hidden" name="id" value="'.$id.'"><button type="submit" class="btn btn-danger btn-sm" name="hapus_kas_masuk">Hapus</button></form>';
        $i++;
        $result_array[] = array(
            "no" => $i,
            "tanggal" => $tanggal,
            "jenis" => $jenis,
            "uraian" => $uraian,
            "jumlah" => "Rp. ".$jumlah,
            "aksi" => $aksi,
        );
    }
    echo json_encode($result_array);
} else if(isset($_POST['outcome'])) {
    $result_array = array();
    $sql = "SELECT p.id, p.tanggal, p.bulan, p.tahun, p.uraian, p.jumlah, jp.jenis FROM pengeluaran AS p INNER JOIN jenis_pengeluaran AS jp ON p.jenis = jp.id WHERE p.status = 'aktif'";
    $retval = $conn->query($sql);
    $array_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $i = 0;
    while ($data = $retval->fetch_array(MYSQLI_ASSOC)) {
        $id = $data['id'];
        $id = $hashids->encode_hex($id);
        $tanggal = $data['tanggal'];
        $bulan = (int)$data['bulan'];
        $tahun = $data['tahun'];
        $tanggal = $tanggal." ".$array_bulan[$bulan]." ".$tahun;
        $jenis = $data['jenis'];
        $uraian = $data['uraian'];
        $kas = "Keluar";
        $jumlah = $data['jumlah'];
        $jumlah = number_format($jumlah);
        $aksi = '<a href="edit.php?id='.$id.'&kas='.$kas.'" class="btn btn-secondary btn-sm me-2">Edit</a><form action="process.php" method="POST" class="d-inline"><input type="hidden" name="id" value="'.$id.'"><button type="submit" class="btn btn-danger btn-sm" name="hapus_kas_masuk">Hapus</button></form>';
        $i++;
        $result_array[] = array(
            "no" => $i,
            "tanggal" => $tanggal,
            "jenis" => $jenis,
            "uraian" => $uraian,
            "jumlah" => "Rp. ".$jumlah,
            "aksi" => $aksi,
        );
    }
    echo json_encode($result_array);
} else if(isset($_POST['report'])) {
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
} else if(isset($_POST['dashboard'])) {
    $result_array = array();
    $result_array2 = array();

    date_default_timezone_set('Asia/Jakarta');
    $tahun = date("Y");
    $bulan = date("m");

    $sql = "SELECT SUM(jumlah) AS jml_pemasukan FROM pemasukan WHERE status='aktif'";
    $retval = $conn->query($sql);
    $data = $retval->fetch_array(MYSQLI_ASSOC);
    $pemasukan = $data['jml_pemasukan'];

    $sql = "SELECT SUM(jumlah) AS jml_pengeluaran FROM pengeluaran WHERE status='aktif'";
    $retval = $conn->query($sql);
    $data = $retval->fetch_array(MYSQLI_ASSOC);
    $pengeluaran = $data['jml_pengeluaran'];

    $total = $pemasukan - $pengeluaran;

    $sql = "SELECT SUM(jumlah) AS total_pemasukan FROM pemasukan WHERE bulan = '$bulan' AND tahun = '$tahun' AND status='aktif'";
    $retval = $conn->query($sql);
    $data = $retval->fetch_array(MYSQLI_ASSOC);
    $total_pemasukan = $data['total_pemasukan'];
    if($total_pemasukan > 0) {
        $total_pemasukan = $data['total_pemasukan'];
    }

    $sql = "SELECT SUM(jumlah) AS keropak FROM pemasukan WHERE bulan = '$bulan' AND tahun = '$tahun' AND jenis = '1' AND status='aktif'";
    $retval = $conn->query($sql);
    $data = $retval->fetch_array(MYSQLI_ASSOC);
    $keropak = $data['keropak'];
    if($keropak > 0) {
        $keropak = $data['keropak'];
        $keropak = round(($keropak / $total_pemasukan) * 100, 0)."%";
    }

    $sql = "SELECT SUM(jumlah) AS donatur FROM pemasukan WHERE bulan = '$bulan' AND tahun = '$tahun' AND jenis = '2' AND status='aktif'";
    $retval = $conn->query($sql);
    $data = $retval->fetch_array(MYSQLI_ASSOC);
    $donatur = $data['donatur'];
    if($donatur > 0) {
        $donatur = $data['donatur'];
        $donatur = round(($donatur / $total_pemasukan) * 100, 0)."%";
    }

    $sql = "SELECT SUM(jumlah) AS sumbangan FROM pemasukan WHERE bulan = '$bulan' AND tahun = '$tahun' AND jenis = '3' AND status='aktif'";
    $retval = $conn->query($sql);
    $data = $retval->fetch_array(MYSQLI_ASSOC);
    $sumbangan = $data['sumbangan'];
    if($sumbangan > 0) {
        $sumbangan = $data['sumbangan'];
        $sumbangan = round(($sumbangan / $total_pemasukan) * 100, 0)."%";
    }

    $sql = "SELECT SUM(jumlah) AS total_pengeluaran FROM pengeluaran WHERE bulan = '$bulan' AND tahun = '$tahun' AND status='aktif'";
    $retval = $conn->query($sql);
    $data = $retval->fetch_array(MYSQLI_ASSOC);
    $total_pengeluaran = $data['total_pengeluaran'];
    if($total_pengeluaran > 0) {
        $total_pengeluaran = $data['total_pengeluaran'];
    }

    $sql = "SELECT SUM(jumlah) AS pembangunan FROM pengeluaran WHERE bulan = '$bulan' AND tahun = '$tahun' AND jenis = '1' AND status='aktif'";
    $retval = $conn->query($sql);
    $data = $retval->fetch_array(MYSQLI_ASSOC);
    $pembangunan = $data['pembangunan'];
    if($pembangunan > 0) {
        $pembangunan = $data['pembangunan'];
        $pembangunan = round(($pembangunan / $total_pengeluaran) * 100, 0)."%";
    }

    $sql = "SELECT SUM(jumlah) AS operasional FROM pengeluaran WHERE bulan = '$bulan' AND tahun = '$tahun' AND jenis = '2' AND status='aktif'";
    $retval = $conn->query($sql);
    $data = $retval->fetch_array(MYSQLI_ASSOC);
    $operasional = $data['operasional'];
    if($operasional > 0) {
        $operasional = $data['operasional'];
        $operasional = round(($operasional / $total_pengeluaran) * 100, 0)."%";
    }

    $sql = "SELECT SUM(jumlah) AS santunan FROM pengeluaran WHERE bulan = '$bulan' AND tahun = '$tahun' AND jenis = '3' AND status='aktif'";
    $retval = $conn->query($sql);
    $data = $retval->fetch_array(MYSQLI_ASSOC);
    $santunan = $data['santunan'];
    if($santunan > 0) {
        $santunan = $data['santunan'];
        $santunan = round(($santunan / $total_pengeluaran) * 100, 0)."%";
    }

    $result_array[] = array(
        "total" => "Rp. ".number_format($total),
        "pemasukan" => "Rp. ".number_format($pemasukan),
        "pengeluaran" => "Rp. ".number_format($pengeluaran),
        "keropak" => $keropak == NULL ? "0%" : $keropak,
        "donatur" => $donatur == NULL ? "0%" : $donatur,
        "sumbangan" => $sumbangan == NULL ? "0%" : $sumbangan,
        "pembangunan" => $pembangunan == NULL ? "0%" : $pembangunan,
        "operasional" => $operasional == NULL ? "0%" : $operasional,
        "santunan" => $santunan == NULL ? "0%" : $santunan,
    );

    $sql = "SELECT DISTINCT bulan FROM pemasukan WHERE tahun = '$tahun' ORDER BY bulan ASC";
    $retval = $conn->query($sql);
    $array_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    while ($data = $retval->fetch_array(MYSQLI_ASSOC)) {
        $bulan = $data['bulan'];
        $bulan_int = (int)$data['bulan'];
        $bulan_desc = $array_bulan[$bulan_int] . " " . $tahun;

        $sql1 = "SELECT SUM(jumlah) AS chart_pemasukan FROM pemasukan WHERE bulan = '$bulan' AND tahun = '$tahun' AND status = 'aktif'";
        $retval1 = $conn->query($sql1);
        while ($data1 = $retval1->fetch_array(MYSQLI_ASSOC)) {
            $chart_pemasukan = $data1['chart_pemasukan'] == NULL ? '0' : $chart_pemasukan = $data1['chart_pemasukan'];
        }

        $sql2 = "SELECT SUM(jumlah) AS chart_pengeluaran FROM pengeluaran WHERE bulan = '$bulan' AND tahun = '$tahun' AND status = 'aktif'";
        $retval2 = $conn->query($sql2);
        while ($data2 = $retval2->fetch_array(MYSQLI_ASSOC)) {
            $chart_pengeluaran = $data2['chart_pengeluaran'] == NULL ? '0' : $chart_pengeluaran = $data2['chart_pengeluaran'];
        }

        $result_array2[] = array(
            "label_chart" => $bulan_desc,
            "chart_pemasukan" => $chart_pemasukan,
            "chart_pengeluaran" => $chart_pengeluaran
        );
    }
    
    echo json_encode(array("count" => $result_array, "chart" => $result_array2));
} else {
    header("location:index.php");
}

close_db($conn);

?>