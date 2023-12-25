
<?php
class Mkategori extends CI_Model
{
    public function get_all_kategori()
    {
        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function get_jumlah_kategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->count_all_results('posting');
    }
}
