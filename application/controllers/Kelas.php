<?php
class Kelas extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Arab_model');
        $this->load->model('Admin_model');
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
            redirect(base_url("login"));
        }
    }

    public function index(){
        $id = $this->session->userdata("id");
        $data['title'] = "List Kelas";
        $data['user'] = $this->Admin_model->get_one("user", ["id_user" => $id]);
        
        // kelas & program
            // $data['kelas'] = [];
            $data['program'] = [];
            $kelas = $this->Admin_model->get_all("kelas_user", ["id_user" => $id, "id_kelas <>" => NULL]);
            foreach ($kelas as $i => $kelas) {
                $data['kelas'][$i] = $this->Admin_model->get_one("kelas", ["id_kelas" => $kelas['id_kelas']]);
                $data['kelas'][$i]['link'] = MD5($data['kelas'][$i]['program']);

                if($data['kelas'][$i]['id_civitas'] != 0) {
                    $pengajar = $this->Admin_model->get_one("civitas", ["id_civitas" => $data['kelas'][$i]['id_civitas']]);
                    $data['kelas'][$i]['guru'] = $pengajar['nama_civitas'];
                } else {
                    $data['kelas'][$i]['guru'] = "-";
                }
                $data['program'][$i] = $data['kelas'][$i]['program'];
            }
        // kelas & program

        $this->load->view("templates/header-user", $data);
        $this->load->view("kelas/index", $data);
        $this->load->view("templates/footer-user", $data);
    }

    public function ajax_list(){
        $id = $this->session->userdata("id");
        $data['kelas'] = [];
        $data['user'] = $this->Admin_model->get_one("user", ["id_user" => $id]);
        $kelas = $this->Admin_model->get_all("kelas_user", ["id_user" => $id, "id_kelas <>" => NULL]);
        foreach ($kelas as $i => $kelas) {
            $data['kelas'][$i] = $this->Admin_model->get_one("kelas", ["id_kelas" => $kelas['id_kelas']]);
            $data['kelas'][$i]['link'] = strtolower(str_replace(" ", "",$data['kelas'][$i]['program']))."/kelas/".MD5($kelas['id_kelas']);
            $data['kelas'][$i]['id_sertifikat'] = md5($kelas['id']);
            $data['kelas'][$i]['sertifikat'] = $kelas['sertifikat'];

            if($data['kelas'][$i]['id_civitas'] != 0) {
                $pengajar = $this->Admin_model->get_one("civitas", ["id_civitas" => $data['kelas'][$i]['id_civitas']]);
                $data['kelas'][$i]['guru'] = $pengajar['nama_civitas'];
            } else {
                $data['kelas'][$i]['guru'] = "-";
            }
            $data['program'][$i] = $data['kelas'][$i]['program'];
        }

        echo json_encode($data);
    }

    public function ajax_one(){
        $id = $this->session->userdata("id");
        $id_kelas = $_GET['id_kelas'];
        $data['user'] = $this->Admin_model->get_one("user", ["id_user" => $id]);
        $data['kelas'] = $this->Admin_model->get_one("kelas", ["MD5(id_kelas)" => $id_kelas]);
        $data['kelas']['link'] = strtolower(str_replace(" ", "",$data['kelas']['program']))."/kelas/".$id_kelas;
        
        // sertifikat 
        $kelas = $this->Admin_model->get_one("kelas_user", ["id_user" => $id, "md5(id_kelas)" => $id_kelas]);
        $data['kelas']['id_sertifikat'] = md5($kelas['id']);
        $data['kelas']['sertifikat'] = $kelas['sertifikat'];

        if($data['kelas']['id_civitas'] != 0) {
            $pengajar = $this->Admin_model->get_one("civitas", ["id_civitas" => $data['kelas']['id_civitas']]);
            $data['kelas']['guru'] = $pengajar['nama_civitas'];
        } else {
            $data['kelas']['guru'] = "-";
        }
        $data['program'] = $data['kelas']['program'];

        $data['pertemuan'] = [];

        $pertemuan = $this->Admin_model->get_all("materi_kelas", ["md5(id_kelas)" => $id_kelas], "id");
        foreach ($pertemuan as $i => $pertemuan) {
            $data['pertemuan'][$i] = $pertemuan;
            $data['pertemuan'][$i]['link'] = md5($pertemuan['materi']);
            $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["md5(id_kelas)" => $id_kelas, "pertemuan" => $pertemuan['materi'], "id_user" => $id, "latihan" => "Harian"]);
            if($nilai){
                $data['pertemuan'][$i]['nilai'] = $nilai['nilai'];
            } else {
                $data['pertemuan'][$i]['nilai'] = "-";
            }
        }

        $data['ujian'] = [];
        $ujian = $this->Admin_model->get_all("ujian_kelas", ["md5(id_kelas)" => $id_kelas]);
        foreach ($ujian as $i => $ujian) {
            $data['ujian'][$i] = $ujian;
            $data['ujian'][$i]['link'] = md5($ujian['materi']);
            $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["md5(id_kelas)" => $id_kelas, "pertemuan" => $ujian['materi'], "id_user" => $id, "latihan" => "Form"]);
            if($nilai){
                $data['ujian'][$i]['nilai'] = $nilai['nilai'];
            } else {
                $data['ujian'][$i]['nilai'] = "-";
            }
        }

        $data['faq'] = $this->Admin_model->get_all("faq", ["md5(id_kelas)" => $id_kelas]);

        echo json_encode($data);
    }

    // get 
        public function get_detail_kelas(){
            $id_user = $this->session->userdata("id");
            $id = $this->input->post("id");
            $data = $this->Admin_model->get_one("kelas", ["id_kelas" => $id]);
            $data['pertemuan'] = $this->Admin_model->get_all("materi_kelas", ["id_kelas" => $id], "id");

            // nilai tugas harian 
                foreach ($data['pertemuan'] as $i => $pertemuan) {
                    $data['nilai'][$i]['pertemuan'] = $pertemuan['materi'];
                    $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => $pertemuan['materi'], "latihan" => "Harian"]);
                    if($nilai) {
                        $data['nilai'][$i]['nilai'] = $nilai['nilai'];
                    } else {
                        $data['nilai'][$i]['nilai'] = 0;
                    }
                }
            // nilai tugas harian 
            
            // nilai tugas tambahan
                foreach ($data['pertemuan'] as $i => $pertemuan) {
                    $data['nilai_tambahan'][$i]['pertemuan'] = $pertemuan['materi'];
                    $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => $pertemuan['materi'], "latihan" => "Tambahan"]);
                    if($nilai) {
                        $data['nilai_tambahan'][$i]['nilai'] = $nilai['nilai'];
                    } else {
                        $data['nilai_tambahan'][$i]['nilai'] = 0;
                    }
                }
            // nilai tugas tambahan
            
            // nilai tugas hafalan
                foreach ($data['pertemuan'] as $i => $pertemuan) {
                    $data['nilai_hafalan'][$i]['pertemuan'] = $pertemuan['materi'];
                    $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => $pertemuan['materi'], "latihan" => "Hafalan"]);
                    if($nilai) {
                        $data['nilai_hafalan'][$i]['nilai'] = $nilai['nilai'];
                    } else {
                        $data['nilai_hafalan'][$i]['nilai'] = 0;
                    }
                }
            // nilai tugas hafalan

            // nilai ujian
                $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 1", "latihan" => "Form"]);
                if($nilai){$data['ujian'][0] = $nilai['nilai'];} else {$data['ujian'][0] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 1", "latihan" => "Input"]);
                if($nilai){$data['ujian'][1] = $nilai['nilai'];} else {$data['ujian'][1] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 2", "latihan" => "Form"]);
                if($nilai){$data['ujian'][2] = $nilai['nilai'];} else {$data['ujian'][2] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 2", "latihan" => "Input"]);
                if($nilai){$data['ujian'][3] = $nilai['nilai'];} else {$data['ujian'][3] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Ujian Pertengahan", "latihan" => "Input"]);
                if($nilai){$data['ujian'][4] = $nilai['nilai'];} else {$data['ujian'][4] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 3", "latihan" => "Form"]);
                if($nilai){$data['ujian'][5] = $nilai['nilai'];} else {$data['ujian'][5] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 3", "latihan" => "Input"]);
                if($nilai){$data['ujian'][6] = $nilai['nilai'];} else {$data['ujian'][6] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 4", "latihan" => "Form"]);
                if($nilai){$data['ujian'][7] = $nilai['nilai'];} else {$data['ujian'][7] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Ujian Pekan 4", "latihan" => "Input"]);
                if($nilai){$data['ujian'][8] = $nilai['nilai'];} else {$data['ujian'][8] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Ujian Akhir", "latihan" => "Form"]);
                if($nilai){$data['ujian'][9] = $nilai['nilai'];} else {$data['ujian'][9] = 0;};
                $nilai = $this->Admin_model->get_one("latihan_hifdzi_1", ["id_kelas" => $id, "id_user" => $id_user, "pertemuan" => "Ujian Akhir", "latihan" => "Input"]);
                if($nilai){$data['ujian'][10] = $nilai['nilai'];} else {$data['ujian'][10] = 0;};
            // nilai ujian

            $data['absen'] = $this->Admin_model->get_all("presensi_peserta", ["id_kelas" => $id, "id_user" => $id_user]);
            $peserta = $this->Admin_model->get_all("kelas_user", ["id_kelas" => $id]);
            foreach ($peserta as $i => $peserta) {
                $data['peserta'][$i] = $this->Admin_model->get_one("user", ["id_user" => $peserta['id_user']]);
            }
            echo json_encode($data);
        }

        public function get_faq(){
            $id = $this->input->post("id");
            $data = $this->Admin_model->get_one("faq", ["id" => $id]);
            echo json_encode($data);
        }
    // get 

    // add 
        public function add_hadir(){
            $id_user = $this->session->userdata("id");
            $data = [
                "id_kelas" => $this->input->post("id_kelas"),
                "pertemuan" => $this->input->post("pertemuan"),
                "id_user" => $id_user
            ];
            $cek = $this->Admin_model->get_one("presensi_peserta", $data);
            if($cek) $this->Admin_model->add_data("presensi_peserta", $data);
            echo json_encode($data['id_kelas']);
        }
    // add 
}