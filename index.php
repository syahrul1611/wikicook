<?php
session_start();
require 'function/function.php';

// register
if (isset($_POST["daftar"])) {
    if (register($_POST) > 0) {
        echo "<script>
        alert('Silahkan Login.');
        </script>";
    } else {
        echo mysqli_error($cont);
    }
}

// Login
if (isset($_POST["masuk"])) {
    global $cont;
    $username = $_POST["usernameL"];
    $password = $_POST["passwordL"];
    $result = mysqli_query($cont, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // cek session
            $_SESSION["masuk"] = true;
            $_SESSION["user"] = $_POST["usernameL"];
            echo "<script>
                        alert('Selamat Datang.');
                        document.location.href = 'index.php';
                    </script>";
            exit;
        }
    }
    $error = true;
    if (isset($error)) {
        echo "<script>
        alert('Username/Password Salah.');
        </script>";
    }
}

// ambil data resep
if (!isset($_GET['kategori'])) {
    $kategori = 'semua';
    $rows = query($kategori);
} elseif (isset($_GET['kategori'])) {
    $kategori = $_GET['kategori'];
    $rows = query($kategori);
}

// ambil data profile pengguna
if (isset($_SESSION['masuk'])) {
    $profile = queryProfile($_SESSION['user']);
}

// cari resep
if (isset($_POST["cari"])) {
    if (search($_POST["kataKunci"]) == 1) {
        echo "<script>
        alert('Resep tidak ditemukan.');
        </script>";
    } else {
        $rows = search($_POST["kataKunci"]);
    }
}

// kirim pesan dan saran
if (isset($_POST['pesan'])) {
    if (kirimPesan($_POST) > 0) {
        echo "<script>
        alert('Pesan dikirim.');
        </script>";
    }
}
?>

<!-- header -->
<?php require_once('template/header.php'); ?>
<!-- Page content -->
<div class="container-fluid" id="content-wrapper">
    <?php if (!isset($_GET['username']) && !isset($_GET['unggahResep']) && !isset($_GET['id'])) { ?>
        <?php include('halaman/recipe_list.php'); ?>
    <?php } elseif (isset($_GET['username'])) { ?>
        <?php include('halaman/profile.php'); ?>
    <?php } elseif (isset($_GET['unggahResep'])) { ?>
        <?php include('halaman/unggah.php'); ?>
    <?php } elseif (isset($_GET['id'])) { ?>
        <?php include('halaman/recipe_view.php'); ?>
    <?php } ?>
</div>
<!-- Modal -->
<?php include('halaman/modal.php'); ?>
<!-- footer -->
<?php require_once('template/footer.php'); ?>