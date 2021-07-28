<?php
session_start();
require '../function/cont.php';
require '../function/function.php';

if (isset($_POST['masukAdmin'])) {
    global $cont;
    $id = $_POST["idAdmin"];
    $pass = $_POST["passAdmin"];
    $result = mysqli_query($cont, "SELECT * FROM admin WHERE username = '$id'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row["password"])) {
            // cek session
            $_SESSION["adminMasuk"] = true;
            echo "<script>
                        alert('Selamat Datang Admin');
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

if (isset($_GET['logout'])) {
    unset($_SESSION["adminMasuk"]);
}

// query user profile
function queryUser(){
    global $cont;
    $queryUser = "SELECT * FROM user";
    $resultUser = mysqli_query($cont, $queryUser);
    $users = [];
    while ($user = mysqli_fetch_assoc($resultUser)) {
        $users[] = $user;
    }
    return $users;
}
// query pesan dan kesan
function queryPesan() {
    global $cont;
    $queryPesan = "SELECT * FROM pesan";
    $resultPesan = mysqli_query($cont, $queryPesan);
    $pesan = [];
    while ($saran = mysqli_fetch_assoc($resultPesan)) {
        $pesan[] = $saran;
    }
    return $pesan;
}

if (isset($_GET['id'])) {
    $id = $_GET["id"];
    $foto = $_GET['f'];
    $user = $_GET['username'];
    if (deleteProfile($id) > 0) {
        if ($foto != 'default.png') {
            unlink('../img/profile/'.$foto);
            rmdir('../img/recipe/'.$user);
            echo "<script>
                alert('Akun dihapus.');
                document.location.href = 'index.php';
                </scri>";
        } else {
            rmdir('../img/recipe/'.$user);
            echo "<script>
                alert('Akun dihapus.');
                document.location.href = 'index.php';
                </script>";
        }
    } else {
            echo "<script>
                    alert('Akun gagal dihapus.');
                    document.location.href = 'index.php';
            </script>";
    }
}

$rowUser = queryUser();
$rowPesan = queryPesan();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome.min.css"/>
    <script src="https://kit.fontawesome.com/c8e0e145f0.js" crossorigin="anonymous"></script>

    <title>Document</title>

    <script>
        function confirmDelete(delUrl) {
            if (confirm("Yakin hapus akun?")) {
            document.location = delUrl;
            }
        }
    </script>
</head>
<body>
    <?php if (!isset($_SESSION['adminMasuk'])) { ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label" for="username">Username:</label>
                <input class="form-control" id="username" type="text" name="idAdmin" placeholder="Fulan">
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password:</label>
                <input class="form-control" id="password" type="password" name="passAdmin" placeholder="******">
            </div>
            <a type="button" class="btn btn-secondary" href="../index.php">Batal</a>
            <button type="submit" name="masukAdmin" class="btn btn-primary">Masuk</button>
        </form>
    <?php } elseif (isset($_SESSION['adminMasuk'])) { ?>
        <a href="index.php?logout" class="btn btn-danger" style="margin:5px;">Keluar</a>
        <!-- daftar user -->
        <table class="table table-info table-bordered">
            <h2>Daftar User</h2>
            <thead>
                <tr class="text-center">
                    <th style="width: 150px;">Username</th>
                    <th>Foto Profile</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rowUser as $user) : ?>
                <tr>
                    <td style="width: 150px;"><?= $user['username']; ?></td>
                    <td style="width: 200px;" class="text-center"><img class="text-center" src="../img/profile/<?= $user['fotoProfile']; ?>" width="100"></td>
                    <td><?= $user['deskripsi']; ?></td>
                    <td class="text-center" style="width: 200px;">
                        <a href="javascript:confirmDelete('index.php?id=<?= $user["id"]; ?>&username=<?= $user["username"]; ?>&f=<?= $user["fotoProfile"]; ?>')" class="btn btn-danger" style="margin:5px;">Hapus Akun</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <!-- pesan dan saran -->
        <table class="table table-warning table-bordered">
            <h2>Pesan dan Saran</h2>
            <thead>
                <tr class="text-center">
                    <th style="width: 150px;">Nama</th>
                    <th style="width: 350px;">Email</th>
                    <th>Pesan dan Saran</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($rowPesan as $pesan) : ?>
                <tr>
                    <td style="width: 150px;"><?= $pesan['nama']; ?></td>
                    <td style="width: 350px;"><?= $pesan['email']; ?></td>
                    <td><?= $pesan['saran']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php } ?>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

