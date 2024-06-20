<?php
// application/models/Auth_model.php
class Admin_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($username, $password) {
        $query = $this->db->get_where('admin', array('username' => $username));

        if ($query->num_rows() == 1) {
            $user = $query->row_array();

            // Verifikasi password dengan password_verify
            if (password_verify($password, $user['password'])) {
                return $user; // Return data user jika password cocok
            }
        }

        return false; // Jika tidak ada user ditemukan atau password salah
    }

    public function register_user($data) {
        return $this->db->insert('admin', $data);
    }
    
}
?>
