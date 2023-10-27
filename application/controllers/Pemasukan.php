<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pemasukan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Pemasukan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['masuk'] = $this->Pemasukan_model->getTransaksi();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('pemasukan/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambahPemasukan()
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required',);
        $this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');

        if ($this->form_validation->run() == true) {
            $this->Pemasukan_model->simpan();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-circle-check me-2"></i>Yeaaaaaaaaaay!!!</div>');
            redirect('pemasukan');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-circle-exclamation me-2"></i>Field tidak boleh kosong!!!</div>');
            redirect('pemasukan');
        }
    }

    public function hapus($id)
    {
        $where = array('id_transaksi' => $id);
        $this->db->delete('transaksi', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-trash me-2"></i>Kok di hapus si kak!!!</div>');
        redirect('pemasukan');
    }
}
