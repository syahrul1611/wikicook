<?php
session_start();
if (!isset($_GET["id"])) {
    header("location:index.php");
    exit;
}

// user session
$user = $_SESSION['user']; 
// get username
$username = $_GET['username'];

if ($user === $username) {
    // function
    require 'function.php';
    $id = $_GET["id"];
    $foto = $_GET['f'];

    if (deleteProfile($id) > 0) {
        if ($foto != 'default.png') {
            unlink('../img/profile/'.$foto);
            rmdir('../img/recipe/'.$user);
            echo "<script>
                alert('Akun dihapus.');
                document.location.href = 'logout.php';
                </script>";
        } else {
            rmdir('../img/recipe/'.$user);
            echo "<script>
                alert('Akun dihapus.');
                document.location.href = 'logout.php';
                </script>";
        }
    } else {
            echo "<script>
                    alert('Akun gagal dihapus.');
                    document.location.href = 'logout.php';
            </script>";
    }
} else {
    header("location:../index.php");
    exit;
}

