<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SalesDetailModel extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('tb_d_transactions');
        if ($id != null) {
            $this->db->where('id_sale', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_sale', $id);
        $this->db->delete('tb_sales');
    }

    public function addTransactionDetails($details)
    {
        foreach ($details as $detail) {
            $params = [
                'id_transaction' => $detail['id_transaction'],
                'id_item' => $detail['id_item'],
                'name_item' => $detail['name_item'],
                'price_item' => $detail['price_item'],
                'qty' => $detail['qty'],
                'date' => date('Y-m-d'),
            ];
            $this->db->insert('tb_transactions', $params);
        }
    }
}
?>