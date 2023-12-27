<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checkNotLogin();
        $this->load->model('CustomerModel');
    }

    public function index()
    {
        $data['row'] = $this->CustomerModel->get();
        $this->template->load('template', 'customer/customer', $data);
    }

    public function del($id)
    {
        $this->CustomerModel->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('User Deleted Successfully');</script>";
        }
        echo "<script>window.location='" . site_url('customer') . "';</script>";
    }

    public function add()
    {
        $customer = new stdClass();
        $customer->id_customer = null;
        $customer->nama_customer = null;
        $customer->jenis_kelamin_customer = null;
        $customer->no_hp_customer = null;
        $customer->alamat_customer = null;
        $data = array(
            'page' => 'add',
            'row' => $customer
        );
        $this->template->load('template', 'customer/customerAdd', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->CustomerModel->add($post);
        } else if (isset($_POST['edit'])) {
            $this->CustomerModel->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('User Saved Successfully');</script>";
        }
        echo "<script>window.location='" . site_url('customer') . "';</script>";
    }

    public function edit($id)
    {
        $query = $this->CustomerModel->get($id);
        if ($query->num_rows() > 0) {
            $customer = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $customer
            );
            $this->template->load('template', 'customer/customerAdd', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');
            window.location='" . site_url('customer') . "';</script>";
        }
    }
}
