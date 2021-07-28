<?php
// user session
if (!isset($_SESSION['masuk'])) {
    $user = uniqid();
} else {
    $user = $_SESSION['user'];
}
// get username
$username = $_GET['username'];
// query info user
$infoProfile = queryProfile($username)[0];

// query resep berdasarkan publishernya
$rows = queryPublish($username);

// simpan edit profile
if ($user === $username) {
    if (isset($_POST['edit'])) {
        if (editProfile($user, $_POST) > 0) {
            echo "<script>
                alert('Profile berhasil diedit.');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Profile gagal diedit.');
            </script>";
        }
    }
}
?>
<!-- informasi user -->
<div class="container profile-info p-3 mb-3">
<?php if($user === $username) { ?>
    <div class="d-flex">
    <img class="img-fluid img-thumbnail border-success" src="img/profile/<?= $infoProfile['fotoProfile']; ?>" width="150">
    <div>
        <h3><?= $infoProfile['username']; ?></h3>
        <p class="w-100 mt-2">
        <b>Deskripsi :</b>
        <br>
        <?= $infoProfile['deskripsi']; ?>
        </p>
    </div>
    </div>
    <button type="button" class="mt-2 btn btn-info" data-bs-toggle="modal" data-bs-target="#editProfile">
    Edit Profile
    </button>
<?php } elseif($user != $username) { ?>
    <div class="d-flex">
    <img class="img-fluid" src="img/profile/<?= $infoProfile['fotoProfile']; ?>" width="100">
    <div>
        <h3><?= $infoProfile['username']; ?></h3>
        <p class="w-100 mt-2">
        Deskripsi 
        <br>
        <?= $infoProfile['deskripsi']; ?>
        </p>
    </div>
    </div>
<?php } ?>
    <hr>
    <div class="mt-3 p-3">
    <p class="fs-4">Daftar resep</p>
    <!-- recipe list of user -->
    <div class="container">
        <div class="row row-cols-auto m-2 justify-content-evenly">
        <!-- recipe card -->
        <?php foreach ($rows as $row) { ?>
            <div class="col my-2 recipe-card">
                <a href="index.php?id=<?= $row['id']; ?>">
                    <!-- recipe image -->
                    <div class="fotoResep">
                        <img src="img/recipe/<?= $row['username']; ?>/<?= $row['gambar']; ?>">
                        <div class="gradient"></div>
                    </div>
                    <!-- recipe information -->
                    <div class="container py-2">
                        <h5 class="card-title text-center"><?= $row['namaResep']; ?></h5>
                        <div class="container-fluid d-grid gap-2">
                            <div class="row justify-content-around align-items-center">
                                <span class="time col text-center mx-1">
                                    <i class="fas fa-clock"></i>
                                    <?= $row['waktu'] ?> menit
                                </span>
                                <span class="porsi col text-center mx-1">
                                    <i class="fas fa-users"></i>
                                    <?= $row['porsi']; ?> porsi
                                </span>
                            </div>
                            <div class="row">
                                <span class="kategori col text-center mx-1">
                                    <?php if ($row['kategori'] == 'nasi') { ?>
                                        Aneka Nasi
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'ayam') { ?>
                                        Ayam dan Bebek
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'dessert') { ?>
                                        Dessert
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'snack') { ?>
                                        Snack
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'puding') { ?>
                                        Puding dan Agar
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'fastFood') { ?>
                                        Cepat Saji
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'minuman') { ?>
                                        Minuman
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'pastry') { ?>
                                        Pastry
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'jepang') { ?>
                                        Jepang
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'bakmie') { ?>
                                        Bakmie
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'korea') { ?>
                                        Korea
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'chinese') { ?>
                                        Chinese
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'sate') { ?>
                                        Sate
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'barat') { ?>
                                        Western
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'seafood') { ?>
                                        Seafood
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'eastern') { ?>
                                        Timur Tengah
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'thai') { ?>
                                        Thailand
                                    <?php } ?>
                                    <?php if ($row['kategori'] == 'india') { ?>
                                        India
                                    <?php } ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="container">
                    <div class="row p-2">
                    <hr>
                    <?php if($user === $username) { ?>
                        <button type="button" class="btn bg-danger" data-bs-toggle="modal" data-bs-target="#hapusResep" style="color:white; z-index:10;">
                        Hapus Resep
                        </button>
                    <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    </div>
</div>