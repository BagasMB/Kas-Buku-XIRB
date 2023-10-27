<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul_halaman'] = 'Halaman | Menu';
        $data['title'] = 'Menu';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambahMenu()
    {
        $data = array(
            'menu'      => $this->input->post('menu'),
            'url'       => $this->input->post('url'),
            'icon'      => $this->input->post('icon'),
            'is_active' => 1,
        );
        $this->db->insert('user_menu', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-circle-check me-2"></i>Yeaaaaaaaaaay!!!</div>');
        redirect('menu');
    }

    public function editMenu()
    {
        $data = array(
            'menu'      => $this->input->post('menu'),
            'url'       => $this->input->post('url'),
            'icon'      => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active'),
        );

        $where = array('id' => $this->input->post('id'));
        $this->db->update('user_menu', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-circle-check me-2"></i>Gemgeekang Gacorr!!!</div>');
        redirect('menu');
    }

    public function hapusMenu($id)
    {
        $where = array('id' => $id);
        $this->db->delete('user_menu', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-trash me-2"></i>Kok di hapus si kak!!!</div>');
        redirect('menu');
    }

    public function access()
    {
        $data['judul_halaman'] = 'Halaman | Access Menu';
        $data['title'] = 'Menu Access';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['access'] = $this->db->get('user_access_menu')->result_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('menu/access', $data);
        $this->load->view('layout/footer');
    }

    public function tambahAccessMenu()
    {
        $data = array(
            'level_id'      => $this->input->post('level_id'),
            'menu_id'       => $this->input->post('menu_id'),
        );
        $this->db->insert('user_access_menu', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-circle-check me-2"></i>Yeaaaaaaaaaay!!!</div>');
        redirect('access');
    }

    public function editAccessMenu()
    {
        $data = array(
            'level_id'      => $this->input->post('level_id'),
            'menu_id'       => $this->input->post('menu_id'),
        );
        $where = array('id' => $this->input->post('id'));
        $this->db->update('user_access_menu', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-circle-check me-2"></i>Gemgeekang Gacorr!!!</div>');
        redirect('access');
    }

    public function hapusAccessMenu($id)
    {
        $where = array('id' => $id);
        $this->db->delete('user_access_menu', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-trash me-2"></i>Kok di hapus si kak!!!</div>');
        redirect('access');
    }

}
