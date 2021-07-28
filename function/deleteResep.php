<?php
session_start();
if (!isset($_GET["id"])) {
        header("location:index.php");
        exit;
}

require('function.php');

// ambil data
$id = $_GET["id"];
$foto = $_GET['f'];

// user session
$user = $_SESSION['user'];
// username publisher
$username = queryResep($id)[0]['username'];

if ($user === $username) {
        // function
        if (deleteResep($id) > 0) {
                $query = "DELETE FROM komen WHERE idResep = '$id'";
                mysqli_query($cont, $query);
                unlink('../img/recipe/'. $user .'/'.$foto);
                echo "<script>
                        alert('Resep dihapus.');
                        document.location.href = '../index.php';
                        </script>";
        } else {
                echo "<script>
                        alert('Resep gagal dihapus.');
                        document.location.href = '../index.php';
                </script>";
        }
} else {
        header("location:../index.php");
        exit;
}