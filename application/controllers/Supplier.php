<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checkNotLogin();
        $this->load->model('SupplierModel');
    }

    public function index()
    {
        $data['row'] = $this->SupplierModel->get();
        $this->template->load('template', 'Supplier/supplier', $data);
    }

    public function del($id)
    {
        $this->SupplierModel->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('User Deleted Successfully');</script>";
        }
        echo "<script>window.location='" . site_url('supplier') . "';</script>";
    }

    public function add()
    {
        $supplier = new stdClass();
        $supplier->id_supplier = null;
        $supplier->nama_supplier = null;
        $supplier->no_hp_supplier = null;
        $supplier->alamat_supplier = null;
        $supplier->deskripsi_supplier = null;
        $data = array(
            'page' => 'add',
            'row' => $supplier
        );
        $this->template->load('template', 'Supplier/supplierAdd', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->SupplierModel->add($post);
        } else if (isset($_POST['edit'])) {
            $this->SupplierModel->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('User Saved Successfully');</script>";
        }
        echo "<script>window.location='" . site_url('supplier') . "';</script>";
    }

    public function edit($id)
    {
        $query = $this->SupplierModel->get($id);
        if ($query->num_rows() > 0) {
            $supplier = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $supplier
            );
            $this->template->load('template', 'Supplier/supplierAdd', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');
            window.location='" . site_url('supplier') . "';</script>";
        }
    }
}
