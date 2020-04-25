<?php

class Menu_model extends CI_Model
{
    private $table = 'menu_latihan';
    private $id = 'menu_latihan.id_menu';


    function __construct()
    {
        $this->table = "menu_latihan";
        parent::__construct();
    }

    // function data($number,$offset){
    //     $this->db->select('
    //     artikel.*, kategori_artikel.id_kategori AS id_kategori, kategori_artikel.kategori_artikel
    //     ');
    //      $this->db->select('
    //     artikel.*, user.id_user AS id_user, user.nama');
    //     $this->db->join('user', 'artikel.id_user = user.id_user');
    //     $this->db->join('kategori_artikel', 'artikel.id_kategori = kategori_artikel.id_kategori');
    //     return $query = $this->db->get('artikel',$number,$offset)->result();	

    // }

    // function get_data($filter = array())
    // {
    // 	if(!empty($filter))
    // 	{
    // 		if(!empty($filter['limit']))
    // 		{
    // 			if(!empty($filter['offset']))
    // 			{
    // 				$this->db->limit($filter['limit'], $filter['offset']);
    // 			}
    // 			else
    // 			{
    // 				$this->db->limit($filter['limit']);
    // 			}
    // 		}

    // 	}

    // 	$this->db->select('
    //         artikel.*, 
    //         kategori_artikel.id_kategori AS id_kategori, 
    //         kategori_artikel.kategori_artikel,
    //         user.id_user AS id_user, 
    //         user.nama
    //     ');
    //     $this->db->from('artikel');
    //     $this->db->join('user', 'artikel.id_user = user.id_user');
    //     $this->db->join('kategori_artikel', 'artikel.id_kategori = kategori_artikel.id_kategori');

    // 	$query = $this->db->get();
    // 	return $query;
    // }

    function jml_data()
    {
        $query = $this->db->get($this->table);
        $total = $query->num_rows();
        return $total;
    }



    function semua_data($param)
    {
        if (isset($param['bulan'])) {
            $this->db->where('MONTH(menu_latihan.tanggal)', $param['bulan']);
        }
        if (!empty($param['id_posisi'])) {
            $this->db->where('menu_latihan.id_posisi', $param['id_posisi']);
        }

        if (isset($param['tahun'])) {
            $this->db->where('YEAR(menu_latihan.tanggal)', $param['tahun']);
        }

        $this->db->select('
            menu_latihan.*,
            posisi.*,
            titik_lapangan.*,
            ');
        $this->db->join('posisi', 'menu_latihan.id_posisi = posisi.id_posisi');
        $this->db->join('titik_lapangan', 'menu_latihan.id_titik = titik_lapangan.id_titik');
        $this->db->from('menu_latihan');
        $this->db->order_by('id_menu', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // function detail_data($id_pemain)
    // {
    //     $this->db->select('
    //         pemain.*,
    //         posisi.*,
    //         jurusan.*,
    //         ');
    //     $this->db->join('posisi', 'pemain.id_posisi = posisi.id_posisi');
    //     $this->db->join('jurusan', 'pemain.id_jurusan = jurusan.id_jurusan');
    //     // $this->db->from('pemain');
    //     $query =  $this->db->get_where($this->table, array('id_pemain' => $id_pemain));
    //     return $query->row();
    // }

    // // function detail_front($link)
    // // {
    // //     $query =  $this->db->get_where($this->table, array('link' => $link));
    // //     return $query->row();
    // // }

    function input_data($data)
    {
        $this->db->insert($this->table, $data);
    }

    // function total_pemain()
    // {
    //     $this->db->from('pemain');
    //     $query = $this->db->get();
    //     if ($query->num_rows() > 0) {
    //         return $query->num_rows();
    //     } else {
    //         return 0;
    //     }
    // }

    // function update_data($data, $id_pemain)
    // {
    //     $this->db->where('id_pemain', $id_pemain);
    //     $this->db->update($this->table, $data);
    // }

    // function hapus_data($id_data)
    // {
    //     $this->db->where('id_pemain', $id_data);
    //     $this->db->delete($this->table);
    // }
}
