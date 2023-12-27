<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checkNotLogin();
        $this->load->model(['ItemModel', 'SupplierModel', 'StockModel']);
    }
    public function stock_in_data()
    {
        $data['row'] = $this->StockModel->get_stock_in()->result();
        $data['page'] = 'Stock In';
        $this->template->load('template', 'transaction/stockIn/stockIn', $data);
    }

    public function stock_out_data()
    {
        $data['row'] = $this->StockModel->get_stock_out()->result();
        $data['page'] = 'Stock Out';
        $this->template->load('template', 'transaction/stockIn/stockIn', $data);
    }

    public function stock_in_add()
    {
        $item = $this->ItemModel->get()->result();
        $supplier = $this->SupplierModel->get()->result();
        $data = [
            'item' => $item,
            'supplier' => $supplier,
            'page' => 'Stock In',
        ];
        $this->template->load('template', 'transaction/stockIn/stockAdd', $data);
    }

    public function stock_out_add()
    {
        $item = $this->ItemModel->get()->result();
        $supplier = $this->SupplierModel->get()->result();
        $data = [
            'item' => $item,
            'supplier' => $supplier,
            'page' => 'Stock Out',
        ];
        $this->template->load('template', 'transaction/stockIn/stockAdd', $data);
    }

    public function stock_in_del()
    {
        $id_stock = $this->uri->segment(4);
        $id_item = $this->uri->segment(5);
        $qty = $this->StockModel->get($id_stock)->row()->qty;
        $data = [
            'qty' => $qty,
            'id_item' => $id_item
        ];
        $this->ItemModel->update_stock_out($data);
        $this->StockModel->del($id_stock);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stock Deleted');
        }
        redirect('stock/in');
    }

    public function stock_out_del()
    {
        $id_stock = $this->uri->segment(4);
        $id_item = $this->uri->segment(5);
        $qty = $this->StockModel->get($id_stock)->row()->qty;
        $data = [
            'qty' => $qty,
            'id_item' => $id_item
        ];
        $this->ItemModel->update_stock_out_del($data);
        $this->StockModel->del($id_stock);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stock Out Deleted');
        }
        redirect('stock/out');
    }

    public function process()
    {
        if (isset($_POST['in_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->StockModel->stock_in_add($post);
            $this->ItemModel->update_stock_in($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stock Saved');
            }
            redirect('stock/in');
        } else if (isset($_POST['out_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->StockModel->stock_out_add($post);
            $this->ItemModel->update_stock_out($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stock Out Saved');
            }
            redirect('stock/out');
        }
    }
}

?>