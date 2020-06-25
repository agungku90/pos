<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function simpanBarang($data){
	$insert =	$this->db->insert('tb_barang', $data);
	if($insert){
		return true;
	}else{
		return false;
	}
	}

	function tampilBarang(){
		return $this->db->get('tb_barang');
	}

	function hapusBarang($id){
		$delete = $this->db->where('id_barang', $id)->delete('tb_barang');
		if($delete){
			return true;
		}else{
			return false;
		}
	}

	function ubahBarang($data){
		$ubah = $this->db->where('id_barang', $data['id_barang'])->update('tb_barang', $data);
		if($ubah){
			return true;
		}else{
			return false;
		}
	}

	public function countTransaksi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $bulan = date('m', time());
        $tahun = date('Y', time());

        $this->db->select('id_pembelian');
        $this->db->from('tb_pembelian');
        $this->db->where('MONTH(tanggal_beli)', $bulan);
        $this->db->where('YEAR(tanggal_beli)', $tahun);
        return $this->db->count_all_results();
	}
	
	public function countBrgTerjual()
    {
        date_default_timezone_set('Asia/Jakarta');
        $bulan = date('m', time());
        $tahun = date('Y', time());
        
        $this->db->select_sum('qty');
        $this->db->from('tb_pembelian');
        $this->db->join('tb_detailpembelian', 'tb_pembelian.id_pembelian = tb_detailpembelian.id_pembelian');
        $this->db->where('MONTH(tanggal_beli)', $bulan);
        $this->db->where('YEAR(tanggal_beli)', $tahun);
        return $this->db->get()->row();
	}
	

	public function labaRugiBulan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $bulan = date('m', time());
        $tahun = date('Y', time());
        
        $this->db->select("SUM(subtotal - (harga_awal*qty)) as keuntungan");
        $this->db->from('tb_pembelian');
        $this->db->join('tb_detailpembelian', 'tb_pembelian.id_pembelian = tb_detailpembelian.id_pembelian');
        $this->db->where('MONTH(tanggal_beli)', $bulan);
        $this->db->where('YEAR(tanggal_beli)', $tahun);
        return $this->db->get()->row();
	}
	
	

}

/* End of file Admin_model.php */
