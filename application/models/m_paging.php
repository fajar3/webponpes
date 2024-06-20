<?php
// application/models/Auth_model.php
class M_paging extends CI_Model {
    function data_paging($number, $offset){
        return $this->db->get('data_pendaftar',$number, $offset)->result();
    }
    function jumlah_data(){
        return $this->db->get('data_pendaftar')->num_rows();
    }
}