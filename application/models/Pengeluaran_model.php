<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model
{
    public function getTransaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('user', 'transaksi.username = user.username');
        $this->db->order_by('tanggal_transaksi DESC');
        return $this->db->get_where('', array('jenis_transaksi' => 'Pengeluaran'))->result_array();
    }

    public function simpan()
    {
        $data = [
            'keterangan' => $this->input->post('keterangan'),
            'nominal' => $this->input->post('nominal'),
            'username' => $this->input->post('username'),
            'jenis_transaksi' => 'Pengeluaran',
        ];

        $this->db->insert('transaksi', $data);
    }
}
