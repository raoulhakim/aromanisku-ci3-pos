<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checkNotLogin();
        $this->load->model('CategoryModel');
    }

    public function index()
    {
        $data['row'] = $this->CategoryModel->get();
        $this->template->load('template', 'product/category', $data);
    }

    public function del($id)
    {
        $this->CategoryModel->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Deleted');
        }
        redirect('category');
    }

    public function add()
    {
        $category = new stdClass();
        $category->id_category = null;
        $category->nama_category = null;
        $data = array(
            'page' => 'add',
            'row' => $category
        );
        $this->template->load('template', 'product/categoryAdd', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->CategoryModel->add($post);
        } else if (isset($_POST['edit'])) {
            $this->CategoryModel->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Changed');
        }
        redirect('category');
    }

    public function edit($id)
    {
        $query = $this->CategoryModel->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $category
            );
            $this->template->load('template', 'product/categoryAdd', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');</script>";
            redirect('category');
        }
    }
}
