<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'User';
        $data['data_user'] = $this->User_model->getAllUser();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('user/user', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama Tidak Boleh Kosong'
        ]);

        $username = $this->input->post('username');
        $cek_username = $this->db->where('username', $username)->count_all_results('user');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-circle-exclamation me-2"></i>Yahh, Semua Field Harus DiIsi!!!</div>');
            redirect('user');
        } elseif ($cek_username == 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-circle-exclamation me-2"></i>Yahh, Username sudah digunakan!!!</div>');
            redirect('user');
        } else {
            $this->User_model->tambahUser();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-circle-check me-2"></i>Yeaaaaaaaaaay!!!</div>');
            redirect('user');
        }
    }

    public function edit()
    {
        $this->User_model->editUser();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-circle-check me-2"></i>Gemgeekang Gacorr!!!</div>');
        redirect('user');
    }

    public function hapus($id)
    {
        $where = array('id_user' => $id);
        $this->db->delete('user', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-trash me-2"></i>Kok di hapus si kak!!!</div>');
        redirect('user');
    }
}
