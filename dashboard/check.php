<?php
require '../koneksi.php';
session_start();

function setFlash($message, $type) {
    $_SESSION['flash'] = [
        "message" => $message,
        "type" => $type
    ];
}
    
if ($_SESSION['level'] != "admin") {
    setFlash('Anda harus login!', 'danger');
    header("location:../index.php");
}