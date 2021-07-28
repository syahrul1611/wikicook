<?php
require 'cont.php';

// Cek jumlah resep sesuai kategori
function check($kategori)
{
    global $cont;

    if ($kategori == 'semua') {
        $sql = mysqli_query($cont, "SELECT * FROM resep");
        $cek = mysqli_num_rows($sql);
        return $cek;
    } elseif ($kategori != 'semua') {
        $sql = mysqli_query($cont, "SELECT * FROM resep WHERE kategori='$kategori'");
        $cek = mysqli_num_rows($sql);
        return $cek;
    }
}

// cari resep sesuai katakunci
function search($keyword)
{
    global $cont;
    if ($keyword == "") {
        return query('semua');
    } else {
        $query = "SELECT * FROM resep WHERE namaResep LIKE '%$keyword%'";
        $result = mysqli_query($cont, $query);
        $reseps = [];
        while ($resep = mysqli_fetch_assoc($result)) {
            $reseps[] = $resep;
        }

        if ($reseps != []) {
            return $reseps;
        } else {
            return 1;
        }
    }
}

// kirim pesan ke halaman admin
function kirimPesan($pesan) {
    global $cont;
    // ambil data
    $nama = htmlspecialchars($pesan['nama']);
    $email = htmlspecialchars($pesan['email']);
    $saran = htmlspecialchars($pesan['saran']);
    $query = "INSERT INTO pesan VALUES ('','$nama','$email','$saran')";
    mysqli_query($cont, $query);

    return mysqli_affected_rows($cont);
}

// fungsi komen
function komen($data)
{
    global $cont;
    $idResep = $data['idResep'];
    $username = $data['username'];
    $komen = htmlspecialchars($data['komen']);
    $tanggal = $data['tanggal'];
    $query = "INSERT INTO komen VALUES ('','$idResep','$username','$komen','$tanggal')";
    mysqli_query($cont, $query);
    return mysqli_affected_rows($cont);
}
function queryKomen($id)
{
    global $cont;
    $query = "SELECT * FROM komen WHERE idResep = '$id' ORDER BY id DESC";
    $result = mysqli_query($cont,$query);
    $komen = [];
    while ($info = mysqli_fetch_assoc($result)) {
        $komen[] = $info;
    }
    return $komen;
}
function jumlahKomen($id)
{
    global $cont;
    $sql = mysqli_query($cont, "SELECT * FROM komen WHERE idResep = '$id'");
    $cek = mysqli_num_rows($sql);
    return $cek;
}

// register
function register($data)
{
    global $cont;
    $username = htmlspecialchars(strtolower(stripslashes($data['usernameR'])));
    $email = mysqli_real_escape_string($cont, $data['email']);
    $password = mysqli_real_escape_string($cont, $data['passwordR']);
    $password2 = mysqli_real_escape_string($cont, $data['passwordR2']);

    // cek kesamaan username
    $result = mysqli_query($cont, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username sudah ada.');
        </script>";
        return false;
    }

    // cek email
    $result = mysqli_query($cont, "SELECT email FROM user WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Email sudah dipakai.');
        </script>";
        return false;
    }


    // confirm password
    if ($password != $password2) {
        echo "<script>
        alert('Password tidak cocok!');
        </script>";
        return false;
    }

    // encrpt password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah user
    mysqli_query($cont, "INSERT INTO user (id, email, username, password, fotoProfile, deskripsi) VALUES ('','$email','$username','$password','default.png','')");

    // buar direktori penyimpanan foto resep
    $folder = "img/recipe/".$username;
    if ( !mkdir($folder, 0777, true) ) {
        die('Pembuatan folder gagal');
    }

    return mysqli_affected_rows($cont);
}

// ambil data profile untuk kartu resep
function queryProfile($username)
{
    global $cont;
    $result = mysqli_query($cont, "SELECT * FROM user WHERE username = '$username'");
    $profiles = [];
    while ($profile = mysqli_fetch_assoc($result)) {
        $profiles[] = $profile;
    }
    return $profiles;
}

// ambil data semua resep atau ambil data sesuai kategori
function query($kategori)
{
    global $cont;

    if ($kategori == 'semua') {
        $result = mysqli_query($cont, "SELECT * FROM resep");
        $reseps = [];
        while ($resep = mysqli_fetch_assoc($result)) {
            $reseps[] = $resep;
        }
        return $reseps;
    } elseif ($kategori != 'semua') {
        $query = "SELECT * FROM resep WHERE kategori = '$kategori'";
        $result = mysqli_query($cont, $query);
        $reseps = [];
        while ($resep = mysqli_fetch_assoc($result)) {
            $reseps[] = $resep;
        }
        return $reseps;
    }
}

// ambil data semua resep sesuai dengan publishernya
function queryPublish($username)
{
    global $cont;

    $query = "SELECT * FROM resep WHERE username = '$username'";
    $result = mysqli_query($cont, $query);
    $reseps = [];
    while ($resep = mysqli_fetch_assoc($result)) {
        $reseps[] = $resep;
    }
    return $reseps;
}

// ambil data satu resep untuk dilihat detailnya
function queryResep($id)
{
    global $cont;
    $result = mysqli_query($cont, "SELECT * FROM resep WHERE id = '$id'");
    $resep = [];
    while ($info = mysqli_fetch_assoc($result)) {
        $resep[] = $info;
    }
    return $resep;
}

// upload foto resep
function uploadFotoResep($username)
{
    $nameFile = $_FILES["resepimg"]["name"];
    $error = $_FILES["resepimg"]["error"];
    $tmpName = $_FILES["resepimg"]["tmp_name"];

    $validTypeFile = ['jpg', 'png', 'jpeg'];
    $typeFile = explode('.', $nameFile);
    $typeFile = strtolower(end($validTypeFile));

    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $typeFile;

    if ($error === 4) {
        $newFileName = "food.jpg";
    }

    move_uploaded_file($tmpName, "img/recipe/".$username."/".$newFileName);

    return $newFileName;
}

// tambah resep
function tambahResep($info)
{
    global $cont;
    // ambil data
    $gambar = uploadFotoResep($info['username']);
    $username = htmlspecialchars($info['username']);
    $namaResep = htmlspecialchars($info['namaResep']);
    $kategori = htmlspecialchars($info['kategori']);
    $deskripsi = htmlspecialchars($info['deskripsi']);
    $waktu = $info['waktu'];
    $porsi = $info['porsi'];
    $bahans = $info['bahan'];
    $caras = $info['cara'];
    $query = "INSERT INTO resep VALUES ('', '$username', '$namaResep', '$gambar', '$kategori', '$deskripsi', '$waktu', '$porsi'," . "'" . serialize($bahans) . "'" . "," . "'" . serialize($caras) . "'" . ")";
    mysqli_query($cont, $query);

    return mysqli_affected_rows($cont);
}

// Hapus resep
function deleteResep($id)
{
    global $cont;
    mysqli_query($cont, "DELETE FROM resep WHERE id = $id");
    return mysqli_affected_rows($cont);
}

// upload foto profile
function uploadFotoProfile()
{
    $nameFile = $_FILES["fotoProfile"]["name"];
    $error = $_FILES["fotoProfile"]["error"];
    $tmpName = $_FILES["fotoProfile"]["tmp_name"];

    $validTypeFile = ['jpg', 'png', 'jpeg'];
    $typeFile = explode('.', $nameFile);
    $typeFile = strtolower(end($validTypeFile));

    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $typeFile;

    if ($error === 4) {
        $newFileName = "default.png";
    }

    move_uploaded_file($tmpName, "img/profile/".$newFileName);

    return $newFileName;
}

// edit profile
function editProfile($username, $data) {
    global $cont;
    $deskripsi = htmlspecialchars($data["deskripsiBaru"]);
    $gambarLama = $data["fotoProfileLama"];

    if ($_FILES['fotoProfile']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        if ($gambarLama === 'default.png') {
            $gambar = uploadFotoProfile();
        } else {
            unlink('img/profile/'.$gambarLama);
            $gambar = uploadFotoProfile();
        }
    }

    $query = "UPDATE user SET fotoProfile = '$gambar', deskripsi = '$deskripsi' WHERE username = '$username'";
    mysqli_query($cont, $query);

    return mysqli_affected_rows($cont);
}

// Hapus profile
function deleteProfile($id)
{
    global $cont;
    mysqli_query($cont, "DELETE FROM user WHERE id = $id");
    return mysqli_affected_rows($cont);
}