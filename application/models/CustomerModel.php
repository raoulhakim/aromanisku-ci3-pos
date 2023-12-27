<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomerModel extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_customers');
        if ($id != null) {
            $this->db->where('id_customer', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_customer', $id);
        $this->db->delete('tb_customers');
    }

    public function add($post)
    {
        $params = [
            'nama_customer' => $post['nama_customer'],
            'jenis_kelamin_customer' => $post['jenis_kelamin_customer'],
            'no_hp_customer' => $post['no_hp_customer'],
            'alamat_customer' => $post['alamat_customer'],
        ];
        $this->db->insert('tb_customers', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_customer' => $post['nama_customer'],
            'jenis_kelamin_customer' => $post['jenis_kelamin_customer'],
            'no_hp_customer' => $post['no_hp_customer'],
            'alamat_customer' => $post['alamat_customer'],
            'updated_at' => date('d-m-Y H:i:s'),
        ];
        $this->db->where('id_customer', $post['id_customer']);
        $this->db->update('tb_customers', $params);
    }
}