<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function filterByTanggal($tanggal1, $tanggal2)
    {
        $query = $this->db->query("SELECT * FROM transaksi WHERE tanggal_transaksi BETWEEN '$tanggal1' AND '$tanggal2'");
        return $query->result_array();
    }

    public function getTotalPemasukan()
    {
        // $pemasukan = "SELECT sum(nominal) as pemasukan FROM transaksi WHERE jenis_transaksi = 'Pemasukan' ORDER BY sum(nominal)";
        // $this->db->from('transaksi');
        $this->db->select('sum(nominal) as pemasukan');
        $this->db->from('transaksi');
        return $this->db->get_where('', array('jenis_transaksi' => 'Pemasukan'))->row_array();
    }

    public function getTotalPengeluaran()
    {
        // $pengeluaran = "SELECT sum(nominal) as pengeluaran FROM transaksi WHERE jenis_transaksi = 'Pengeluaran' ORDER BY sum(nominal)";
        $this->db->select('sum(nominal) as pengeluaran');
        $this->db->from('transaksi');
        return $this->db->get_where('', array('jenis_transaksi' => 'Pengeluaran'))->row_array();
    }

    public function filetrTotalPemasukan($tanggal1, $tanggal2)
    {
        $pemasukan = $this->db->query("SELECT sum(nominal) as pemasukan FROM transaksi WHERE tanggal_transaksi BETWEEN '$tanggal1' AND '$tanggal2' AND jenis_transaksi = 'Pemasukan'");
        return $pemasukan->row_array();
    }

    public function filetrTotalPengeluaran($tanggal1, $tanggal2)
    {
        $pengeluaran = $this->db->query("SELECT sum(nominal) as pengeluaran FROM transaksi WHERE tanggal_transaksi BETWEEN '$tanggal1' AND '$tanggal2' AND jenis_transaksi = 'Pengeluaran'");
        return $pengeluaran->row_array();
    }

    public function saldo_awal($tanggal1)
    {
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi', 'Pemasukan');
        $this->db->where("tanggal_transaksi <", $tanggal1);
        $pemasukan = $this->db->get()->row()->total;

        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi', 'Pengeluaran');
        $this->db->where("tanggal_transaksi <", $tanggal1);
        $pengeluaran =  $this->db->get()->row()->total;
        $saldo = intval($pemasukan) - intval($pengeluaran);
        return $saldo;
    }


    // public function getHarian()
    // {
    //     $date = date('d');
    //     // SELECT sum(nominal) as nominal FROM transaksi WHERE DAY(tanggal_transaksi) = $date  AND jenis_transaksi = 'Pemasukan'
    //     $this->db->select_sum('nominal');
    //     $this->db->from('transaksi');
    //     $this->db->where('', array('DAY(tanggal_transaksi)' => $date));
    //     return $this->db->get_where('', array('jenis_transaksi' => 'Pemasukan'))->row_array();
    // }
}
