<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // cek session yang login,  
        // jika session status tidak sama dengan session telah_login, berarti pengguna belum login 
        // maka halaman akan di alihkan kembali ke halaman login.  

        $this->load->model('m_data');
        if ($this->session->userdata('status') != "telah_login") {
            redirect(base_url() . 'login?alert=belum_login');
        }
    }

    public function index()
    {
        $data['produk'] = $this->m_data->get_data('tb_produk')->num_rows();
        $data['jenis'] = $this->m_data->get_data('tb_jenisproduk')->num_rows();
        $data['kriteria'] = $this->m_data->get_data('tb_kriteria')->num_rows();
        $data['sub'] = $this->m_data->get_data('tb_sub_kriteria')->num_rows();
        $d1 = $this->db->query('SELECT COUNT(produk_nama) as j FROM tb_produk where produk_jenis=1')->result();
        foreach ($d1 as $d) {
            $data['makanan'] = $d->j;
        }
        $d2 = $this->db->query('SELECT COUNT(produk_nama) as j FROM tb_produk where produk_jenis=2')->result();
        foreach ($d2 as $d) {
            $data['kerajinan'] = $d->j;
        }

        $data['graph'] = $this->db->query("SELECT tb_produk.produk_jenis, tb_jenisproduk.jenis_nama, COUNT(*) AS the_count FROM tb_produk INNER JOIN tb_jenisproduk ON tb_produk.produk_jenis = tb_jenisproduk.jenis_id GROUP BY tb_jenisproduk.jenis_nama")->result();
        $data['graph2'] = $this->db->query("SELECT tb_sub_kriteria.kriteria_id, tb_kriteria.kriteria_nama, COUNT(*) AS the_count FROM tb_sub_kriteria INNER JOIN tb_kriteria ON tb_sub_kriteria.kriteria_id = tb_kriteria.kriteria_id GROUP BY tb_kriteria.kriteria_nama ORDER BY tb_kriteria.kriteria_id ASC")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_index', $data);
        $this->load->view('dashboard/v_footer');
    }



    public function keluar()
    {
        $this->session->sess_destroy();
        redirect('login?alert=logout');
    }

    public function profil()
    {
        // id pengguna yang sedang login
        $id_pengguna = $this->session->userdata('id');

        $where = array(
            'admin_id' => $id_pengguna
        );

        $data['profil'] = $this->m_data->edit_data($where, 'tb_admin')->result();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_profil', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function profil_update()
    {
        // Wajib isi nama dan email
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() != false) {

            $id = $this->session->userdata('id');

            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            $where = array(
                'admin_id' => $id
            );

            $data = array(
                'admin_username' => $nama,
                'admin_email' => $email
            );

            $this->m_data->update_data($where, $data, 'tb_admin');

            // redirect(base_url() . 'dashboard/profil/?alert=sukses');

            if (!empty($_FILES['logo']['name'])) {

                $config['upload_path']   = './gambar/profil_user/';
                $config['allowed_types'] = 'jpg|png';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('logo')) {
                    // mengambil data tentang gambar logo yang diupload
                    $gambar = $this->upload->data();

                    $logo = $gambar['file_name'];

                    $this->db->query("UPDATE tb_admin SET admin_foto='$logo' where admin_id='$id' ");
                }
            }

            redirect(base_url() . 'dashboard/profil/?alert=sukses');
        } else {
            // id pengguna yang sedang login
            $id_pengguna = $this->session->userdata('id');

            $where = array(
                'admin_id' => $id_pengguna
            );

            $data['profil'] = $this->m_data->edit_data($where, 'tb_admin')->result();

            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_profil', $data);
            $this->load->view('dashboard/v_footer');
        }
    }



    // crud kriteria
    public function kriteria()
    {
        $data['kriteria'] = $this->m_data->get_data('tb_kriteria')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kriteria', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function kriteria_tambah()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kriteria_tambah');
        $this->load->view('dashboard/v_footer');
    }

    public function kriteria_aksi()
    {
        $this->form_validation->set_rules('kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');

        if ($this->form_validation->run() != false) {

            $kriteria = $this->input->post('kriteria');
            $bobot = $this->input->post('bobot');

            $data = array(
                'kriteria_nama' => $kriteria,
                'bobot_kriteria' => $bobot
            );

            $this->m_data->insert_data($data, 'tb_kriteria');

            redirect(base_url() . 'dashboard/kriteria');
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_kriteria_tambah');
            $this->load->view('dashboard/v_footer');
        }
    }

    public function kriteria_edit($id)
    {
        $where = array(
            'kriteria_id' => $id
        );
        $data['kriteria'] = $this->m_data->edit_data($where, 'tb_kriteria')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kriteria_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function kriteria_update()
    {
        $this->form_validation->set_rules('kriteria', 'Kategori', 'required');

        if ($this->form_validation->run() != false) {

            $id = $this->input->post('id');
            $kriteria = $this->input->post('kriteria');

            $where = array(
                'kriteria_id' => $id
            );

            $data = array(
                'kriteria_nama' => $kriteria
            );

            $this->m_data->update_data($where, $data, 'tb_kriteria');

            redirect(base_url() . 'dashboard/kriteria');
        } else {

            $id = $this->input->post('id');
            $where = array(
                'kriteria_id' => $id
            );
            $data['kriteria'] = $this->m_data->edit_data($where, 'tb_kriteria')->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_kriteria_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }


    public function kriteria_hapus($id)
    {
        $where = array(
            'kriteria_id' => $id
        );

        $this->m_data->delete_data($where, 'tb_kriteria');

        redirect(base_url() . 'dashboard/kriteria');
    }
    // end kriteria


    // Sub kriteria
    public function sub_kriteria()
    {
        $data['sub'] = $this->db->query("SELECT * FROM tb_kriteria as k,tb_sub_kriteria as s WHERE k.kriteria_id=s.kriteria_id ")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_sub_kriteria', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function sub_tambah()
    {
        $data['kriteria'] = $this->m_data->get_data('tb_kriteria')->result();

        // $data['tahun'] = $this->m_data->get_data('tb_tahun')->result();
        // $data['barang'] = $this->m_data->get_data('tb_barang')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_sub_tambah', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function sub_aksi()
    {
        // Wajib isi judul,konten dan kategori
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');



        if ($this->form_validation->run() != false) {

            $nama = $this->input->post('nama');
            $kriteria = $this->input->post('kriteria');
            $nilai = $this->input->post('nilai');


            $data = array(
                'sub_nama' => $nama,
                'kriteria_id' => $kriteria,
                'sub_nilai' => $nilai

            );

            $this->m_data->insert_data($data, 'tb_sub_kriteria');

            redirect(base_url() . 'dashboard/sub_kriteria');
        } else {
            $data['kriteria'] = $this->m_data->get_data('tb_kriteria')->result();

            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_sub_tambah', $data);
            $this->load->view('dashboard/v_footer');
        }
    }


    public function sub_edit($id)
    {
        // $where = array(
        //     'sub_id' => $id
        // );
        $data['sub'] = $this->db->query("SELECT * FROM tb_kriteria as k,tb_sub_kriteria as s WHERE k.kriteria_id=s.kriteria_id and s.sub_id=$id")->result();
        $data['kriteria'] = $this->m_data->get_data('tb_kriteria')->result();


        // $data['kategori'] = $this->m_data->get_data('tb_jkategori_barang')->result();
        // $data['jenis'] = $this->m_data->get_data('tb_jenis_barang')->result();
        // $data['merk'] = $this->m_data->get_data('tb_merk_barang')->result();
        // $data['tahun'] = $this->m_data->get_data('tb_tahun')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_sub_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    //belum jlan
    public function sub_update()
    {
        // Wajib isi judul,konten dan kategori
        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');

        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $kriteria = $this->input->post('kriteria');
            $nilai = $this->input->post('nilai');


            $data = array(
                'sub_nama' => $nama,
                'kriteria_id' => $kriteria,
                'sub_nilai' => $nilai

            );


            $where = array(
                'sub_id' => $id
            );


            $this->m_data->update_data($where, $data, 'tb_sub_kriteria');
            redirect(base_url() . 'dashboard/sub_kriteria');
        } else {
            $id = $this->input->post('id');
            $where = array(
                'sub_id' => $id
            );
            $data['sub'] = $this->db->query("SELECT * FROM tb_kriteria as k,tb_sub_kriteria as s WHERE k.kriteria_id=s.kriteria_id and s.sub_id=$id")->result();
            $data['kriteria'] = $this->m_data->get_data('tb_kriteria')->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_sub_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function sub_hapus($id)
    {
        $where = array(
            'sub_id' => $id
        );

        $this->m_data->delete_data($where, 'tb_sub_kriteria');

        redirect(base_url() . 'dashboard/sub_kriteria');
    }
    // end sub

    //jenis produk
    // Sub kriteria
    public function jenis_produk()
    {
        $data['jenis'] = $this->m_data->get_data('tb_jenisproduk')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_jenis', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function jenis_tambah()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_jenis_tambah');
        $this->load->view('dashboard/v_footer');
    }

    public function jenis_aksi()
    {
        // Wajib isi judul,konten dan kategori
        $this->form_validation->set_rules('nama', 'Nama', 'required');



        if ($this->form_validation->run() != false) {

            $nama = $this->input->post('nama');


            $data = array(
                'jenis_nama' => $nama
            );

            $this->m_data->insert_data($data, 'tb_jenisproduk');

            redirect(base_url() . 'dashboard/jenis_produk');
        } else {

            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_jenis_tambah');
            $this->load->view('dashboard/v_footer');
        }
    }


    public function jenis_edit($id)
    {

        $data['jenis'] = $this->db->query("SELECT * FROM tb_jenisproduk WHERE jenis_id=$id")->result();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_jenis_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    //belum jlan
    public function jenis_update()
    {
        // Wajib isi judul,konten dan kategori
        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');

            $data = array(
                'jenis_nama' => $nama

            );


            $where = array(
                'jenis_id' => $id
            );


            $this->m_data->update_data($where, $data, 'tb_jenisproduk');
            redirect(base_url() . 'dashboard/jenis_produk');
        } else {
            $id = $this->input->post('id');
            $where = array(
                'jenis_id' => $id
            );
            $data['jenis'] = $this->db->query("SELECT * FROM tb_jenisproduk where jenis_id=$id")->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_jenis_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function jenis_hapus($id)
    {
        $where = array(
            'jenis_id' => $id
        );

        $this->m_data->delete_data($where, 'tb_jenisproduk');

        redirect(base_url() . 'dashboard/jenis_produk');
    }
    //end jenis produk

    // Product
    public function product()
    {
        $data['product'] = $this->db->query("SELECT * FROM tb_produk as p,tb_jenisproduk as j WHERE p.produk_jenis=j.jenis_id order by p.produk_id desc  ")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_product', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function product_tambah()
    {
        $data['jenis'] = $this->m_data->get_data('tb_jenisproduk')->result();
        $data['kriteria'] = $this->m_data->get_data('tb_kriteria')->result();
        $data['sub'] = $this->m_data->get_data('tb_sub_kriteria')->result();
        // $data['tahun'] = $this->m_data->get_data('tb_tahun')->result();
        // $data['barang'] = $this->m_data->get_data('tb_barang')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_product_tambah', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function product_aksi()
    {
        // Wajib isi judul,konten dan kategori
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Product', 'required');
        $this->form_validation->set_rules('desc', 'Description', 'required');
        $this->form_validation->set_rules('1', 'Kriteria 1', 'required');
        $this->form_validation->set_rules('2', 'Kriteria 2', 'required');
        $this->form_validation->set_rules('3', 'Kriteria 3', 'required');
        $this->form_validation->set_rules('4', 'Kriteria 4', 'required');
        $this->form_validation->set_rules('5', 'Kriteria 5', 'required');
        $this->form_validation->set_rules('6', 'Kriteria 6', 'required');
        $this->form_validation->set_rules('7', 'Kriteria 7', 'required');
        if (empty($_FILES['sampul']['name'])) {
            $this->form_validation->set_rules('sampul', 'Gambar Produk', 'required');
        }


        if ($this->form_validation->run() != false) {
            $config['upload_path']   = './gambar/produk/';
            $config['allowed_types'] = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('sampul')) {

                // mengambil data tentang gambar
                $gambar = $this->upload->data();

                $sampul = $gambar['file_name'];
                $nama = $this->input->post('nama');
                $jenis = $this->input->post('jenis');
                $desc = $this->input->post('desc');


                // $nama = $this->input->post('nama');
                // $jenis = $this->input->post('jenis');
                // $desc = $this->input->post('desc');
                // $krit1 = $this->input->post('1');
                // $krit2 = $this->input->post('2');
                // $krit3 = $this->input->post('3');
                // $krit4 = $this->input->post('4');
                // $krit5 = $this->input->post('5');
                // $krit6 = $this->input->post('6');
                // $krit7 = $this->input->post('7');


                $data = array(
                    'produk_nama' => $nama,
                    'produk_jenis' => $jenis,
                    'produk_description' => $desc,
                    'produk_foto' => $sampul

                );

                $this->m_data->insert_data($data, 'tb_produk');
                $id = $this->db->query("SELECT produk_id FROM tb_produk  ORDER BY produk_id DESC LIMIT 1")->result();
                foreach ($id as $i) {
                    $idp = $i->produk_id;
                }
                // $where = array(
                //     'produk_id' => $idp
                // );
                for ($i = 1; $i <= 7; $i++) {
                    $nilai = array(
                        'produk_id' => $idp,
                        'sub_id' => $this->input->post($i)
                    );

                    // echo "<pre>";

                    // print_r($nilai);
                    // echo "<pre>";

                    $this->m_data->insert_data($nilai, 'tb_nilai');
                }

                redirect(base_url() . 'dashboard/product');
            } else {
                $this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());

                $data['jenis'] = $this->m_data->get_data('tb_jenisproduk')->result();
                $data['kriteria'] = $this->m_data->get_data('tb_kriteria')->result();
                $data['sub'] = $this->m_data->get_data('tb_sub_kriteria')->result();

                $this->load->view('dashboard/v_header');
                $this->load->view('dashboard/v_product_tambah', $data);
                $this->load->view('dashboard/v_footer');
            }
        } else {
            $data['jenis'] = $this->m_data->get_data('tb_jenisproduk')->result();
            $data['kriteria'] = $this->m_data->get_data('tb_kriteria')->result();
            $data['sub'] = $this->m_data->get_data('tb_sub_kriteria')->result();

            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_product_tambah', $data);
            $this->load->view('dashboard/v_footer');
        }
    }


    public function product_edit($id)
    {

        $data['product'] = $this->db->query("SELECT * FROM tb_produk as p,tb_jenisproduk as j WHERE p.produk_jenis=j.jenis_id and p.produk_id=$id")->result();
        $data['jenis'] = $this->m_data->get_data('tb_jenisproduk')->result();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_product_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    //belum jlan
    public function product_update()
    {
        // Wajib isi judul,konten dan kategori
        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('produk', 'Produk', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('desc', 'Description', 'required');



        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $produk = $this->input->post('produk');
            $jenis = $this->input->post('jenis');
            $desc = $this->input->post('desc');

            $data = array(
                'produk_nama' => $produk,
                'produk_jenis' => $jenis,
                'produk_description' => $desc

            );


            $where = array(
                'produk_id' => $id
            );


            $this->m_data->update_data($where, $data, 'tb_produk');


            if (!empty($_FILES['sampul']['name'])) {
                $config['upload_path']   = './gambar/produk/';
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('sampul')) {

                    // mengambil data tentang gambar
                    $gambar = $this->upload->data();

                    $data = array(
                        'produk_foto' => $gambar['file_name'],
                    );

                    $this->m_data->update_data($where, $data, 'tb_produk');

                    redirect(base_url() . 'dashboard/product');
                } else {
                    $this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());

                    $where = array(
                        'produk_id' => $id
                    );
                    $data['product'] = $this->db->query("SELECT * FROM tb_produk as p,tb_jenisproduk as j WHERE p.produk_jenis=j.jenis_id and p.produk_id=$id")->result();
                    $data['jenis'] = $this->m_data->get_data('tb_jenisproduk')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_product_edit', $data);
                    $this->load->view('dashboard/v_footer');
                }
            } else {
                redirect(base_url() . 'dashboard/product');
            }
        } else {
            $id = $this->input->post('id');

            $data['product'] = $this->db->query("SELECT * FROM tb_produk as p,tb_jenisproduk as j WHERE p.produk_jenis=j.jenis_id and p.produk_id=$id")->result();
            $data['jenis'] = $this->m_data->get_data('tb_jenisproduk')->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_product_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function product_hapus($id)
    {
        $where = array(
            'produk_id' => $id
        );

        $this->m_data->delete_data($where, 'tb_produk');

        redirect(base_url() . 'dashboard/product');
    }
    // end sub


    //nilai
    public function nilai()
    {
        $data['kriteria'] = $this->m_data->get_data('tb_kriteria')->result();
        $data['produk'] = $this->m_data->get_data('tb_produk')->result();
        $data['nilai'] = $this->db->query("SELECT * FROM tb_nilai as n, tb_produk as p, tb_sub_kriteria as s, tb_jenisproduk as j where n.produk_id=p.produk_id and n.sub_id=s.sub_id AND p.produk_jenis=j.jenis_id")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_product_nilai', $data);
        $this->load->view('dashboard/v_footer');
    }
    public function nilai_edit($id)
    {
        $data['sub'] = $this->m_data->get_data('tb_sub_kriteria')->result();
        $data['kriteria'] = $this->m_data->get_data('tb_kriteria')->result();
        $data['jenis'] = $this->m_data->get_data('tb_jenisproduk')->result();
        $data['produk'] = $this->db->query("SELECT * From tb_produk where produk_id = $id ")->result();
        $data['nilai'] = $this->db->query("SELECT * FROM tb_nilai as n, tb_produk as p, tb_sub_kriteria as s, tb_kriteria as k, tb_jenisproduk as j where n.produk_id=p.produk_id and n.sub_id=s.sub_id AND p.produk_jenis=j.jenis_id and k.kriteria_id=s.kriteria_id and p.produk_id = $id ORDER BY k.kriteria_id asc ")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_nilai_edit', $data);
        $this->load->view('dashboard/v_footer');
    }
    public function nilai_aksi()
    {
        // Wajib isi judul,konten dan kategori
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Product', 'required');
        $this->form_validation->set_rules('1', 'Kriteria 1', 'required');
        $this->form_validation->set_rules('2', 'Kriteria 2', 'required');
        $this->form_validation->set_rules('3', 'Kriteria 3', 'required');
        $this->form_validation->set_rules('4', 'Kriteria 4', 'required');
        $this->form_validation->set_rules('5', 'Kriteria 5', 'required');
        $this->form_validation->set_rules('6', 'Kriteria 6', 'required');
        $this->form_validation->set_rules('7', 'Kriteria 7', 'required');


        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $jenis = $this->input->post('jenis');

            $data = array(
                'produk_nama' => $nama,
                'produk_jenis' => $jenis

            );
            $where = array(
                'produk_id' => $id
            );

            // $this->m_data->insert_data($data, 'tb_produk');
            // $this->m_data->update_data($where, $data, 'tb_produk');
            $m = 1;
            $idp = $this->db->query("SELECT * FROM `tb_nilai` WHERE produk_id=$id")->result();
            foreach ($idp as $k) {



                $where = array(
                    'nilai_id' => $k->nilai_id
                );
                $data = array(
                    'sub_id' => $this->input->post($m)
                );
                $this->m_data->update_data($where, $data, 'tb_nilai');
                $m++;
            }
            redirect(base_url() . 'dashboard/nilai');
        } else {
            $id = $this->input->post('id');
            $data['sub'] = $this->m_data->get_data('tb_sub_kriteria')->result();
            $data['kriteria'] = $this->m_data->get_data('tb_kriteria')->result();
            $data['jenis'] = $this->m_data->get_data('tb_jenisproduk')->result();
            $data['produk'] = $this->db->query("SELECT * From tb_produk where produk_id = $id ")->result();
            $data['nilai'] = $this->db->query("SELECT * FROM tb_nilai as n, tb_produk as p, tb_sub_kriteria as s, tb_kriteria as k, tb_jenisproduk as j where n.produk_id=p.produk_id and n.sub_id=s.sub_id AND p.produk_jenis=j.jenis_id and k.kriteria_id=s.kriteria_id and p.produk_id = $id ORDER BY k.kriteria_id asc ")->result();

            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_nilai_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    //end nilai


    // ganti password
    public function ganti_password()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_ganti_password');
        $this->load->view('dashboard/v_footer');
    }

    public function ganti_password_aksi()
    {

        // form validasi
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[8]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password Baru', 'required|matches[password_baru]');

        // cek validasi
        if ($this->form_validation->run() != false) {

            // menangkap data dari form
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            $konfirmasi_password = $this->input->post('konfirmasi_password');

            // cek kesesuaian password lama dengan id pengguna yang sedang login dan password lama
            $where = array(
                'admin_id' => $this->session->userdata('id'),
                'admin_password' => md5($password_lama)
            );
            $cek = $this->m_data->cek_login('tb_admin', $where)->num_rows();

            // cek kesesuaikan password lama
            if ($cek > 0) {

                // update data password pengguna
                $w = array(
                    'admin_id' => $this->session->userdata('id')
                );
                $data = array(
                    'admin_password' => md5($password_baru)
                );
                $this->m_data->update_data($w, $data, 'tb_admin');

                // alihkan halaman kembali ke halaman ganti password
                redirect('dashboard/ganti_password?alert=sukses');
            } else {
                // alihkan halaman kembali ke halaman ganti password
                redirect('dashboard/ganti_password?alert=gagal');
            }
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_ganti_password');
            $this->load->view('dashboard/v_footer');
        }
    }
    // end of ganti password
    public function perangkingan()
    {

        // reset nilai dan rank ke 0
        $produk = $this->m_data->get_data('tb_produk')->result();
        foreach ($produk as $pr) {
            $data = array(
                'produk_hasil' => 0,
                'produk_rank' => 0
            );
            $where = array(
                'produk_id' => $pr->produk_id
            );
            $this->m_data->update_data($where, $data, 'tb_produk');
        }

        // jenis 1
        //mengambil id produk
        $did = $this->db->query("SELECT produk_id from tb_produk where produk_jenis=1")->result();
        foreach ($did as $d) {
            $dataid[] = $d->produk_id;
        }


        // jumlah produk dan id maximal untuk jenis 1
        $jp1 = $this->db->query("SELECT COUNT(produk_id) as p FROM tb_produk where produk_jenis=1")->result();
        $maxid = $this->db->query("SELECT MAX(produk_id) as max  FROM tb_produk where produk_jenis=1")->result();
        foreach ($maxid as $m) {
            $m_id = $m->max;
        }
        foreach ($jp1 as $j) {
            $j_produkj1 = $j->p;
        }
        // end jenis 1 


        // jenis 2
        //mengambil id produk
        $did2 = $this->db->query("SELECT produk_id from tb_produk where produk_jenis=2")->result();
        foreach ($did2 as $d) {
            $dataid2[] = $d->produk_id;
        }


        // jumlah produk dan id maximal untuk jenis 1
        $jp2 = $this->db->query("SELECT COUNT(produk_id) as p FROM tb_produk where produk_jenis=2")->result();
        $maxid2 = $this->db->query("SELECT MAX(produk_id) as max  FROM tb_produk where produk_jenis=2")->result();
        foreach ($maxid2 as $m) {
            $m_id2 = $m->max;
        }
        foreach ($jp2 as $j) {
            $j_produkj2 = $j->p;
        }
        // end jenis 1 




        //menghitung jumlah data kriteria 
        $jkrit = $this->db->query("SELECT COUNT(kriteria_id) as j FROM tb_kriteria")->result();
        foreach ($jkrit as $j) {
            $j_kriteria = $j->j;
        }
        $krit = $this->m_data->get_data('tb_kriteria')->result();
        foreach ($krit as $k) {
            $bobot[] = $k->bobot_kriteria;
        }


        //mencari bilangan sub terkecil dari masing masing kriteria untuk jenis 1
        for ($i = 0; $i < $j_kriteria; $i++) {
            $id = $i + 1;
            ${'c' . $id} = $this->db->query("SELECT * FROM tb_nilai as n, tb_produk as p, tb_sub_kriteria as s, tb_kriteria as k, tb_jenisproduk as j where n.produk_id=p.produk_id  and n.sub_id=s.sub_id  and s.kriteria_id =$id  and k.kriteria_id = s.kriteria_id and p.produk_jenis= j.jenis_id and p.produk_jenis = 1  ORDER BY p.produk_id asc  ")->result();
            $bar = 0;

            foreach (${'c' . $id} as $a) {
                ${'min' . $id}[] = $a->sub_nilai;
                $min[$i] = min(${'min' . $id});


                $awal[$bar][$i] = $a->sub_nilai;
                $bar++;
            }
        }
        //end

        //mencari bilangan sub terkecil dari masing masing kriteria untuk jenis 2
        for ($i = 0; $i <= $j_kriteria; $i++) {
            $id = $i + 1;
            ${'c2' . $id} = $this->db->query("SELECT * FROM tb_nilai as n, tb_produk as p, tb_sub_kriteria as s, tb_kriteria as k, tb_jenisproduk as j where n.produk_id=p.produk_id  and n.sub_id=s.sub_id  and s.kriteria_id =$id  and k.kriteria_id = s.kriteria_id and p.produk_jenis= j.jenis_id and p.produk_jenis = 2  ORDER BY p.produk_id asc  ")->result();
            $bar2 = 0;

            foreach (${'c2' . $id} as $a) {
                ${'min2' . $id}[] = $a->sub_nilai;
                $min2[$i] = min(${'min2' . $id});


                $awal2[$bar2][$i] = $a->sub_nilai;
                $bar2++;
            }
        }



        $normalisasi = array();
        for ($i = 0; $i < $j_produkj1; $i++) {
            for ($j = 0; $j < $j_kriteria; $j++) {
                $hasil = ($awal[$i][$j] / $min[$j]) * 100;
                $normalisasi[$i][$j] = $hasil;
                $bobotxmatriks[$i][$j] = $hasil * $bobot[$j];
            }
        }
        // echo "<pre>";
        // print_r($min);
        // // print_r($bobotxmatriks);
        // // print_r($jumlahh);
        // echo "<pre>";

        $normalisasi2 = array();
        for ($i2 = 0; $i2 < $j_produkj2; $i2++) {
            for ($j2 = 0; $j2 < $j_kriteria; $j2++) {
                $hasil2 = ($awal2[$i2][$j2] / $min2[$j2]) * 100;
                $normalisasi2[$i2][$j2] = $hasil2;
                $bobotxmatriks2[$i2][$j2] = $hasil2 * $bobot[$j2];
            }
        }


        $jumlahh[] = array();
        for ($h = 0; $h < $i; $h++) {
            $sum = 0;
            for ($k = 0; $k < $j; $k++) {
                $sum = $sum + $bobotxmatriks[$h][$k];
            }
            $y = $dataid[$h];
            $where = array(
                'produk_id' => $y
            );

            $data = array(
                'produk_hasil' => $sum
            );

            $this->m_data->update_data($where, $data, 'tb_produk');
            $jumlahh[$y] = $sum;
        }

        $jumlahh2[] = array();
        for ($h2 = 0; $h2 < $i2; $h2++) {
            $sum2 = 0;
            for ($k2 = 0; $k2 < $j2; $k2++) {
                $sum2 = $sum2 + $bobotxmatriks2[$h2][$k2];
            }
            $y2 = $dataid2[$h2];
            $where = array(
                'produk_id' => $y2
            );

            $data = array(
                'produk_hasil' => $sum2
            );

            $this->m_data->update_data($where, $data, 'tb_produk');
            $jumlahh2[$y2] = $sum2;
        }

        $j_id = $this->db->query("SELECT jenis_id from tb_jenisproduk ")->result();
        foreach ($j_id as $d) {
            $in = 1;
            $jid = $d->jenis_id;
            $rank = $this->db->query("SELECT * from tb_produk where produk_jenis=$jid order by produk_hasil desc")->result();
            foreach ($rank as $r) {
                $where = array(
                    'produk_id' => $r->produk_id
                );

                $data = array(
                    'produk_rank' => $in
                );

                $this->m_data->update_data($where, $data, 'tb_produk');
                $in++;
            }
        }






        $this->hasil_perhitungan_metode($min, $normalisasi, $bobotxmatriks, $j_kriteria, $j_produkj1, $dataid, $m_id, $min2, $normalisasi2, $bobotxmatriks2, $dataid2, $m_id2, $j_produkj2);
        // echo "<pre>";
        // print_r($jid);
        // // print_r($bobotxmatriks);
        // // print_r($jumlahh);
        // echo "<pre>";
    }
    private function hasil_perhitungan_metode($min, $normalisasi, $bobotxmatriks, $j_kriteria, $j_produk1, $dataid, $m_id, $min2, $normalisasi2, $bobotxmatriks2, $dataid2, $m_id2, $j_produkj2)
    {
        // $data['awal'] = $this->m_data->get_data('cpi')->result();
        $data['kriteria'] = $this->m_data->get_data('tb_kriteria')->result();
        $data['produk'] = $this->m_data->get_data('tb_produk')->result();
        $data['nilai'] = $this->db->query("SELECT * FROM tb_nilai as n, tb_produk as p, tb_sub_kriteria as s, tb_jenisproduk as j where n.produk_id=p.produk_id and n.sub_id=s.sub_id AND p.produk_jenis=j.jenis_id")->result();
        $data['hasil1'] = $this->db->query("SELECT * From tb_produk where produk_jenis = 1 order by produk_rank ASC")->result();
        $data['hasil2'] = $this->db->query("SELECT * From tb_produk where produk_jenis = 2 order by produk_rank ASC")->result();
        $data['j_kriteria'] = $j_kriteria;
        $data['j_produk'] = $j_produk1;
        $data['j_produk2'] = $j_produkj2;



        $data['dataid'] = $dataid;
        $data['maxid'] = $m_id;
        // $data['min'] = $min;
        $data['normalisasi'] = $normalisasi;
        $data['bobotxmatriks'] = $bobotxmatriks;
        // $data['jumlahh'] = $jumlahh;

        $data['dataid2'] = $dataid2;
        $data['maxid2'] = $m_id2;
        // $data['min2'] = $min2;
        $data['normalisasi2'] = $normalisasi2;
        $data['bobotxmatriks2'] = $bobotxmatriks2;
        // $data['jumlahh2'] = $jumlahh2;

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_rank', $data);
        $this->load->view('dashboard/v_footer');
    }
}
