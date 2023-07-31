<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Landing extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // cek session yang login,  
        // jika session status tidak sama dengan session telah_login, berarti pengguna belum login 
        // maka halaman akan di alihkan kembali ke halaman login.  

        $this->load->model('m_data');
    }
    public function index()
    {
        $data['produk'] = $this->db->query("SELECT * FROM tb_produk where produk_jenis=1 order by produk_rank ASC")->result();
        $data['produk2'] = $this->db->query("SELECT * FROM tb_produk where produk_jenis=2 order by produk_rank ASC")->result();

        $this->load->view("landing/v_header");
        $this->load->view("landing/v_index", $data);
        $this->load->view("landing/v_footer");
    }
    public function notfound()
    {

        $this->load->view('landing/v_header');
        $this->load->view('landing/v_notfound');
        $this->load->view('landing/v_footer');
    }
}
