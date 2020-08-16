<div class="card">
    <div class="card-title">
        <div class="d-flex">
            <div class="ml-auto mr-auto mt-3">
                <h5><b>Daftar Karyawan</b></h5>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">

                <a href="<?= base_url('home/tambahKaryawan'); ?>">
                    <button type="button" class="btn btn-info">
                        Tambah Pegawai
                    </button>
                </a>

            </div>
            <!-- Tabel -->
            <table id="table_hasil" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NPP</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($karyawan as $kyw) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $kyw['npp']; ?></td>
                            <td><?= $kyw['name']; ?></td>
                            <td><?= $kyw['email']; ?></td>
                            <td>
                                <a href="<?= base_url('home/ubahKaryawan/'); ?><?= $kyw['id']; ?>">
                                    <span class="badge badge-info">Ubah</span>
                                </a>
                                <a href="<?= base_url('home/hapusKaryawan/'); ?><?= $kyw['id']; ?>">
                                    <span class="badge badge-danger">Hapus</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>