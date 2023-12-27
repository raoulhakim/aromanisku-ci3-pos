<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SupplierModel extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_suppliers');
        if ($id != null) {
            $this->db->where('id_supplier', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_supplier', $id);
        $this->db->delete('tb_suppliers');
    }

    public function add($post)
    {
        $params = [
            'nama_supplier' => $post['nama_supplier'],
            'no_hp_supplier' => $post['no_hp_supplier'],
            'alamat_supplier' => $post['alamat_supplier'],
            'deskripsi_supplier' => empty($post['deskripsi_supplier']) ? null : $post['deskripsi_supplier'],
        ];
        $this->db->insert('tb_suppliers', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_supplier' => $post['nama_supplier'],
            'no_hp_supplier' => $post['no_hp_supplier'],
            'alamat_supplier' => $post['alamat_supplier'],
            'deskripsi_supplier' => empty($post['deskripsi_supplier']) ? null : $post['deskripsi_supplier'],
            'updated_at' => date('d-m-Y H:i:s'),
        ];
        $this->db->where('id_supplier', $post['id_supplier']);
        $this->db->update('tb_suppliers', $params);
    }
}