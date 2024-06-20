<?php
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('M_paging');
        $this->load->model('Pendaftar_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->library('pagination');
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/admin_login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->Admin_model->login($username, $password);

            if ($user) {
                $this->session->set_userdata('id', $user['id']);
                redirect('admin/dashboard');
            } else {
                $data['error'] = 'Invalid login credentials.';
                $this->load->view('admin/admin_login', $data);
            }
        }
    }
     
    public function cari() {
        if (!$this->session->userdata('id')) {
            redirect('admin/login');
        }
    
        $kode_unik = $this->input->get('kode_unik');
    
        // Lakukan pencarian data berdasarkan Kode Unik
        $data['data_pendaftar'] = $this->Pendaftar_model->cari_pendaftar_by_kode_unik($kode_unik);
    
        // Load view dengan hasil pencarian
        $this->load->view('admin/admin_dashboard', $data);
    }
    
    public function register() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[admin.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/register');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $data = array(
                'username' => $username,
                'password' => $hashed_password,
            );

            $this->Admin_model->register_user($data);
            redirect('admin/login');
        }
    }

    public function dashboard() {
        if (!$this->session->userdata('id')) {
            redirect('admin/login');
        }
    
        $this->form_validation->set_rules('kode_unik', 'Kode Unik', 'required');
    
        if ($this->form_validation->run() == false) {
            // Validasi form gagal, load view dashboard dengan data pendaftar
            $data['data_pendaftar'] = $this->Pendaftar_model->get_all_pendaftar();
            $this->load->view('admin/admin_dashboard', $data);
        } else {
            // Validasi form berhasil
            $kode_unik = $this->input->post('kode_unik');
            redirect('admin/edit_data/' . $kode_unik);
        }
    }
    

    public function edit_data($kode_unik) {
        if (!$this->session->userdata('id')) {
            redirect('admin/login');
        }

        $data['data_pendaftar'] = $this->Pendaftar_model->get_pendaftar_by_kode_unik($kode_unik);
        if (empty($data['data_pendaftar'])) {
            show_404();
        }

        $this->load->view('admin/edit_data', $data);
    }

    public function update() {
        if (!$this->session->userdata('id')) {
            redirect('admin/login');
        }
    
        $kode_unik = $this->input->post('kode_unik');
    
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('TTL', 'TTL', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nama_wali', 'Nama Wali', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('telfn', 'Telepon', 'required');
        $this->form_validation->set_rules('telfnw', 'Telepon Wali', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $data['data_pendaftar'] = $this->Pendaftar_model->get_pendaftar_by_kode_unik($kode_unik);
            $this->load->view('admin/edit_data', $data);
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'TTL' => $this->input->post('TTL'),
                'alamat' => $this->input->post('alamat'),
                'nama_wali' => $this->input->post('nama_wali'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'telfn' => $this->input->post('telfn'),
                'telfnw' => $this->input->post('telfnw')
            );
    
            // Hapus gambar lama jika ada
            $pendaftar = $this->Pendaftar_model->get_pendaftar_by_kode_unik($kode_unik);
            if ($pendaftar['gambar'] && file_exists('./assets/gambar/' . $pendaftar['gambar'])) {
                unlink('./assets/gambar/' . $pendaftar['gambar']);
            }
    
            if (!empty($_FILES['gambar']['name'])) {
                $filename = time() . '_' . uniqid() . '_' . $_FILES['gambar']['name'];
    
                // Konfigurasi upload gambar
                $config['upload_path'] = './assets/gambar';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = 2048;
                $config['file_name'] = $filename;
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('gambar')) {
                    // Simpan gambar baru
                    $upload_data = $this->upload->data();
                    $data['gambar'] = $upload_data['file_name'];
                } else {
                    $data['error'] = $this->upload->display_errors();
                    $data['data_pendaftar'] = $this->Pendaftar_model->get_pendaftar_by_kode_unik($kode_unik);
                    $this->load->view('admin/edit_data', $data);
                    return;
                }
            }
    
            $this->Pendaftar_model->update_pendaftar($kode_unik, $data);
            redirect('admin/dashboard');
        }
    }
    
    public function hapusdata($kode_unik) {
        if (!$this->session->userdata('id')) {
            redirect('admin/login');
        }
    
        // Dapatkan informasi pendaftar berdasarkan kode unik
        $pendaftar = $this->Pendaftar_model->get_pendaftar_by_kode_unik($kode_unik);
    
        if (empty($pendaftar)) {
            show_404();
        }
    
        // Hapus gambar jika ada
        if ($pendaftar['gambar'] && file_exists('./assets/gambar/' . $pendaftar['gambar'])) {
            unlink('./assets/gambar/' . $pendaftar['gambar']);
        }
    
        // Hapus data pendaftar dari database
        $this->Pendaftar_model->hapus_pendaftar($kode_unik);
    
        // Redirect kembali ke halaman dashboard admin
        redirect('admin/dashboard');
    }
    

    public function logout() {
        $this->session->unset_userdata('id');
        redirect('admin/login');
    }
}
?>
