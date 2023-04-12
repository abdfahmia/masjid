<?php
include "header.php";
?>

<section>
    <div class="container">
        <div class="row mt-2">
            <div class="mb-2">
                <button type="button" class="btn btn-primary btn-kuning">
                    <?php
                    $conn = open_db();
                    $sql = "SELECT SUM(jumlah) AS jml_pemasukan FROM pemasukan WHERE status='aktif'";
                    $retval = $conn->query($sql);
                    $data = $retval->fetch_array(MYSQLI_ASSOC);
                    $pemasukan = $data['jml_pemasukan'];

                    $sql = "SELECT SUM(jumlah) AS jml_pengeluaran FROM pengeluaran WHERE status='aktif'";
                    $retval = $conn->query($sql);
                    $data = $retval->fetch_array(MYSQLI_ASSOC);
                    $pengeluaran = $data['jml_pengeluaran'];

                    $total = number_format($pemasukan - $pengeluaran);
                    echo "Saldo Akhir = Rp. ".$total;
                    ?>
                </button>
            </div>
            <div class="mb-1">
                <table id="table" data-show-export="true" data-pagination="true" data-search="true"
                    data-pagination="true" data-side-pagination="client">
                    <thead>
                        <tr>
                            <!-- <th data-field="no" data-sortable="true">No.</th> -->
                            <th data-field="tanggal" data-sortable="true">Tanggal</th>
                            <th data-field="jenis" data-sortable="true">Jenis</th>
                            <th data-field="uraian" data-sortable="true">Uraian</th>
                            <th data-field="jumlah" data-sortable="true">Jumlah</th>
                            <th data-field="tipe" class="text-center" data-sortable="true">Tipe</th>
                        </tr>
                    </thead>
                </table>
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
            "report": "report"
        },
        dataType: 'JSON',
        success: function(response) {
            // console.log(response);
            $('#table').bootstrapTable('load', response);
            $('#table').bootstrapTable('showLoading');
            $('#table').bootstrapTable({
                exportDataType: 'all',
                exportTypes: ['excel', 'pdf'],
                data: response,
                pagination: true,
                sidePagination: 'client',
                pageSize: '10',
                pageList: '[10, 25, 50, 100, All]',
                columns: [{
                    field: 'jenis',
                    title: 'Jenis'
                }, {
                    field: 'uraian',
                    title: 'Uraian'
                }, {
                    field: 'jumlah',
                    title: 'Jumlah'
                }, {
                    field: 'tipe',
                    title: 'Tipe'
                }]
            })
        },
        complete: function() {
            $('#table').bootstrapTable('hideLoading');
        }
    });
})
</script>


<?php
include "footer.php";
?>