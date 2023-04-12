<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Kas Masjid Al-Ittihad" />
    <meta property="og:url" content="kas.alittihad.com">
    <meta property="og:description" content="Kas Masjid Al-Ittihad">
    <meta name="description" content="Kas Masjid Al-Ittihad">
    <meta name="author" content="Kelompok 2">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/placeholder-loading/dist/css/placeholder-loading.min.css">

    <title>Kas Masjid Al-Ittihad</title>
</head>

<body>
    <section style="height: 100vh;">
        <div class="container h-100">
            <div class="ph-item p-0 border-0 row justify-content-center align-items-center h-100 loader">
                <div class="col-md-8 d-none d-md-block">
                    <div class="ph-picture big" style="height: 300px;"></div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="ph-avatar w-25 mx-auto"></div>
                        <div class="ph-row mt-3">
                            <div class="ph-col-8 mx-auto mt-2 mb-4"></div>
                            <div class="ph-col-12 big mb-3"></div>
                            <div class="ph-col-12 big mb-3"></div>
                            <div class="ph-col-4 mb-3"></div>
                            <div class="ph-col-12 big mt-3"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center h-100 content" hidden>
                <div class="col-md-8 d-none d-md-block">
                    <div class="text-center">
                        <img src="assets/img/illustration.jpg" alt="illustration" width="700" height="650"
                            class="border-end">
                    </div>
                </div>
                <div class="col-md-4 mx-auto">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="text-center logo-masjid">
                                <i class="fas fa-mosque fa-2x"></i>
                            </div>
                            <h5 class="text-center mt-2 mb-4 fw-bold">Kas Masjid Al-Ittihad</h5>
                            <?php
                                if (isset($_SESSION['flash'])) {
                                    echo '<div class="alert alert-'.$_SESSION['flash']['type'].' fade show" role="alert"><i class="fas fa-exclamation-triangle me-2"></i>'.$_SESSION['flash']['message'].'</div>';
                                    unset($_SESSION['flash']);
                                }
                            ?>
                            <form action="process.php" method="POST" id="form">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Masukkan Email Anda" autocomplete="off" name="email"
                                        oninvalid="this.setCustomValidity('Email tidak valid')"
                                        onvalid="this.setCustomValidity('')">
                                    <label for="email">Email</label>
                                    <small class="text-danger email-error" hidden>
                                        Email yang Anda masukkan salah
                                    </small>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Masukkan Password Anda">
                                    <label for="password">Password</label>
                                    <small class="text-danger password-error" hidden>
                                        Password yang Anda masukkan salah
                                    </small>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" onclick="show()"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Tampilkan password
                                    </label>
                                    <span class="float-end">
                                        <a href="#" class="text-decoration-none">Lupa akun?</a>
                                    </span>
                                </div>
                                <div class="text-center d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-primary btn-custom"
                                        id="btnLogin">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <nav class="navbar fixed-bottom navbar-white bg-white">
        <div class="container">
            <div class="mx-auto">
                <small class="text-muted">&#169; 2021 - Masjid Al-Ittihad</small>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <script>
    const form = document.getElementById("form");
    const email = document.getElementById("email");
    const emailVld = document.getElementsByClassName("email-error");
    const passVld = document.getElementsByClassName("password-error");
    const pass = document.getElementById("password");
    const btnLogin = document.getElementById("btnLogin");
    let form_report = false;

    email.addEventListener('keydown', emailType);
    pass.addEventListener('keydown', passType);

    function emailType() {
        email.classList.remove("is-invalid");
        emailVld[0].setAttribute("hidden", true);
    }

    function passType() {
        pass.classList.remove("is-invalid");
        passVld[0].setAttribute("hidden", true);
    }

    btnLogin.addEventListener('click', e => {
        e.preventDefault();

        checkInputs();

        if (form_report) {
            form.submit();
        }
    });

    function checkInputs() {
        const emailValue = email.value.trim();
        const passValue = pass.value.trim();
        form_report = true;

        if (emailValue === '') {
            email.classList.add("is-invalid");
            emailVld[0].removeAttribute("hidden");
            form_report = false;
        }

        if (passValue === '') {
            pass.classList.add("is-invalid");
            passVld[0].removeAttribute("hidden");
            form_report = false;
        }
    }

    function show() {
        if (pass.type === "password") {
            pass.type = "text";
        } else {
            pass.type = "password";
        }
    }
    </script>
</body>

</html>