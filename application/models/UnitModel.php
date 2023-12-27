<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UnitModel extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_p_units');
        if ($id != null) {
            $this->db->where('id_unit', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_unit', $id);
        $this->db->delete('tb_p_units');
    }

    public function add($post)
    {
        $params = [
            'nama_unit' => $post['nama_unit'],
        ];
        $this->db->insert('tb_p_units', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_unit' => $post['nama_unit'],
            'updated_at' => date('d-m-Y H:i:s'),
        ];
        $this->db->where('id_unit', $post['id_unit']);
        $this->db->update('tb_p_units', $params);
    }
}