<div class="card">
    <div class="card-title">
        <div class="d-flex">
            <div class="ml-auto mr-auto mt-3">
                <h5><b>TAMBAH DATA KARYAWAN</b></h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $karyawan['id']; ?>">
                        <div class="form-group">
                            <label for="npp">Nomor Pokok Pegawai</label>
                            <input type="text" class="form-control" id="npp" name="npp" value="<?= $karyawan['npp']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $karyawan['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $karyawan['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="pw">Password</label>
                            <input type="password" class="form-control" id="pw" name="pw">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="showpassword" onclick="showPassword()">
                            <label class="form-check-label" for="showpassword">
                                show password
                            </label>
                        </div>
                        <script>
                            function showPassword() {
                                var x = document.getElementById("pw");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                            }
                        </script>
                        <div class="col-md-12 d-flex">
                            <div class="mr-auto ml-auto">
                                <a href="<?= base_url('home/daftarkaryawan'); ?>" class="btn btn-info">Kembali</a>
                                <button type="submit" name="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>