<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan_model extends CI_Model {

		public function grafik(){
			$query = $this->db->query("SELECT COUNT(id_user)as jumlah,DATE_FORMAT(tanggal_beli,'%M')as bulan FROM `tb_pembelian` GROUP BY MONTH(tanggal_beli)");

			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		
		}

		function lap_bulan()
    {
        $this->db->select("MONTH(tanggal_beli) as bulan, YEAR(tanggal_beli) as tahun, SUM(qty) as terjual, SUM(subtotal) as total, SUM(subtotal - (harga_awal * qty)) as keuntungan");
        $this->db->from('tb_pembelian');
        $this->db->join('tb_detailpembelian', 'tb_pembelian.id_pembelian = tb_detailpembelian.id_pembelian');
        $this->db->group_by('MONTH(tanggal_beli)');
        $this->db->order_by('tanggal_beli', 'DESC');
        return $this->db->get();
	}
	
	function lap_bulanan_detail($bulan, $tahun)
    {
        return $this->db->query("SELECT nama_b, tb_detailpembelian.harga_awal, tb_detailpembelian.harga_jual, sum(qty) as jumlah, SUM(subtotal) as total, SUM(subtotal - (tb_detailpembelian.harga_awal * qty)) as keuntungan from tb_pembelian JOIN tb_detailpembelian USING(id_pembelian) JOIN tb_barang USING(id_barang) where MONTH(tanggal_beli) = '$bulan' AND year(tanggal_beli)='$tahun' GROUP BY nama_b");
    }

}

/* End of file Pimpinan_model.php */
