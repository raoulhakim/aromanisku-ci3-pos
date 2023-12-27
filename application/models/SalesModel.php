<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SalesModel extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('tb_transactions');
        if ($id != null) {
            $this->db->where('id_transaction', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_transaction', $id);
        $this->db->delete('tb_transactions');
    }

    public function add($post)
    {
        $params = [
            'date_transaction' => date('Y-m-d'),
            'nama_user' => $post['nama_kasir'],
            'nama_customer' => $post['customer'],
            'total_transaction' => $post['nilai_sementara_total'],
            'cash_transaction' => $post['field_cash'],
            'change_transaction' => $post['nilai_sementara'],
        ];
        $this->db->insert('tb_transactions', $params);
    }
}
?>