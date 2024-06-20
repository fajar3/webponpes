<?php
class Pendaftar_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function insert_pendaftar($data) {
        $this->db->insert('data_pendaftar', $data);
        return $this->db->insert_id();
    }

    public function update_kode_unik($id, $kode_unik) {
        $this->db->where('id', $id);
        $this->db->update('data_pendaftar', array('kode_unik' => $kode_unik));
    }

    public function get_pendaftar_by_kode_unik($kode_unik) {
        $query = $this->db->get_where('data_pendaftar', array('kode_unik' => $kode_unik));
        return $query->row_array();
    }

    public function update_pendaftar_by_kode_unik($kode_unik, $data) {
        $this->db->where('kode_unik', $kode_unik);
        $this->db->update('data_pendaftar', $data);
    }

     // Method to get all pendaftar data
     public function get_all_pendaftar() {
        $query = $this->db->get('data_pendaftar');
        return $query->result_array();
    }

    public function update_pendaftar($kode_unik, $data) {
        $this->db->where('kode_unik', $kode_unik);
        return $this->db->update('data_pendaftar', $data);
    }
    public function count_all_pendaftar() {
        return $this->db->count_all('data_pendaftar');
    }
    public function hapus_pendaftar($kode_unik) {
        $this->db->where('kode_unik', $kode_unik);
        $this->db->delete('data_pendaftar');
    }
    public function cari_pendaftar_by_kode_unik($kode_unik) {
        if ($kode_unik === null) {
            // Handle the case where $kode_unik is null
            return [];
        }
    
        $this->db->like('kode_unik', $this->db->escape_like_str($kode_unik));
        $query = $this->db->get('data_pendaftar');
        return $query->result_array();
    }
    
    
    
    
}
?>
