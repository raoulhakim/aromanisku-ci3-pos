<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportModel extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('tb_stocks.*, tb_items.name_item as item_name');
        $this->db->from('tb_stocks');
        $this->db->join('tb_items', 'tb_items.id_item = tb_stocks.id_item');
        if ($id != null) {
            $this->db->where('tb_stocks.id_item', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_transactions($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_transactions');
        if ($id != null) {
            $this->db->where('tb_transactions.id_transaction', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
?>