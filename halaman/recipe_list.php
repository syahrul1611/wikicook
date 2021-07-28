<h3 class="indicator">
    <?php if (!isset($_GET['kategori'])) { ?>
        Semua Kategori
    <?php } elseif (isset($_GET['kategori'])) { ?>
        <?php if ($_GET['kategori'] == 'semua') { ?>
            Semua Kategori
        <?php } ?>
        <?php if ($_GET['kategori'] == 'nasi') { ?>
            Aneka Nasi
        <?php } ?>
        <?php if ($_GET['kategori'] == 'ayam') { ?>
            Ayam dan Bebek
        <?php } ?>
        <?php if ($_GET['kategori'] == 'dessert') { ?>
            Dessert
        <?php } ?>
        <?php if ($_GET['kategori'] == 'snack') { ?>
            Snack
        <?php } ?>
        <?php if ($_GET['kategori'] == 'puding') { ?>
            Puding dan Agar-agar
        <?php } ?>
        <?php if ($_GET['kategori'] == 'fastFood') { ?>
            Cepat Saji
        <?php } ?>
        <?php if ($_GET['kategori'] == 'minuman') { ?>
            Minuman
        <?php } ?>
        <?php if ($_GET['kategori'] == 'pastry') { ?>
            Pastry
        <?php } ?>
        <?php if ($_GET['kategori'] == 'jepang') { ?>
            Jepang
        <?php } ?>
        <?php if ($_GET['kategori'] == 'bakmie') { ?>
            Bakmie
        <?php } ?>
        <?php if ($_GET['kategori'] == 'korea') { ?>
            Korea
        <?php } ?>
        <?php if ($_GET['kategori'] == 'chinese') { ?>
            Chinese
        <?php } ?>
        <?php if ($_GET['kategori'] == 'sate') { ?>
            Sate
        <?php } ?>
        <?php if ($_GET['kategori'] == 'barat') { ?>
            Western
        <?php } ?>
        <?php if ($_GET['kategori'] == 'seafood') { ?>
            Seafood
        <?php } ?>
        <?php if ($_GET['kategori'] == 'eastern') { ?>
            Timur Tengah
        <?php } ?>
        <?php if ($_GET['kategori'] == 'thai') { ?>
            Thailand
        <?php } ?>
        <?php if ($_GET['kategori'] == 'india') { ?>
            India
        <?php } ?>
    <?php } ?>
</h3>

<!-- recipe list -->
<div class="row row-cols-auto m-2 justify-content-around">
<!-- recipe card -->
<?php foreach ($rows as $row) : ?>
    <div class="col my-2 recipe-card">
        <a href="index.php?id=<?= $row['id']; ?>&namaResep=<?= $row['namaResep']; ?>">
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
    </div>
<?php endforeach; ?>
</div>