<?php
include "header.php";
?>

<section>
    <div class="container">
        <div class="row mt-2">
            <?php
                if (isset($_SESSION['flash'])) {
                    echo '<div class="alert alert-'.$_SESSION['flash']['type'].' fade show" role="alert"><i class="fas fa-exclamation-triangle me-2"></i>'.$_SESSION['flash']['message'].'</div>';
                    unset($_SESSION['flash']);
                }
            ?>
            <div class="mb-2">
                <button type="button" class="btn btn-primary btn-kuning" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    Tambah Kas Masuk
                </button>
                <button type="button" class="btn btn-primary btn-kuning">
                    <?php
                    $conn = open_db();
                    $sql = "SELECT SUM(jumlah) AS total FROM pemasukan WHERE status='aktif'";
                    $retval = $conn->query($sql);
                    $data = $retval->fetch_array(MYSQLI_ASSOC);
                    $total = $data['total'];
                    $total = number_format($total);
                    echo "Total Kas Masuk = Rp. ".$total;
                    ?>
                </button>
            </div>
            <div class="mb-1">
                <table id="table" data-show-export="true" data-pagination="true" data-search="true"
                    data-pagination="true" data-side-pagination="client">
                    <thead>
                        <tr>
                            <th data-field="no" data-sortable="true">No.</th>
                            <th data-field="tanggal" data-sortable="true">Tanggal</th>
                            <th data-field="jenis" data-sortable="true">Jenis</th>
                            <th data-field="uraian" data-sortable="true">Uraian</th>
                            <th data-field="jumlah" data-sortable="true">Jumlah</th>
                            <th data-field="aksi" data-sortable="true">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Kas Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="process.php" method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label class="form-label">Jenis Pemasukan</label>
                        <select class="form-select" name="jenis" required>
                            <option value="" selected hidden disabled>-- Pilih salah satu --</option>
                            <option value="1">Keropak Masjid</option>
                            <option value="2">Donatur</option>
                            <option value="3">Sumbangan Lainnya</option>
                        </select>
                        <div class="invalid-feedback">
                            Kolom ini tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Uraian</label>
                        <textarea class="form-control" name="uraian" rows="3" placeholder="Masukkan Uraian"
                            required></textarea>
                        <div class="invalid-feedback">
                            Kolom ini tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="text" class="form-control numeric" name="jumlah" placeholder="Masukkan Jumlah"
                            required>
                        <div class="invalid-feedback">
                            Kolom ini tidak boleh kosong
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary" name="simpan_kas_masuk">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
})()

$(document).ready(function() {
    $(function() {
        $('#table').bootstrapTable()
    })
    $.ajax({
        type: "POST",
        cache: false,
        url: "get.php",
        data: {
            "income": "income"
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
                    field: 'no',
                    title: 'No.'
                }, {
                    field: 'jenis',
                    title: 'Jenis'
                }, {
                    field: 'uraian',
                    title: 'Uraian'
                }, {
                    field: 'jumlah',
                    title: 'Jumlah'
                }, {
                    field: 'aksi',
                    title: 'Aksi'
                }]
            })
        },
        complete: function() {
            $('#table').bootstrapTable('hideLoading');
        }
    });
})

$('.numeric').keypress(function(e) {
    var x = event.charCode || event.keyCode;
    if (isNaN(String.fromCharCode(e.which)) && x != 46 || x === 32 || x === 13 || (x === 46 && event
            .currentTarget)) e.preventDefault();
});

$(function() {
    $('.numeric').number(true, 0);
    $('.numeric').on('change', function() {
        var val = $('.numeric').val();
    });
});
</script>


<?php
include "footer.php";
?>