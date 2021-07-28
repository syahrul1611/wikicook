<?php
$id = $_GET['id'];
// ambil data resep
$row = queryResep($id)[0];
$bahans = unserialize($row['bahan']);
$caras = unserialize($row['cara']);
$komens = queryKomen($id);
$jumlahKomen = jumlahKomen($id);
if (isset($_POST['post'])) {
    if (komen($_POST) > 0) {
        echo "<script>
            alert('Komentar dikirim.');
            window.location.href = window.location.href;
        </script>";
    }
}
?>
<!-- recipe view container -->
<div class="container recipe-view p-3 mb-5">
    <?php $infoPublisher = queryProfile($row['username']); ?>
    <div class="d-flex">
        <img class="img-fluid img-thumbnail border-success" src="img/recipe/<?= $row['username']; ?>/<?= $row['gambar']; ?>" width="400">
        <div class="ms-2">
            <h1><?= $row['namaResep']; ?></h1>
            <span class="d-flex justify-content-between">
                <?php foreach ($infoPublisher as $info) { ?>
                    <a class="link-success" href="index.php?username=<?= $info['username']; ?>">
                        <img 
                        src="img/profile/<?= $info['fotoProfile']; ?>" 
                        class="img-thumbnail rounded-circle border-success border-3 bg-light bg-gradient" 
                        style="width:50px;">
                        <b><?= $info['username']; ?></b>
                    </a>
                <?php } ?>
            </span>
            <p class="w-100 mt-2">
                <b>Deskripsi :</b>
                <br>
                <?= $row['deskripsi']; ?>
            </p>
        </div>
    </div>
    <hr>
    <div class="mt-3 ">
        <p class="fs-3">Bahan-bahan :</p>
        <ul>
        <?php foreach ($bahans as $bahan) : ?>
        <li><?= $bahan; ?></li>
        <?php endforeach; ?>
        </ul>
        <hr>
        <p class="fs-3">Langkah-langkah :</p>
        <ul>
        <?php foreach ($caras as $cara) : ?>
        <li><?= $cara; ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>
<div class="container komen p-3 mb-5">
    <h4 style="border-bottom: 1px solid #479f76;" class="mb-2 p-1">(<?= $jumlahKomen; ?>) Komentar</h4>
    <?php if(isset($_SESSION['masuk'])){ ?>
    <form action="" method="POST">
        <input type="hidden" name="username" value="<?= $_SESSION['user']; ?>">
        <input type="hidden" name="idResep" value="<?= $id; ?>">
        <input type="hidden" name="tanggal" value="<?= date('d F, Y'); ?>">
        <p class="fs-6">Beri komentar</p>
        <textarea class="w-100" type="text" name="komen" required></textarea>
        <button class="btn btn-info" type="submit" name="post">Post</button>
    </form>
    <hr>
    <?php } ?>
    <ul class="mt-3 list-group">
        <?php foreach($komens as $komen) { ?>
        <?php $infoPublisher = queryProfile($komen['username'])[0]; ?>
        <li class="list-group-item bg-light" style="list-style: none;position:relative;">
            <span style="top:2px;right:1px;position:absolute;"><?= $komen['tanggal']; ?></span>
            <a class="link-dark" style="text-decoration: none;" href="index.php?username=<?= $infoPublisher['username']; ?>">
                <img src="img/profile/<?= $infoPublisher['fotoProfile']; ?>" class="rounded-circle" width="40" /> <?= $infoPublisher['username']; ?>
            </a>
            <p class="pt-2"><?= $komen['komen']; ?></p>
        </li>
        <?php } ?>
    </ul>
</div>