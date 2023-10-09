<div class="container">
    <h3 class="mb-3">Edit Peminjaman : <?= $data['peminjaman']['nama_peminjam'] ?></h3>
    <form action="<?= BASE_URL; ?>/peminjaman/updatePeminjaman" method="post">
        <div class="class-body">
            <input type="hidden" name="id" value="<?= $data['peminjaman']['id']; ?>">
            <div class="form-group mb-3">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $data['peminjaman']['nama_peminjam'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">Jenis Barang</label>
                <select name="jenis_barang" id="jenis_barang" class="form-control">
                    <option value="Laptop" <?php if ($data['peminjaman']['jenis_barang'] == 'Laptop') echo 'selected';  ?>>Laptop</option>
                    <option value="HP" <?php if ($data['peminjaman']['jenis_barang'] == 'HP') echo 'selected';  ?>>HP</option>
                    <option value="Adaptor LAN" <?php if ($data['peminjaman']['jenis_barang'] == 'Adaptor LAN') echo 'selected'; ?>>Adaptor LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">No. Barang</label>
                <input type="number" class="form-control" id="no_barang" name="no_barang" value="<?= $data['peminjaman']['no_barang'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['peminjaman']['tgl_pinjam'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_selesai">Tanggal Selesai</label>
                <input type="datetime-local" class="form-control" id="tgl_selesai" name="tgl_selesai" value="<?= $data['peminjaman']['tgl_selesai'] ?>">
            </div>            
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>