<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockModel extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('tb_stocks');
        if ($id != null) {
            $this->db->where('id_stock', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_stock', $id);
        $this->db->delete('tb_stocks');
    }

    public function get_stock_in()
    {
        $this->db->select('tb_stocks.id_stock, tb_items.barcode_item, tb_items.name_item as item_name, qty, date, detail_stock, tb_suppliers.nama_supplier as supplier_name, tb_items.id_item');
        $this->db->from('tb_stocks');
        $this->db->join('tb_items', 'tb_stocks.id_item = tb_items.id_item');
        $this->db->join('tb_suppliers', 'tb_stocks.id_supplier = tb_suppliers.id_supplier', 'left');
        $this->db->where('type_stock', 'in');
        $this->db->order_by('id_stock', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function get_stock_out()
    {
        $this->db->select('tb_stocks.id_stock, tb_items.barcode_item, tb_items.name_item as item_name, qty, date, detail_stock, tb_items.id_item');
        $this->db->from('tb_stocks');
        $this->db->join('tb_items', 'tb_stocks.id_item = tb_items.id_item');
        $this->db->where('type_stock', 'out');
        $this->db->order_by('id_stock', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function stock_in_add($post)
    {
        $params = [
            'id_item' => $post['id_item'],
            'type_stock' => 'in',
            'detail_stock' => $post['detail_stock'],
            'id_supplier' => $post['nama_supplier'] == '' ? null : $post['nama_supplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'id_user' => $this->session->userdata('id_user'),
        ];
        $this->db->insert('tb_stocks', $params);
    }

    public function stock_out_add($post)
    {
        $params = [
            'id_item' => $post['id_item'],
            'type_stock' => 'out',
            'detail_stock' => $post['detail_stock'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'id_user' => $this->session->userdata('id_user'),
        ];
        $this->db->insert('tb_stocks', $params);
    }

    public function stock_in_del($post)
    {
        $params = [
            'id_item' => $post['id_item'],
            'type_stock' => 'in',
            'detail_stock' => $post['detail_stock'],
            'id_supplier' => $post['nama_supplier'] == '' ? null : $post['nama_supplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'id_user' => $this->session->userdata('id_user'),
        ];
        $this->db->insert('tb_stocks', $params);
    }

    public function stock_out_del($post)
    {
        $params = [
            'id_item' => $post['id_item'],
            'type_stock' => 'out',
            'detail_stock' => $post['detail_stock'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'id_user' => $this->session->userdata('id_user'),
        ];
        $this->db->insert('tb_stocks', $params);
    }
}