<?php
require 'koneksi.php';
session_start();

$conn = open_db();

if (isset($_POST["email"]) && $_POST["email"] != "" && isset($_POST["password"]) && $_POST["password"] != "") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $data = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($data);
    date_default_timezone_set('Asia/Jakarta');
    $last_login = date("Y-m-d H:i:s");

    function setFlash($message, $type) {
        $_SESSION['flash'] = [
            "message" => $message,
            "type" => $type
        ];
    }

    if ($numrows == 1) {
        $row = mysqli_fetch_assoc($data);
        if (password_verify($password, $row['password']) && $row['level'] == "admin") {
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['level'] = "admin";
            $sql = mysqli_query($conn, "UPDATE user SET last_login = '$last_login' WHERE email = '$email'");
            header("location:dashboard/index.php");
            exit();
        } else if (password_verify($password, $row['password']) && $row['level'] == "staf") {
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = "staf";
            $sql = mysqli_query($conn, "UPDATE user SET last_login = '$last_login' WHERE email = '$email'");
            header("location:staf/index.php");
            exit();
        } else {
            setFlash('Password salah!', 'danger');
            header("location:index.php");
        }
    } else {
        setFlash('Anda belum terdaftar!', 'danger');
        header("location:index.php");
    }
} else {
    setFlash('Anda harus login!', 'danger');
    header("location:index.php");
}
close_db($conn);