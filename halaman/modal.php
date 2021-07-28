<!-- Modal Masuk -->
<div class="modal fade" id="masuk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Masuk</h5>
            </div>
            <div class="modal-body">
            <!-- form untuk login -->
                <form class="login" action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="username">Username:</label>
                        <input class="form-control" id="username" type="text" name="usernameL" placeholder="Fulan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password:</label>
                        <input class="form-control" id="password" type="password" name="passwordL" placeholder="******">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" name="masuk" class="btn btn-primary">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Daftar -->
<div class="modal fade" id="daftar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Daftar</h5>
            </div>
            <div class="modal-body">
            <!-- form untuk daftar -->
                <form class="login" action="" method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address:</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="username">Username:</label>
                        <input minlength="6" maxlength="16" class="form-control" id="username" type="text" name="usernameR" placeholder="Fulan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password:</label>
                        <input minlength="8" maxlength="16" class="form-control" id="password" type="password" name="passwordR" placeholder="******">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Confirm Password:</label>
                        <input minlength="8" maxlength="16" class="form-control" id="password" type="password" name="passwordR2" placeholder="******">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal confirm keluar -->
<div class="modal fade" id="keluar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Yakin ingin keluar?</h5>
            </div>
            <div class="modal-body">
                <a href="function/logout.php" class="btn btn-danger" style="margin:5px;">Keluar</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Profile -->
<div class="modal fade" id="editProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
        </div>
        <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="fotoProfileLama" value="<?= $infoProfile["fotoProfile"]; ?>">
        <div class="form">
            <p class="fs-5">Ubah foto profile</p>
            <label class="foto" for="file">
            <img id="preview" class="img-fluid" src="img/profile/<?= $infoProfile['fotoProfile']; ?>" width="100">
            <input id="file" type="file" name="fotoProfile" accept="image/*">
            </label>
            <hr>
            <div>
            <label style="display:block;" for="deskripsi">Deskripsi</label>
            <textarea class="border border-3" id="deskripsi" type="text" name="deskripsiBaru" maxlength="1000" cols="30" rows="5" placeholder="<?= $infoProfile['deskripsi']; ?>" style="border-radius: 5px; padding: 10px; width:100%;"></textarea>
            </div>
            <hr>
            <button type="button" class="btn bg-danger mb-2" data-bs-toggle="modal" data-bs-target="#hapusAkun" style="color:white;">
                Hapus akun
            </button>
        </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
    </div>
    </div>
</div>

<!-- Modal confirm hapus resep -->
<div class="modal fade" id="hapusResep" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Yakin hapus resep?</h5>
        </div>
        <div class="modal-body">
        <a href="function/deleteResep.php?id=<?= $row["id"]; ?>&f=<?= $row["gambar"]; ?>" class="btn btn-danger" style="margin:5px;">Hapus Resep</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
    </div>
    </div>
</div>

<!-- Modal confirm hapus akun -->
<div class="modal fade" id="hapusAkun" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Yakin hapus akun?</h5>
        </div>
        <div class="modal-body">
        <a href="function/deleteProfile.php?id=<?= $infoProfile["id"]; ?>&username=<?= $infoProfile["username"]; ?>&f=<?= $infoProfile["fotoProfile"]; ?>" class="btn btn-danger" style="margin:5px;">Hapus Akun</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
    </div>
    </div>
</div>