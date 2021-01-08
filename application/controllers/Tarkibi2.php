<?php 
class Tarkibi2 extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Arab_model");
        $this->load->model("Admin_model");
        $this->load->model("Tarkibi2_model");
        ini_set('xdebug.var_display_max_depth', '10');
        ini_set('xdebug.var_display_max_children', '256');
        ini_set('xdebug.var_display_max_data', '1024');
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
            redirect(base_url("login"));
        }
    }

    public function kelas($id_kelas){
        $id = $this->session->userdata('id');
        $data['user'] = $this->Admin_model->get_one("user", ["id_user" => $id]);
        $data['kelas'] = $this->Admin_model->get_one("kelas", ["MD5(id_kelas)" => $id_kelas]);
        $data['link'] = $id_kelas;
        for ($i=1; $i < 25; $i++) { 
            $list_pertemuan[$i]['id'] = $i;
            $list_pertemuan[$i]['pertemuan'] = "Pertemuan ".$i;
            $list_pertemuan[$i]['md5'] = MD5("Pertemuan ".$i);
        }

        if(!empty($_GET['pertemuan'])){
            $pertemuan = $this->searchForId($_GET['pertemuan'], $list_pertemuan);
            
            $val = $pertemuan['id']-1;
            $back = $this->Admin_model->get_one("materi_kelas", ["md5(id_kelas)" => $id_kelas, "materi" => "Pertemuan $val"]);
            if($back) {
                $data['back'] = md5($back['materi']);
            } else {
                $data['back'] = "";
            }
            
            $val = $pertemuan['id']+1;
            $next = $this->Admin_model->get_one("materi_kelas", ["md5(id_kelas)" => $id_kelas, "materi" => "Pertemuan $val"]);
            if($next) {
                $data['next'] = md5($next['materi']);
            } else {
                $data['next'] = "";
            }

            $data['title'] = $pertemuan['pertemuan'];
            $data['image'] = $this->Tarkibi2_model->materi_pertemuan($pertemuan['id']);

            $data['latihan'] = $this->Tarkibi2_model->latihan($pertemuan['id']);

            // latihan
                // $data['latihan'] = $this->Admin_model->get_one("latihan_hifdzi_1", ["MD5(id_kelas)" => $id_kelas, "pertemuan" => $data['title'], "latihan" => "Harian", "id_user" => $id]);
            // latihan
            
            $this->load->view("templates/header-user", $data);
            $this->load->view("tarkibi_2/materi-mufrodat", $data);
            $this->load->view("templates/footer-user", $data);
        } else if(!empty($_GET['latihan'])){
            $pertemuan = $this->searchForId($_GET['latihan'], $list_pertemuan);

            $data['materi'] = $pertemuan['pertemuan'];
            $data['redirect'] = "tarkibi2/kelas/".$id_kelas."?pertemuan=".MD5($data['materi']);
            $data['reload'] = "tarkibi2/kelas/".$id_kelas."?latihan=".MD5($data['materi']);
            $data['id_kelas'] = $data['kelas']['id_kelas'];

            $data['latihan'] = $this->Admin_model->get_one("latihan_hifdzi_1", ["MD5(id_kelas)" => $id_kelas, "pertemuan" => $data['materi'], "latihan" => "Harian", "id_user" => $id]);
            
            $mufrodat = $this->Tarkibi2_model->latihan($pertemuan['id']);

            $data['petunjuk'] = $mufrodat['petunjuk'];
            $data['mufrodat'] = $mufrodat['mufrodat'];
            shuffle($data['mufrodat']);
            
            // view
                if($mufrodat['latihan'] == "latihan ketik"){
                    $page = "tarkibi_2/latihan-ketik";
                    $data['title'] = "Latihan " . $pertemuan['pertemuan'];

                    foreach ($data['mufrodat'] as $i => $kata) {
                        $data['kata'][$i] = $kata;
                    }

                    shuffle($data['mufrodat']);
                    shuffle($data['kata']);
                } else if($mufrodat['latihan'] == "latihan pg"){
                    $page = "tarkibi_2/latihan-pg";
                    $data['title'] = "Latihan " . $pertemuan['pertemuan'];
                    
                    shuffle($data['mufrodat']);
                    $data['kata'] = ["مبني", "معرب", "مبني و معرب"];
                    // var_dump($data);
                    // exit();
                }
            
                $this->load->view("templates/header-user", $data);

                $this->load->view($page, $data);
                
                $this->load->view("templates/footer-user", $data);
            // view
        } else if(!empty($_GET['ujian'])){
            $data['id_kelas'] = $data['kelas']['id_kelas'];

            $data['latihan'] = $this->Admin_model->get_one("latihan_hifdzi_1", ["MD5(id_kelas)" => $id_kelas, "md5(pertemuan)" => $_GET['ujian'], "latihan" => "Form", "id_user" => $id]);
            
            
            if($_GET['ujian'] == md5("Ujian Pekan 1")){
                $data['materi'] = "Ujian Pekan 1";
                $data['redirect'] = "hifdzi1/kelas/".$id_kelas;
                $data['reload'] = "hifdzi1/kelas/".$id_kelas."?ujian=".$_GET['ujian'];

                // pertemuan 1
                $mufrodat = $this->Hifdzi1_model->pertemuan("1");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "0", "2");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "2", "2");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 2
                $mufrodat = $this->Hifdzi1_model->pertemuan("2");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "4", "2");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "6", "2");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "8", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 3
                $mufrodat = $this->Hifdzi1_model->pertemuan("3");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "11", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "14", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "17", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("4", $mufrodat, "20", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 4
                $mufrodat = $this->Hifdzi1_model->pertemuan("4");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "23", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "26", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 5
                $mufrodat = $this->Hifdzi1_model->pertemuan("5");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "29", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "32", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "35", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 6
                $mufrodat = $this->Hifdzi1_model->pertemuan("6");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "38", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "41", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "44", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("4", $mufrodat, "47", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

            } else if($_GET['ujian'] == md5("Ujian Pekan 2")){
                $data['materi'] = "Ujian Pekan 2";
                $data['redirect'] = "hifdzi1/kelas/".$id_kelas;
                $data['reload'] = "hifdzi1/kelas/".$id_kelas."?ujian=".$_GET['ujian'];

                // pertemuan 7
                $mufrodat = $this->Hifdzi1_model->pertemuan("7");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "0", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "3", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 8
                $mufrodat = $this->Hifdzi1_model->pertemuan("8");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "6", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "9", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 9
                $mufrodat = $this->Hifdzi1_model->pertemuan("9");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "12", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "15", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "18", "4");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 10
                $mufrodat = $this->Hifdzi1_model->pertemuan("10");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "22", "4");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "26", "4");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 11
                $mufrodat = $this->Hifdzi1_model->pertemuan("11");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "30", "4");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "34", "4");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "38", "4");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 12
                $mufrodat = $this->Hifdzi1_model->pertemuan("12");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "42", "4");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "46", "4");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
            } else if($_GET['ujian'] == md5("Ujian Pekan 3")){
                $data['materi'] = "Ujian Pekan 3";
                $data['redirect'] = "hifdzi1/kelas/".$id_kelas;
                $data['reload'] = "hifdzi1/kelas/".$id_kelas."?ujian=".$_GET['ujian'];

                // pertemuan 13
                $mufrodat = $this->Hifdzi1_model->pertemuan("13");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "0", "2");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "2", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "5", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("4", $mufrodat, "8", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 14
                $mufrodat = $this->Hifdzi1_model->pertemuan("14");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "11", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "14", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "17", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 15
                $mufrodat = $this->Hifdzi1_model->pertemuan("15");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "20", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "23", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 16
                $mufrodat = $this->Hifdzi1_model->pertemuan("16");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "26", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "29", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 17
                $mufrodat = $this->Hifdzi1_model->pertemuan("17");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "32", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "35", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 18
                $mufrodat = $this->Hifdzi1_model->pertemuan("18");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "38", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "41", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "44", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("4", $mufrodat, "47", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
            } else if($_GET['ujian'] == md5("Ujian Pekan 4")){
                $data['materi'] = "Ujian Pekan 4";
                $data['redirect'] = "hifdzi1/kelas/".$id_kelas;
                $data['reload'] = "hifdzi1/kelas/".$id_kelas."?ujian=".$_GET['ujian'];

                // pertemuan 19
                $mufrodat = $this->Hifdzi1_model->pertemuan("19");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "0", "2");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "2", "2");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "4", "2");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("4", $mufrodat, "6", "2");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 20
                $mufrodat = $this->Hifdzi1_model->pertemuan("20");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "8", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "11", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "14", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("4", $mufrodat, "17", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 21
                $mufrodat = $this->Hifdzi1_model->pertemuan("21");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "20", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "23", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "26", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("4", $mufrodat, "29", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 22
                $mufrodat = $this->Hifdzi1_model->pertemuan("22");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "32", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "35", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 23
                $mufrodat = $this->Hifdzi1_model->pertemuan("23");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "38", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "41", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 24
                $mufrodat = $this->Hifdzi1_model->pertemuan("24");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "44", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "47", "3");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
            } else if($_GET['ujian'] == md5("Ujian Akhir")){
                $data['materi'] = "Ujian Akhir";
                $data['redirect'] = "hifdzi1/kelas/".$id_kelas;
                $data['reload'] = "hifdzi1/kelas/".$id_kelas."?ujian=".$_GET['ujian'];

                // pertemuan 1
                $mufrodat = $this->Hifdzi1_model->pertemuan("1");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "0", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "1", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 2
                $mufrodat = $this->Hifdzi1_model->pertemuan("2");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "2", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "3", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "4", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 3
                $mufrodat = $this->Hifdzi1_model->pertemuan("3");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "5", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "6", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "7", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("4", $mufrodat, "8", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 4
                $mufrodat = $this->Hifdzi1_model->pertemuan("4");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "9", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "10", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 5
                $mufrodat = $this->Hifdzi1_model->pertemuan("5");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "11", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "12", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "13", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 6
                $mufrodat = $this->Hifdzi1_model->pertemuan("6");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "14", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "15", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "16", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("4", $mufrodat, "17", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 7
                $mufrodat = $this->Hifdzi1_model->pertemuan("7");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "18", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "19", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 8
                $mufrodat = $this->Hifdzi1_model->pertemuan("8");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "20", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "21", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 9
                $mufrodat = $this->Hifdzi1_model->pertemuan("9");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "22", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "23", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "24", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 10
                $mufrodat = $this->Hifdzi1_model->pertemuan("10");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "25", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "26", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 11
                $mufrodat = $this->Hifdzi1_model->pertemuan("11");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "27", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "28", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "29", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 12
                $mufrodat = $this->Hifdzi1_model->pertemuan("12");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "30", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "31", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                // pertemuan 13
                $mufrodat = $this->Hifdzi1_model->pertemuan("13");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "32", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "33", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "34", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("4", $mufrodat, "35", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 14
                $mufrodat = $this->Hifdzi1_model->pertemuan("14");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "36", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "37", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "38", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 15
                $mufrodat = $this->Hifdzi1_model->pertemuan("15");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "39", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "40", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 16
                $mufrodat = $this->Hifdzi1_model->pertemuan("16");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "41", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "42", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 17
                $mufrodat = $this->Hifdzi1_model->pertemuan("17");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "43", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "44", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 18
                $mufrodat = $this->Hifdzi1_model->pertemuan("18");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "45", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "46", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "47", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("4", $mufrodat, "48", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                // pertemuan 19
                $mufrodat = $this->Hifdzi1_model->pertemuan("19");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "49", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "50", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "51", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("4", $mufrodat, "52", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 20
                $mufrodat = $this->Hifdzi1_model->pertemuan("20");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "53", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "54", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "55", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("4", $mufrodat, "56", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 21
                $mufrodat = $this->Hifdzi1_model->pertemuan("21");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "57", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "58", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("3", $mufrodat, "59", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("4", $mufrodat, "60", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 22
                $mufrodat = $this->Hifdzi1_model->pertemuan("22");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "61", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "62", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 23
                $mufrodat = $this->Hifdzi1_model->pertemuan("23");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "63", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "64", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }

                // pertemuan 24
                $mufrodat = $this->Hifdzi1_model->pertemuan("24");
                shuffle($mufrodat);
                $kata = $this->searchForHal("1", $mufrodat, "65", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
                $kata = $this->searchForHal("2", $mufrodat, "66", "1");
                foreach ($kata as $kata) {
                    $data['mufrodat'][] = $kata;
                }
            }
            
            // view
                foreach ($data['mufrodat'] as $i => $kata) {
                    $data['title'] = $data['materi'];
                    $data['kata'][$i] = $kata;
                    $data['kata_arab'][$i] = $kata['arti'];
                }
            
                shuffle($data['mufrodat']);
                shuffle($data['kata']);
                $this->load->view("templates/header-user", $data);
                $this->load->view("hifdzi_1/latihan-ujian", $data);
                $this->load->view("templates/footer-user", $data);
            // view
            
        } else {
            $data['title'] = "Materi Tarkibi 2";
            
            // pertemuan
                // $pertemuan = $this->Admin_model->get_all("materi_kelas", ["MD5(id_kelas)" => $id_kelas], "materi");
                // foreach ($pertemuan as $i => $pertemuan) {
                //     $data['pertemuan'][$i]['pertemuan'] = $pertemuan['materi'];
                //     $data['pertemuan'][$i]['latihan'] = $this->Admin_model->get_one("latihan_hifdzi_1", ["MD5(id_kelas)" => $id_kelas, "pertemuan" => $pertemuan['materi'], "latihan" => "Form", "id_user" => $id]);
                // }
            // pertemuan
    
            $this->load->view("templates/header-user", $data);
            $this->load->view("tarkibi_2/index-materi", $data);
            $this->load->view("templates/footer-user", $data);
        }

    }

    public function latihan($id){
        $data['reload'] = "";
        $data['redirect'] = "";
        $data['title'] = "Cek";

        if($id == 1){
            $data['soal'] = [
                [
                    "soal" => "أَنَا أَقْرَأُ الْكِتَابَ فِيْ الْمَسْكَنِ أَنَا أَقْرَأُ الْكِتَابَ فِيْ الْمَسْكَنِ أَنَا أَقْرَأُ الْكِتَابَ فِيْ الْمَسْكَنِ",
                ],
                [
                    "soal" => "أَنَا أَشْرَبُ اللَّبَنَ"
                ],
                [
                    "soal" => "أَنَا أَشْرَبُ اللَّبَنَ"
                ],
                [
                    "soal" => "أَنَا أَشْرَبُ اللَّبَنَ"
                ],
                [
                    "soal" => "أَنَا أَشْرَبُ اللَّبَنَ"
                ],
                [
                    "soal" => "أَنَا أَشْرَبُ اللَّبَنَ"
                ],
                [
                    "soal" => "أَنَا أَشْرَبُ اللَّبَنَ"
                ],
                [
                    "soal" => "أَنَا أَشْرَبُ اللَّبَنَ"
                ],
                [
                    "soal" => "أَنَا أَشْرَبُ اللَّبَنَ"
                ],
                [
                    "soal" => "أَنَا أَشْرَبُ اللَّبَنَ"
                ],
                [
                    "soal" => "أَنَا أَشْرَبُ اللَّبَنَ"
                ],
                [
                    "soal" => "أَنَا أَشْرَبُ اللَّبَنَ"
                ],
                [
                    "soal" => "أَنَا أَشْرَبُ اللَّبَنَ"
                ]
            ];
        }

        shuffle($data['soal']);

        $this->load->view("templates/header-user", $data);
        $this->load->view("tarkibi_2/latihan-1", $data);
        $this->load->view("templates/footer-user", $data);
    }

    public function add_harakat(){
        $answer = $this->input->post("answer");
        echo json_decode($answer);
    }

    
    // search 
        // untuk mencari pertemuan
        function searchForId($id, $array) {
            foreach ($array as $key => $val) {
                if ($val['md5'] === $id) {
                    return $val;
                }
            }
            return null;
        }
        
        function searchForBackNext($id, $array) {
            foreach ($array as $key => $val) {
                if ($val['id'] === $id) {
                    return $val;
                }
            }
            return "";
        }

        function searchForHal($hal, $array, $i, $jum) {
            $j = 0;
            foreach ($array as $val) {
                if ($val['hal'] == $hal) {
                    if($jum != $j){
                        $data[$i] = $val;
                        $i++;
                        $j++;
                    }
                }
            }
            return $data;
        }
    // search 

    // get 
        public function search_faq(){
            $search = $this->input->post("search");
            $data['faq'] = [];
            if($search != ""){
                $data['faq'] = $this->Admin_model->get_all_like("faq", "soal", $search, ["program" => "Hifdzi 1"]);
            } else {
                $data['faq'] = $this->Admin_model->get_all("faq", ["program" => "Hifdzi 1"]);
            }
            echo json_encode($data);
        }
    // get 
}