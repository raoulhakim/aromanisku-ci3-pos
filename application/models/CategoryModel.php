<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryModel extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_p_categories');
        if ($id != null) {
            $this->db->where('id_category', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_category', $id);
        $this->db->delete('tb_p_categories');
    }

    public function add($post)
    {
        $params = [
            'nama_category' => $post['nama_category'],
        ];
        $this->db->insert('tb_p_categories', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_category' => $post['nama_category'],
            'updated_at' => date('d-m-Y H:i:s'),
        ];
        $this->db->where('id_category', $post['id_category']);
        $this->db->update('tb_p_categories', $params);
    }
}