<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    private $table = 'produk';

    //validasi form, method ini akan mengembailkan data berupa rules validasi form       
    public function rules()
    {
        return [
            [
                'field' => 'no',  //samakan dengan atribute name pada tags input
                'label' => 'No',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'kategori',
                'label' => 'Kategori',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'trim|required|numeric'
            ],
            [
                'field' => 'persediaan',
                'label' => 'Persediaan',
                'rules' => 'trim|required'
            ]
        ];
    }

    //menampilkan data produk berdasarkan no produk
    public function getById($no)
    {
        return $this->db->get_where($this->table, ["no" => $no])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from produk where no='$no'
    }

    //menampilkan semua data produk
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("no", "asc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from produk order by no asc
    }

    //menyimpan data produk
    public function save()
    {
        $data = array(
            "no" => $this->input->post('no'),
            "nama" => $this->input->post('nama'),
            "kategori" => $this->input->post('kategori'),
            "harga" => $this->input->post('harga'),
            "persediaan" => $this->input->post('persediaan')
        );
        return $this->db->insert($this->table, $data);
    }

    //edit data produk
    public function update()
    {
        $data = array(
            "no" => $this->input->post('no'),
            "nama" => $this->input->post('nama'),
            "kategori" => $this->input->post('kategori'),
            "harga" => $this->input->post('harga'),
            "persediaan" => $this->input->post('persediaan')
        );
        return $this->db->update($this->table, $data, array('no' => $this->input->post('no')));
    }

    //hapus data produk
    public function delete($no)
    {
        return $this->db->delete($this->table, array("no" => $no));
    }
}