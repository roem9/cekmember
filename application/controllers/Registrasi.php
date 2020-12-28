<?php
    class Registrasi extends CI_CONTROLLER {
        public function __construct(){
            parent::__construct();
            $this->load->model('Admin_model');
        }

        public function index(){
            $data['title'] = 'Form Registrasi';
            $this->load->view("templates/header-login", $data);
            $this->load->view("registrasi/formregistrasi");
            $this->load->view("templates/footer");
        }
   
        public function add_peserta(){
            $tgl_masuk = date("Y-m-d");
            $user = $this->username($tgl_masuk);
            $password = date('dmY', strtotime($this->input->post("tgl_lahir", TRUE)));
            $data = [
                "nama" => $this->input->post("nama", TRUE),
                "no_hp" => $this->input->post("no_hp", TRUE),
                "alamat" => $this->input->post("alamat", TRUE),
                "tgl_lahir" => $this->input->post("tgl_lahir", TRUE),
                "tgl_masuk" => $tgl_masuk,
                "t4_lahir" => $this->input->post("t4_lahir", TRUE),
                "email" => $this->input->post("email", TRUE),
                "username" => "",
                "password" => MD5($password),
                "catatan" => $this->input->post("catatan", TRUE),
            ];

            $this->Admin_model->add_data("user", $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i> Berhasil mendaftarkan data Anda. Silahkan menunggu konfirmasi dari Admin melalui whatsapp<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect("registrasi");
        }

        
        public function username($tgl){
            $username = $this->Admin_model->get_username_terakhir($tgl);
            if($username){
                $id = $username['id'] + 1;
            } else {
                $id = 1;
            }

            if($id >= 1 && $id < 10){
                $user = date('ym', strtotime($tgl))."000".$id;
            } else if($id >= 10 && $id < 100){
                $user = date('ym', strtotime($tgl))."00".$id;
            } else if($id >= 100 && $id < 1000){
                $user = date('ym', strtotime($tgl))."0".$id;
            } else {
                $user = date('ym', strtotime($tgl)).$id;
            }
            return $user;
        }
    }