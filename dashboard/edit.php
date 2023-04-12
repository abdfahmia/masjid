<?php
include "header.php";
include "../assets/hashids/lib/Hashids/HashGenerator.php";
include "../assets/hashids/lib/Hashids/Hashids.php";

use Hashids\Hashids;

$hashids = new Hashids('', 20);
?>

<section>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-6 mx-auto">
                <?php
                $conn = open_db();
                $id = $_GET['id'];
                $kas = $_GET['kas'];
                $id_decode = $hashids->decode_hex($id);
                if($kas == "Masuk") {
                    $table = "pemasukan";
                } else {
                    $table = "pengeluaran";
                }
                $sql = "SELECT * FROM $table WHERE id = '$id_decode'";
                $retval = $conn->query($sql);
                $data = $retval->fetch_array(MYSQLI_ASSOC);
                $jenis = $data['jenis'];
                ?>
                <h2 class="text-center mb-3">Ubah Data Kas <?= $kas; ?></h2>
                <form action="process.php" method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label class="form-label">Jenis Pemasukan</label>
                        <select class="form-select" name="jenis" required>
                            <option value="1" <?= $jenis == '1' ? 'selected' : '' ?>>Keropak Masjid</option>
                            <option value="2" <?= $jenis == '2' ? 'selected' : '' ?>>Donatur</option>
                            <option value="2" <?= $jenis == '3' ? 'selected' : '' ?>>Sumbangan Lainnya</option>
                        </select>
                        <div class="invalid-feedback">
                            Kolom ini tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Uraian</label>
                        <textarea class="form-control" name="uraian" rows="3" placeholder="Masukkan Uraian"
                            required><?= $data['uraian']; ?></textarea>
                        <div class="invalid-feedback">
                            Kolom ini tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="text" class="form-control numeric" name="jumlah" placeholder="Masukkan Jumlah"
                            value="<?= $data['jumlah']; ?>" required>
                        <div class="invalid-feedback">
                            Kolom ini tidak boleh kosong
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="hidden" name="kas" value="<?= $kas; ?>">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-custom w-100 mt-3"
                            name="edit_kas_masuk">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

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