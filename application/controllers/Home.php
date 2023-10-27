<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Home_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = [
			'title' 		=> 'Dashboard',
			'user'			=> $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
			'tMasuk'		=> $this->Home_model->getTotalPemasukan(),
			'tKeluar'		=> $this->Home_model->getTotalPengeluaran(),
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('layout/footer');
	}

	public function profile()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'My Profile';


		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('myProfile', $data);
			$this->load->view('layout/footer');
		} else {
			$user_id = $this->input->post('id_user');
			$nama = $this->input->post('nama');

			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']      = '2048';
				$config['upload_path']   = './assets/img/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.png') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama', $nama);

			$this->db->where('id_user', $user_id);
			$this->db->update('user');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-circle-check me-2"></i>Gemgeekang Gacorr!!!</div>');
			redirect('Profile');
		}
	}

	public function password()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Password';

		$this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required');
		$this->form_validation->set_rules('password_baru1', 'Password Baru', 'trim|required|matches[password_baru2]');
		$this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'trim|required|matches[password_baru1]');


		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('password', $data);
			$this->load->view('layout/footer');
		} else {
			$id_user = $this->input->post('id_user');
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru1');
			if ($password_lama != $data['user']['password']) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-circle-exclamation me-2"></i>Password Lama Anda Salah!!!</div>');
				redirect('Password');
			} else {
				if ($password_lama == $password_baru) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-circle-exclamation me-2"></i>Password Baru Sama Dengan Password Lama!!!</div>');
					redirect('Password');
				} else {
					$this->db->set('password', $password_baru);
					$this->db->where('id_user', $id_user);
					$this->db->update('user');

					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-circle-check me-2"></i>Password Berhasil DiUbah!!!</div>');
					redirect('Password');
				}
			}
		}
	}

	public function laporan()
	{


		$tanggal1 = $this->input->post('tanggal1');
		$tanggal2 = $this->input->post('tanggal2');
		$tanggals1 = date('d F Y', strtotime($tanggal1));
		$tanggals2 = date('d F Y', strtotime($tanggal2));

		$data['tMasuk'] = $this->Home_model->filetrTotalPemasukan($tanggal1, $tanggal2);
		$data['tKeluar'] = $this->Home_model->filetrTotalPengeluaran($tanggal1, $tanggal2);
		$data['filter'] = $this->Home_model->filterByTanggal($tanggal1, $tanggal2);
		$data['saldo_awal'] = $this->Home_model->saldo_awal($tanggal1);
		$data['pmasuk'] = $this->Home_model->getTotalPemasukan();
		$data['pkeluar'] = $this->Home_model->getTotalPengeluaran();

		$data['judul'] = "Laporan Dari Tanggal $tanggals1 Sampai $tanggals2";
		$data['tanggal_awal'] = $tanggals1;

		$this->load->view('laporan', $data);

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();

		$this->load->library('pdf');

		$this->pdf->generate(
			$html,
			"Laporan_transaksi",
			$paper_size,
			$orientation
		);
	}
}
