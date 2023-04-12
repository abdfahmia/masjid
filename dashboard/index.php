<?php
include "header.php";
?>

<section>
    <div class="container">
        <!-- <div class="row mt-2 g-2">
            <div class="col-md-4">
                <div class="card mb-1">
                    <div class="card-body text-info">
                        <div class="ph-item p-0 border-0 ph-row mb-0">
                            <div class="ph-col-8 big"></div>
                        </div>
                        <div class="ph-item p-0 border-0 ph-row mb-0">
                            <div class="ph-col-8 mb-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row mt-2 g-2">
            <div class="col-md-4">
                <div class="card mb-1">
                    <div class="card-body text-info">
                        <div class="loader">
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-8 big"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-8 mb-2"></div>
                            </div>
                        </div>
                        <div class="content" hidden>
                            <span class="float-start me-3">
                                <i class="fas fa-wallet fa-3x"></i>
                            </span>
                            <h4 class="mb-0" id="total">Rp. 0</h4>
                            <small class="form-text text-muted">Saldo Kas Masjid</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-1">
                    <div class="card-body text-success">
                        <div class="loader">
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-8 big"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-8 mb-2"></div>
                            </div>
                        </div>
                        <div class="content" hidden>
                            <span class="float-start me-3">
                                <i class="fas fa-cash-register fa-3x"></i>
                            </span>
                            <h4 class="mb-0" id="pemasukan">Rp. 0</h4>
                            <small class="form-text text-muted">Total Kas Masuk Bulan Ini</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-1">
                    <div class="card-body text-secondary">
                        <div class="loader">
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-8 big"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-8 mb-2"></div>
                            </div>
                        </div>
                        <div class="content" hidden>
                            <span class="float-start me-3">
                                <i class="fas fa-file-invoice-dollar fa-3x"></i>
                            </span>
                            <h4 class="mb-0" id="pengeluaran">Rp. 0</h4>
                            <small class="form-text text-muted">Total Kas Keluar Bulan Ini</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-1">
                    <div class="card-body">
                        <div class="loader">
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-4 big mx-auto"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-12 mb-0"></div>
                            </div>
                        </div>
                        <div class="content" hidden>
                            <canvas id="myChart" width="200" height="40"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-1 card-custom">
                    <div class="card-body">
                        <div class="loader">
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-10 big"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0 mt-3">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                        </div>
                        <div class="content" hidden>
                            <span class="fw-bold">Persentase Kas Masuk Bulan Ini</span>
                            <ul class="list-group list-group-flush mt-3">
                                <li class="list-group-item d-flex justify-content-between align-items-start px-0">
                                    Keropak Masjid
                                    <span class="badge bg-primary" id="keropak">10%</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start px-0">
                                    Donatur
                                    <span class="badge bg-primary" id="donatur">30%</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start px-0">
                                    Sumbangan Lainnya
                                    <span class="badge bg-primary" id="sumbangan">45%</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-1 card-custom">
                    <div class="card-body">
                        <div class="loader">
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-10 big"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0 mt-3">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                        </div>
                        <div class="content" hidden>
                            <span class="fw-bold">Persentase Kas Keluar Bulan Ini</span>
                            <ul class="list-group list-group-flush mt-3">
                                <li class="list-group-item d-flex justify-content-between align-items-start px-0">
                                    Pembangunan/Renovasi
                                    <span class="badge bg-primary" id="pembangunan">14%</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start px-0">
                                    Operasional Masjid
                                    <span class="badge bg-primary" id="operasional">20%</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start px-0">
                                    Santunan
                                    <span class="badge bg-primary" id="santunan">30%</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-1">
                    <div class="card-body text-center">
                        <?php
                            $conn = open_db();
                            $nama = $_SESSION['nama'];
                            $sql = "SELECT nama, email FROM user WHERE nama = '$nama'";
                            $retval = $conn->query($sql);
                            $row = $retval->fetch_array(MYSQLI_ASSOC);
                            $email = $row['email'];
                        ?>
                        <div class="loader">
                            <div class="ph-item ph-row p-0 border-0 mb-0 text-center">
                                <div class="ph-avatar ph-col-2 mx-auto" style="height: 60px !important;"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0 mt-3">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                            <div class="ph-item p-0 border-0 ph-row mb-0">
                                <div class="ph-col-12 big mb-2"></div>
                            </div>
                        </div>
                        <div class="content" hidden>
                            <img src="https://ui-avatars.com/api/?name=<?= $nama; ?>&background=random&rounded=true&bold=true&format=svg"
                                alt="avatars">
                            <h6 class="mt-3 fw-bold text-truncate"><?= $nama; ?></h6>
                            <p class="text-truncate"><?= $email; ?></p>
                            <div class="row g-2">
                                <div class="col-6">
                                    <button class="btn btn-secondary btn-sm w-100 text-truncate">
                                        <i class="fas fa-fingerprint me-1"></i>
                                        Ubah Password
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-secondary btn-sm w-100 text-truncate">
                                        <i class="fas fa-user me-1"></i>
                                        Admin
                                    </button>
                                </div>
                            </div>
                            <button class="btn btn-danger btn-sm col-12 mt-2"
                                onclick="window.location.href='logout.php'">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    $(function() {
        $('#table').bootstrapTable()
    })
    $.ajax({
        type: "POST",
        cache: false,
        url: "get.php",
        data: {
            "dashboard": "dashboard"
        },
        dataType: 'JSON',
        success: function(response) {
            // console.log(response);
            var len = response['chart'].length;
            var divtotal = $('#total');
            var divpemasukan = $('#pemasukan');
            var divpengeluaran = $('#pengeluaran');
            var divkeropak = $('#keropak');
            var divdonatur = $('#donatur');
            var divsumbangan = $('#sumbangan');
            var divpembangunan = $('#pembangunan');
            var divoperasional = $('#operasional');
            var divsantunan = $('#santunan');
            $('#total').empty();
            $('#pemasukan').empty();
            $('#pengeluaran').empty();
            $('#keropak').empty();
            $('#donatur').empty();
            $('#sumbangan').empty();
            $('#pembangunan').empty();
            $('#operasional').empty();
            $('#santunan').empty();
            var total = response.count[0]['total'];
            var pemasukan = response.count[0]['pemasukan'];
            var pengeluaran = response.count[0]['pengeluaran'];
            var keropak = response.count[0]['keropak'];
            var donatur = response.count[0]['donatur'];
            var sumbangan = response.count[0]['sumbangan'];
            var pembangunan = response.count[0]['pembangunan'];
            var operasional = response.count[0]['operasional'];
            var santunan = response.count[0]['santunan'];
            divtotal.append(total);
            divpemasukan.append(pemasukan);
            divpengeluaran.append(pengeluaran);
            divkeropak.append(keropak);
            divdonatur.append(donatur);
            divsumbangan.append(sumbangan);
            divpembangunan.append(pembangunan);
            divoperasional.append(operasional);
            divsantunan.append(santunan);
            for (var i = 0; i < len; i++) {
                var label_chart = response['chart'][i]['label_chart'];
                var chart_pemasukan = response['chart'][i]['chart_pemasukan'];
                var chart_pengeluaran = response['chart'][i]['chart_pengeluaran'];
                var labels = response['chart'].map(function(e) {
                    return e.label_chart;
                });
                var chart_pm = response['chart'].map(function(e) {
                    return e.chart_pemasukan;
                });
                var chart_pn = response['chart'].map(function(e) {
                    return e.chart_pengeluaran;
                });
            }
            new Chart(document.getElementById("myChart"), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        data: chart_pm,
                        label: "Pemasukan",
                        borderColor: "#3e95cd",
                        fill: false
                    }, {
                        data: chart_pn,
                        label: "Pengeluaran",
                        borderColor: "#e8c3b9",
                        fill: false
                    }]
                }
            });
        }
    });
});
</script>


<?php
include "footer.php";
?>