<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <div class="d-flex justify-content-between mt-5">
        <div class="flex-none">
            <a href="<?= BASE_URL; ?>/peminjaman/tambah" class="btn btn-primary">Tambah Peminjaman</a>
        </div>
        <div class="flex-1 ms-auto">
            <form action="<?= BASE_URL;?>/peminjaman/cari" method="post" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Cari..." aria-label="search" name="keyword" style="width:90%;" autocomplete="off">
                <button class="btn btn-outline-secondary me-2" type="submit">Cari</button>
                <a href="<?= BASE_URL; ?>/peminjaman/index" class="btn btn-outline-danger">Reset</a>
            </form>
        </div>
    </div>
    <br>
    <br>
    <table class="table table-light table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Nomor Barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            <?php foreach ($data['peminjaman'] as $row) :?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama_peminjam']; ?></td>
                <td><?= $row['jenis_barang']; ?></td>
                <td><?= $row['no_barang']; ?></td>
                <td><?= $row['tgl_pinjam']; ?></td>
                <td><?= $row['tgl_selesai']; ?></td>

                <?php 
                    if(date('Y-m-d H:i:s', time() + 60 * 60 * 5) > $row['tgl_selesai']) {
                        echo '<td><span class="badge text-bg-success">sudah kembali</span></td>';
                ?>
           

                <td>
                    <a href="<?= BASE_URL ?>/peminjaman/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                </td>
                
                <?php 
                    }else{
                        echo '<td><span class="badge text-bg-danger">belum kembali</span></td>';  
                ?>
                
                <td>
                    <a href="<?= BASE_URL ?>/peminjaman/edit/<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="<?= BASE_URL ?>/peminjaman/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                </td>
                <?php 
                    }
                ?>
            </tr>

            <?php $no++; endforeach; ?>
        </tbody>
    </table>
</div>