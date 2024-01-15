<?php
class Madmin extends CI_Model
{
    function executeedit($id_admin, $data): void
    {
        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $data);
    }
    public function getPostAndValidationStatistics()
    {
        $query = $this->db->select('kategori.kategori as category_name, 
                                   COUNT(posting.id_posting) as post_count, 
                                   COUNT(validasi.id_validasi) as validation_count')
            ->from('posting')
            ->join('kategori', 'kategori.id_kategori = posting.id_kategori', 'left')
            ->join('validasi', 'validasi.id_posting = posting.id_posting', 'left')
            ->group_by('kategori.kategori')
            ->get();

        return $query->result_array();
    }
    public function getTotalValidasi()
    {
        return $this->db->count_all_results('validasi');
    }

    public function getTotalUser()
    {
        return $this->db->count_all_results('user');
    }

    public function getTotalPosting()
    {
        return $this->db->count_all_results('posting');
    }

    public function getKategoriStats()
    {
        $query = $this->db->select('kategori.kategori as kategori, COUNT(posting.id_posting) as post_count')
            ->from('posting')
            ->join('kategori', 'kategori.id_kategori = posting.id_kategori', 'left')
            ->group_by('kategori.kategori')
            ->get();
        return $query->result_array();
    }

    public function getPosting()
    {
        $thisMonth = date('Y-m');

        $this->db->select('posting.*, kategori.kategori');
        $this->db->from('posting');
        $this->db->join('kategori', 'posting.id_kategori = kategori.id_kategori', 'left');
        $this->db->like('tanggal', $thisMonth, 'after');

        $query = $this->db->get();

        return $query->result_array();
    }
    public function getAllAdmins()
    {
        $query = $this->db->get('admin');
        return $query->result_array();
    }

    public function deleteAdmin($id_admin)
    {

        $this->db->where('id_admin', $id_admin);
        $this->db->delete('admin');

        $result['status'] = 'success';
        $result['message'] = 'Data berhasil dihapus';

        return $result;
    }
    public function simpanAdmin($data)
    {

        $this->db->insert('admin', $data);
    }
    public function getUserStatistics()
    {
        $totalUsers = $this->db->count_all('user');

        $activedUsers = $this->db->where('actived', 1)->count_all_results('user');
        $nonActivedUsers = $this->db->where('actived', 0)->count_all_results('user');

        $data = array(
            'totalUsers' => $totalUsers,
            'activedUsers' => $activedUsers,
            'nonActivedUsers' => $nonActivedUsers
        );

        return $data;
    }
}
