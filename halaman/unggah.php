<?php
// session user
$user = $_SESSION['user'];
if (isset($_POST['unggah'])) {
    if (tambahResep($_POST) > 0) {
        echo "<script>
            alert('Resep diunggah.');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Resep gagal diunggah.');
        </script>";
    }
}
?>
<div class="container containerUnggah p-4">
    <div class="panel panel-default">
        <div class="panel-heading fs-3 text-center">Unggah Resep</div>
        <div class="panel-body">
        <!-- form  -->
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="username" value="<?= $user; ?>">
                <!-- input recipe info -->
                <label class="foto" for="file">
                <img id="preview" src="img/asset/camera.png">
                <input id="file" type="file" name="resepimg" accept="image/*" required>
                </label>
                <label class="mb-2" for="namaResep">Nama Resep:
                <input type="text" name="namaResep" id="namaResep" placeholder="Nasi Goreng Babat" required>
                </label>
                <label class="mb-2" for="deskripsi">Deskripsi:
                <textarea type="text" name="deskripsi" id="deskripsi" required></textarea>
                </label>
                <label class="mb-2" for="kategori">Kategori:
                <select name="kategori" id="kategori" required>
                    <option value="nasi">Aneka Nasi</option>
                    <option value="ayam">Ayam dan Bebek</option>
                    <option value="dessert">Dessert</option>
                    <option value="snack">Snack</option>
                    <option value="puding">Puding dan Agar-agar</option>
                    <option value="fastFood">Cepat Saji</option>
                    <option value="minuman">Minuman</option>
                    <option value="pastry">Pastry</option>
                    <option value="jepang">Jepang</option>
                    <option value="bakmie">Bakmie</option>
                    <option value="korea">Korea</option>
                    <option value="chinese">Chinese</option>
                    <option value="sate">Sate</option>
                    <option value="barat">Western</option>
                    <option value="seafood">Seafood</option>
                    <option value="eastern">Timur Tengah</option>
                    <option value="thai">Thailand</option>
                    <option value="india">India</option>
                </select>
                </label>
                <label class="mb-2" for="waktu">Perkiraan waktu (dalam menit):
                <input type="number" name="waktu" min="1" id="waktu" placeholder="Dalam menit" required>
                </label>
                <label class="mb-2" for="porsi">Jumlah porsi:
                <input type="number" name="porsi" min="1" id="porsi" placeholder="Jumlah Porsi" required>
                </label>
                <!-- input ingredient -->
                <hr>
                <p class="fs-6">Bahan bahan:</p>
                <div class="list-bahan">
                    <div class="d-flex align-items-center">
                        <input style="width:100%;" type="text" name="bahan[]" placeholder="Contoh: Bawang merah" required>
                    </div>
                </div>
                <button style="width:100%;" class="btn btn-success add-more-bahan my-3" type="button">
                    <i class="fas fa-plus"></i> Add
                </button>
                <!-- input step -->
                <hr>
                <p class="fs-6">Langkah langkah:</p>
                <div class="list-cara">
                    <div class="d-flex align-items-center">
                        <input style="width:100%;" type="text" name="cara[]" placeholder="contoh: Iris bawang merah" required>
                    </div>
                </div>
                <button style="width:100%;" class="btn btn-success add-more-cara my-3" type="button">
                    <i class="fas fa-plus"></i> Add
                </button>
                <hr>
                <button class="btn btn-success" type="submit" name="unggah">Unggah</button>
                <a class="btn btn-danger" href="index.php">Batal</a>
            </form>
            <!-- copy class / dynamic form  -->
            <div class="copy-bahan invisible">
                <div class="input-bahan d-flex align-items-center">
                <input style="width:80%;" class="me-2" type="text" name="bahan[]" />
                <button style="width:20%;" class="btn btn-danger remove-bahan" type="button">
                    <i class="fas fa-trash"></i> Remove
                </button>
                </div>
            </div>
            <div class="copy-cara invisible">
                <div class="input-cara d-flex align-items-center">
                <input style="width:80%;" class="me-2" type="text" name="cara[]" />
                <button style="width:20%;" class="btn btn-danger remove-cara" type="button">
                    <i class="fas fa-trash"></i> Remove
                </button>
                </div>
            </div>
        </div>
    </div>
</div>