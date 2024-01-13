
<?php
class Mkategori extends CI_Model
{
    public function get_kategori()
    {
        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function get_jumlah_kategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->count_all_results('posting');
    }
    public function tambah_kategori($kategori)
    {
        $data = array('kategori' => $kategori);
        $this->db->insert('kategori', $data);
    }
    public function hapus_kategori($id_kategori) {
        
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->delete('kategori');
    }
}
