<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // cek session yang login,  
        // jika session status tidak sama dengan session telah_login, berarti pengguna belum login 
        // maka halaman akan di alihkan kembali ke halaman login.  

        $this->load->model('m_data');
        if ($this->session->userdata('status') == "telah_login") {
            redirect(base_url() . 'dashboard');
        }
    }
    public function index()
    {
        $this->load->view('v_login');
    }

    public function aksi()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != false) {

            // menangkap data username dan password dari halaman login
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $where = array(
                'admin_username' => $username,
                'admin_password' => md5($password),
                // 'pengguna_status' => 1
            );

            // $this->load->model('m_data');

            // cek kesesuaian login pada table pengguna
            $cek = $this->m_data->cek_login('tb_admin', $where)->num_rows();

            // cek jika login benar
            if ($cek > 0) {

                // ambil data pengguna yang melakukan login
                $data = $this->m_data->cek_login('tb_admin', $where)->row();

                // buat session untuk pengguna yang berhasil login
                $data_session = array(
                    'id' => $data->admin_id,
                    'username' => $data->admin_username,
                    'admin_id' => $data->admin_id,
                    // 'level' => $data->pengguna_level,
                    'status' => 'telah_login'
                );
                $this->session->set_userdata($data_session);

                // alihkan halaman ke halaman dashboard pengguna

                redirect(base_url() . 'dashboard');
            } else {
                redirect(base_url() . 'login?alert=gagal');
            }
        } else {
            $this->load->view('v_login');
        }
    }
}


    // public function k_means_clustering()
    // {

    //     // $jumlah_mhs = $this->db->query("SELECT  count(*) from tb_nilai")->num_rows();
    //     $banyak = $this->m_data->get_data('tb_penjualan')->num_rows();
    //     // $total = implode($jumlah);
    //     for ($i = 0; $i < $banyak; $i++) {
    //         $clusterawal[$i] = "1";
    //     }

    //     $centro1[0] = array('25', '22', '145000');
    //     $centro2[0] = array('15', '11', '139000');
    //     $centro3[0] = array('20', '11', '124000');


    //     $status = 'false';
    //     $loop = '0';
    //     $x = 0;
    //     while ($status == 'false') {
    //         // echo "<pre>";
    //         // print_r($centro1[$loop]);
    //         // print_r($centro2[$loop]);
    //         // print_r($centro3[$loop]);
    //         // echo "<pre>";
    //         // echo "<hr>";

    //         $data2 = $this->db->query("SELECT * FROM tb_penjualan");
    //         foreach ($data2->result() as $k) {
    //             // extract($data);
    //             // echo $k->uts;
    //             // echo "   ";
    //             $hasilc1 = 0;
    //             $hasilc2 = 0;
    //             $hasilc3 = 0;

    //             //Proses Pencarian Nilai Centro 1
    //             $hasilc1 = sqrt(pow($k->penjualan_stok - $centro1[$loop][0], 2) + pow($k->penjualan_terjual - $centro1[$loop][1], 2) + pow($k->penjualan_harga - $centro1[$loop][2], 2));

    //             //Proses Pencarian Nilai Centro 2
    //             $hasilc2 = sqrt(pow($k->penjualan_stok - $centro2[$loop][0], 2) +  pow($k->penjualan_terjual - $centro2[$loop][1], 2) + pow($k->penjualan_harga - $centro2[$loop][2], 2));

    //             //Proses Pencarian Nilai Centro 3
    //             $hasilc3 = sqrt(pow($k->penjualan_stok - $centro3[$loop][0], 2) +  pow($k->penjualan_terjual - $centro3[$loop][1], 2) + pow($k->penjualan_harga - $centro3[$loop][2], 2));

    //             // echo "<pre>";
    //             // print_r($hasilc1);
    //             // echo "<br>";
    //             // print_r($hasilc2);
    //             // echo "<br>";
    //             // print_r($hasilc3);
    //             // echo "<pre>";
    //             // echo "<hr>";

    //             if ($hasilc1 < $hasilc2 && $hasilc1 < $hasilc3) {
    //                 $clusterakhir[$x] = 'C1';
    //                 // update_mahasiswa($mysqli, $id, 'C1')

    //                 $cluster = 'C1';
    //                 $where = array(
    //                     'penjualan_id' => $k->penjualan_id
    //                 );

    //                 $data = array(
    //                     'cluster' => $cluster
    //                 );
    //                 $this->m_data->update_data($where, $data, 'tb_penjualan');
    //             } else if ($hasilc2 < $hasilc1 && $hasilc2 < $hasilc3) {
    //                 $clusterakhir[$x] = 'C2';
    //                 // update_mahasiswa($mysqli, $id, 'C2');
    //                 $cluster = 'C2';
    //                 $where = array(
    //                     'penjualan_id' => $k->penjualan_id
    //                 );

    //                 $data = array(
    //                     'cluster' => $cluster
    //                 );
    //                 $this->m_data->update_data($where, $data, 'tb_penjualan');
    //             } else {
    //                 $clusterakhir[$x] = 'C3';
    //                 $cluster = 'C3';
    //                 $where = array(
    //                     'penjualan_id' => $k->penjualan_id
    //                 );

    //                 $data = array(
    //                     'cluster' => $cluster
    //                 );
    //                 $this->m_data->update_data($where, $data, 'tb_penjualan');
    //                 // update_mahasiswa($mysqli, $id, 'C3');
    //             }
    //             // echo "<pre>";
    //             // print_r($clusterakhir[$x]);
    //             // echo "<br>";
    //             // print_r($k->penjualan_id);
    //             // echo "<pre>";
    //             // echo "<hr>";
    //             //Penambhan Counter Index
    //             $x += 1;
    //         }

    //         $loop += 1;
    //         //Proses mencari centroid baru ambil dari basis data.
    //         //Centroid Baru Pusat 1
    //         $stok1 = $this->db->query("SELECT avg(penjualan_stok)as avgt from tb_penjualan where cluster='C1' ")->result();
    //         foreach ($stok1 as $d1) {
    //             $centro1[$loop][0] = $d1->avgt;
    //         }
    //         $terjual1 = $this->db->query("SELECT avg(penjualan_terjual)as avgt from tb_penjualan where cluster='C1' ")->result();
    //         foreach ($terjual1 as $d1) {
    //             $centro1[$loop][1] = $d1->avgt;
    //         }
    //         $harga1 = $this->db->query("SELECT avg(penjualan_harga)as avgt from tb_penjualan where cluster='C1' ")->result();
    //         foreach ($harga1 as $d1) {
    //             $centro1[$loop][2] = $d1->avgt;
    //         }

    //         // $centro1[$loop][0] = caridata($mysqli,"select avg(uts) from tb_nilai where set_sementara='C1'");
    //         // $centro1[$loop][1] = caridata($mysqli, "select avg(tugas) from tb_nilai where set_sementara='C1'");
    //         // $centro1[$loop][2] = caridata($mysqli, "select avg(uas) from tb_nilai where set_sementara='C1'");

    //         // //Centroid Baru Pusat 2
    //         $stok2 = $this->db->query("SELECT avg(penjualan_stok)as avgt from tb_penjualan where cluster='C2' ")->result();
    //         foreach ($stok2 as $d1) {
    //             $centro2[$loop][0] = $d1->avgt;
    //         }
    //         $terjual2 = $this->db->query("SELECT avg(penjualan_terjual)as avgt from tb_penjualan where cluster='C2' ")->result();
    //         foreach ($terjual2 as $d1) {
    //             $centro2[$loop][1] = $d1->avgt;
    //         }
    //         $harga2 = $this->db->query("SELECT avg(penjualan_harga)as avgt from tb_penjualan where cluster='C2' ")->result();
    //         foreach ($harga2 as $d1) {
    //             $centro2[$loop][2] = $d1->avgt;
    //         }
    //         // $centro2[$loop][0] = caridata($mysqli, "select avg(uts) from tb_nilai where set_sementara='C2'");
    //         // $centro2[$loop][1] = caridata($mysqli, "select avg(tugas) from tb_nilai where set_sementara='C2'");
    //         // $centro2[$loop][2] = caridata($mysqli, "select avg(uas) from tb_nilai where set_sementara='C2'");

    //         // //Centroid Baru Pusat 3

    //         $stok3 = $this->db->query("SELECT avg(penjualan_stok)as avgt from tb_penjualan where cluster='C3' ")->result();
    //         foreach ($stok3 as $d1) {
    //             $centro3[$loop][0] = $d1->avgt;
    //         }
    //         $terjual3 = $this->db->query("SELECT avg(penjualan_terjual)as avgt from tb_penjualan where cluster='C3' ")->result();
    //         foreach ($terjual3 as $d1) {
    //             $centro3[$loop][1] = $d1->avgt;
    //         }
    //         $harga3 = $this->db->query("SELECT avg(penjualan_harga)as avgt from tb_penjualan where cluster='C3' ")->result();
    //         foreach ($harga3 as $d1) {
    //             $centro3[$loop][2] = $d1->avgt;
    //         }
    //         // $centro3[$loop][0] = caridata($mysqli, "select avg(uts) from tb_nilai where set_sementara='C3'");
    //         // $centro3[$loop][1] = caridata($mysqli, "select avg(tugas) from tb_nilai where set_sementara='C3'");
    //         // $centro3[$loop][2] = caridata($mysqli, "select avg(uas) from tb_nilai where set_sementara='C3'");

    //         $status = 'true';
    //         for ($i = 0; $i < $banyak; $i++) {
    //             if ($clusterawal[$i] != $clusterakhir[$i]) {
    //                 $status = 'false';
    //             }
    //         }

    //         if ($status == 'false') {
    //             $clusterawal = $clusterakhir;
    //         }
    //     }
    //     // echo "Proses berhasil dilakukan sebanyak $loop kali";
    //     // redirect(base_url() . 'dashboard/profil/?alert=sukses');

    //     redirect(base_url() . 'dashboard/hasil_perhitungan_metode');
    // }