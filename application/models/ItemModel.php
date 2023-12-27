<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ItemModel extends CI_Model
{
    // start datatables
    var $column_order = array(null, 'barcode_item', 'tb_items.name_item', 'category_name', 'unit_name', 'price_item', 'stock_item'); //set column field database for datatable orderable
    var $column_search = array('barcode_item', 'tb_items.name_item', 'price_item'); //set column field database for datatable searchable
    var $order = array('id_item' => 'asc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->select('tb_items.*, tb_p_categories.nama_category as category_name, tb_p_units.nama_unit as unit_name');
        $this->db->from('tb_items');
        $this->db->join('tb_p_categories', 'tb_items.id_category = tb_p_categories.id_category');
        $this->db->join('tb_p_units', 'tb_items.id_unit = tb_p_units.id_unit');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        $this->db->from('tb_items');
        return $this->db->count_all_results();
    }
    // end datatables

    public function get($id = null)
    {
        $this->db->select('tb_items.*, tb_p_categories.nama_category as nama_category, tb_p_units.nama_unit as nama_unit');
        $this->db->from('tb_items');
        $this->db->join('tb_p_categories', 'tb_p_categories.id_category = tb_items.id_category');
        $this->db->join('tb_p_units', 'tb_p_units.id_unit = tb_items.id_unit');
        if ($id != null) {
            $this->db->where('id_item', $id);
        }
        $this->db->order_by('barcode_item', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_item', $id);
        $this->db->delete('tb_items');
    }

    public function add($post)
    {
        $params = [
            'barcode_item' => $post['barcode_item'],
            'name_item' => $post['name_item'],
            'id_category' => $post['category_item'],
            'id_unit' => $post['unitss'],
            'price_item' => $post['price_item'],
            'image_item' => $post['image_item'],
        ];
        $this->db->insert('tb_items', $params);
    }

    function check_barcode($code, $id = null)
    {
        $this->db->from('tb_items');
        $this->db->where('barcode_item', $code);
        if ($id != null) {
            $this->db->where('id_item !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function edit($post)
    {
        $params = [
            'barcode_item' => $post['barcode_item'],
            'name_item' => $post['name_item'],
            'id_category' => $post['category_item'],
            'id_unit' => $post['unitss'],
            'price_item' => $post['price_item'],
            'updated_at' => date('d-m-Y H:i:s'),
        ];

        if ($post['image_item'] != null) {
            $params['image_item'] = $post['image_item'];
        }
        $this->db->where('id_item', $post['id_item']);
        $this->db->update('tb_items', $params);
    }

    function update_stock_in($data)
    {
        $qty = $data['qty'];
        $id = $data['id_item'];
        $sql = "UPDATE tb_items SET stock_item = stock_item + '$qty' WHERE id_item = '$id'";
        $this->db->query($sql);
    }

    function update_stock_out($data)
    {
        $qty = $data['qty'];
        $id = $data['id_item'];
        $sql = "UPDATE tb_items SET stock_item = stock_item - '$qty' WHERE id_item = '$id'";
        $this->db->query($sql);
    }

    function update_stock_out_del($data)
    {
        $qty = $data['qty'];
        $id = $data['id_item'];
        $sql = "UPDATE tb_items SET stock_item = stock_item + '$qty' WHERE id_item = '$id'";
        $this->db->query($sql);
    }
}