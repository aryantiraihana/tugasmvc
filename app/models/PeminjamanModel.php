<?php 

class PeminjamanModel{

    private $table = 'tb_peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPeminjaman()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getPeminjamanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahPeminjaman($data)
    {
        $query = "INSERT INTO tb_peminjaman (nama_peminjam, jenis_barang, no_barang, tgl_pinjam, tgl_selesai) VALUES(:nama_peminjam, :jenis_barang, :no_barang, :tgl_pinjam, :tgl_selesai)";
        $kembali = date('Y-m-d H:i:s', strtotime($data['tgl_pinjam']. '+2 days'));
        $this->db->query($query);
        $this->db->bind('nama_peminjam', $data['nama_peminjam']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_selesai', $kembali);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPeminjaman($data)
    {

        $query = "UPDATE tb_peminjaman SET nama_peminjam=:nama_peminjam, jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam, tgl_selesai=:tgl_selesai  WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_peminjam', $data['nama_peminjam']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_selesai', $data['tgl_selesai']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePeminjaman($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    
    public function cariPeminjaman($barang)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_peminjam LIKE :nama_peminjam OR jenis_barang LIKE :jenis_barang");
        $this->db->bind('nama_peminjam', '%' . $barang . "%");
        $this->db->bind('jenis_barang', '%' . $barang . "%");
        return $this->db->resultSet();

    }
}

?>