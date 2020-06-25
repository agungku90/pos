<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_model extends CI_Model {

	var $column_order = array('tb_pembelian.id_pembelian','tanggal_beli'); 
    var $column_search = array('tb_pembelian.id_pembelian','tanggal_beli');
    var $order = array('tanggal_beli' => 'desc');

	// ambil data barang
	public function getDataBarang($nm)
    {
        $this->db->select('id_barang, harga_awal_b, harga_jual_b, stok_b');
        $this->db->from('tb_barang');
        $this->db->where('nama_b', $nm);
        $this->db->limit(1);
        return $this->db->get();
	}
	
	//select data barang berdasarkan pencarian
	public function getNamaDanKode($nm)
    {
        $this->db->select('id_barang, nama_b');
        $this->db->from('tb_barang');
        $this->db->like('nama_b', $nm);
        $this->db->like('hide', 'x');
        $this->db->limit(7);
        return $this->db->get();
    }
	

	function get_datatables()
    {
        $this->_get_datatables_query();
        $length = isset($_POST['length']) ? $_POST['length'] : null;
        $start = isset($_POST['start']) ? $_POST['start'] : null;
        
        if  ($length != -1)
        {
            $this->db->limit($length, $start);
            $query = $this->db->get();
            return $query->result();
        }
	}

	public function addPembelian($data)
    {
        return $this->db->insert('tb_pembelian', $data);
    }

    public function addDetailPembelian($data)
    {
        return $this->db->insert_batch('tb_detailpembelian', $data);
    }
	
	public function _get_datatables_query()
    {
        date_default_timezone_set('Asia/jakarta');
        $tgl = date('Y-m-d', time());

        $user = $this->session->userdata('id_user');
        $this->db->select('tb_pembelian.id_pembelian, tanggal_beli, SUM(tb_detailpembelian.subtotal) as total');
        $this->db->from('tb_pembelian');
        $this->db->join('tb_detailpembelian', 'tb_pembelian.id_pembelian = tb_detailpembelian.id_pembelian');
        $this->db->where('id_user', $user);
        $this->db->where('DATE(tanggal_beli)', $tgl);
        $this->db->group_by('id_pembelian');

        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
        {
            if(isset($_POST['search']['value'])) // if datatable send POST for search
            {
                
                if ($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if (isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
	}
	
	function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('tb_pembelian');
        $this->db->join('tb_detailpembelian', 'tb_pembelian.id_pembelian = tb_detailpembelian.id_pembelian');
        return $this->db->count_all_results();
    }
    

}

/* End of file Kasir_model.php */
