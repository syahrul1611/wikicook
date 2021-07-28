<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Sidebar CSS -->
        <link href="css/sidebar.css" rel="stylesheet" />

        <!-- Footer CSS -->
        <link rel="stylesheet" href="css/footer.css">

        <!-- Card CSS -->
        <link rel="stylesheet" href="css/card.css">

        <!-- css custom -->
        <link rel="stylesheet" href="css/index.css">

        <!-- fontawesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome.min.css"/>
        <script src="https://kit.fontawesome.com/c8e0e145f0.js" crossorigin="anonymous"></script>

        <!-- jquery -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//code.jquery.com/jquery-2.2.0.min.js"></script>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="//code.jquery.com/jquery-2.0.0.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.1.1.js"></script>

        <!-- Web Title & Icon -->
        <title>
            <?php if (isset($_GET['username'])) { ?>
                Profile <?= $_GET['username']; ?>
            <?php } elseif (isset($_GET['unggahResep'])) { ?>
                Unggah Resep
            <?php } elseif (isset($_GET['id'])) { ?>
                <?= $_GET['namaResep']; ?>
            <?php } else { ?>
                Wikicook
            <?php } ?>
        </title>
        <link rel="icon" href="img/asset/logo.png">
    </head>

    <!-- navbar & sidebar -->
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom">Kategori</div>
                <div class="list-group list-group-flush" id="list-bar">
                    <a class="nav-link link-dark" href="index.php?kategori=semua"><i class="fas fa-arrow-right"></i> Semua Kategori
                        <span class="badge bg-success rounded-pill"><?= check('semua'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=nasi"><i class="fas fa-arrow-right"></i> Aneka Nasi
                        <span class="badge bg-success rounded-pill"><?= check('nasi'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=ayam"><i class="fas fa-arrow-right"></i> Ayam dan Bebek
                        <span class="badge bg-success rounded-pill"><?= check('ayam'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=dessert"><i class="fas fa-arrow-right"></i> Dessert
                        <span class="badge bg-success rounded-pill"><?= check('dessert'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=snack"><i class="fas fa-arrow-right"></i> Snack
                        <span class="badge bg-success rounded-pill"><?= check('snack'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=puding"><i class="fas fa-arrow-right"></i> Puding dan Agar
                        <span class="badge bg-success rounded-pill"><?= check('puding'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=fastFood"><i class="fas fa-arrow-right"></i> Cepat Saji
                        <span class="badge bg-success rounded-pill"><?= check('fastFood'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=minuman"><i class="fas fa-arrow-right"></i> Minuman
                        <span class="badge bg-success rounded-pill"><?= check('minuman'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=pastry"><i class="fas fa-arrow-right"></i> Pastry
                        <span class="badge bg-success rounded-pill"><?= check('pastry'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=jepang"><i class="fas fa-arrow-right"></i> Jepang
                        <span class="badge bg-success rounded-pill"><?= check('jepang'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=bakmie"><i class="fas fa-arrow-right"></i> Bakmie
                        <span class="badge bg-success rounded-pill"><?= check('bakmie'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=korea"><i class="fas fa-arrow-right"></i> Korea
                        <span class="badge bg-success rounded-pill"><?= check('korea'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=chinese"><i class="fas fa-arrow-right"></i> Chinese
                        <span class="badge bg-success rounded-pill"><?= check('chinese'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=sate"><i class="fas fa-arrow-right"></i> Sate
                        <span class="badge bg-success rounded-pill"><?= check('sate'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=barat"><i class="fas fa-arrow-right"></i> Western
                        <span class="badge bg-success rounded-pill"><?= check('barat'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=seafood"><i class="fas fa-arrow-right"></i> Seafood
                        <span class="badge bg-success rounded-pill"><?= check('seafood'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=eastern"><i class="fas fa-arrow-right"></i> Timur Tengah
                        <span class="badge bg-success rounded-pill"><?= check('eastern'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=thai"><i class="fas fa-arrow-right"></i> Thailand
                        <span class="badge bg-success rounded-pill"><?= check('thai'); ?></span>
                    </a>
                    <a class="nav-link link-dark" href="index.php?kategori=india"><i class="fas fa-arrow-right"></i> India
                        <span class="badge bg-success rounded-pill"><?= check('india'); ?></span>
                    </a>
                </div>
            </div>
            <!-- Page content wrapper -->
            <div id="page-content-wrapper">
                <!-- Top navigation -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-navbar fixed-top">
                    <div class="container-fluid">
                        <!-- trigger side-bar -->
                        <button class="btn" id="sidebarToggle">
                            <i id="arrow" class="fas fa-chevron-right fa-3x"></i>
                        </button>
                        <a class="navbar-brand" href="index.php" style="color: #875236;">
                            <img width="70" src="img/asset/logo.png" alt="Wikicook">Wikicook
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <!-- if already logged in -->
                        <?php if(isset($_SESSION['masuk'])) { ?>
                            <div class="navbar-nav me-auto align-items-center">
                            <?php $infoPublisher = queryProfile($_SESSION["user"]); ?>
                            <?php foreach ($infoPublisher as $info) { ?>
                                <a class="nav-link" href="index.php?username=<?= $_SESSION['user']; ?>">
                                    <img src="img/profile/<?= $info['fotoProfile']; ?>" class="rounded-circle" width="40" /> <?= $_SESSION['user']; ?></a>
                            <?php } ?>
                                <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
                            <?php if (isset($_GET['unggahResep'])) { ?>
                                <a style="display:none;" class="nav-link" href="index.php?unggahResep">Unggah Resep</a>
                            <?php } else { ?>
                                <a class="nav-link" href="index.php?unggahResep">Unggah Resep</a>
                            <?php } ?>
                                <button id="logout" type="button" class="mt-2 btn btn-danger" data-bs-toggle="modal" data-bs-target="#keluar">
                                    Keluar
                                </button>
                            </div>
                        <!-- if not logged in -->
                        <?php } elseif(!isset($_SESSION['masuk'])) { ?>
                            <div class="navbar-nav me-auto">
                                <button type="button" class="btn nav-link" data-bs-toggle="modal" data-bs-target="#masuk">
                                    Masuk
                                </button>
                                <button type="button" class="btn nav-link" data-bs-toggle="modal" data-bs-target="#daftar">
                                    Daftar
                                </button>
                            </div>
                        <?php } ?>
                            <form method="POST" action="" class="d-flex my-2">
                                <input class="form-control me-2" type="search" placeholder="Cari Resep" aria-label="Search" name="kataKunci">
                                <button class="btn btn-outline-light" type="submit" name="cari">Cari</button>
                            </form>
                        </div>
                    </div>
                </nav>