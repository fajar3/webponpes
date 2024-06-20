<?php
class Daftar extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Pendaftar_model');
        $this->load->helper(array('url', 'download', 'form'));
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index() {
        $this->load->view('menu/daftar/daftar');
    }

    public function submit() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('TTL', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nama_wali', 'Nama Wali', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('telfn', 'Telepon', 'required');
        $this->form_validation->set_rules('telfnw', 'Telepon Wali', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('menu/daftar/daftar');
        } else {
            $filename = time() . '_' . uniqid() . '_' . $_FILES['gambar']['name'];
            // Upload Gambar
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = $filename;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $uploadData = $this->upload->data();
                $gambar = $uploadData['file_name'];
            } else {
                $gambar = '';
            }

            $TTL = $this->input->post('TTL');

            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'TTL' => $TTL,
                'alamat' => $this->input->post('alamat'),
                'nama_wali' => $this->input->post('nama_wali'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'telfn' => $this->input->post('telfn'),
                'telfnw' => $this->input->post('telfnw'),
                'gambar' => $gambar,
                'tanggal_pendaftaran' => date('Y-m-d') // Tanggal pendaftaran otomatis
            );

            // Insert pendaftar dan dapatkan ID
            $id = $this->Pendaftar_model->insert_pendaftar($data);

             // Buat kode unik dengan format NNMMYYXXXX
             $tahun_daftar = date('y'); // Dua digit terakhir tahun pendaftaran
             $bulan_daftar = date('m'); // Dua digit bulan lahir
             $tahun_lahir = date('y', strtotime($TTL)); // Dua digit tahun lahir
             $kode_unik = 'SAN' . $tahun_daftar . $bulan_daftar . $tahun_lahir . str_pad($id, 4, '0', STR_PAD_LEFT); 

            // Update kode unik di database
            $this->Pendaftar_model->update_kode_unik($id, $kode_unik);

            // Menambahkan kode unik ke data yang dikirim ke view
            $data['kode_unik'] = $kode_unik;

            // Tampilkan halaman sukses
            $this->load->view('menu/daftar/succes', $data);
        }
    }

    public function download() {
        force_download('assets/Ibadah.apk', null);
    }
}

