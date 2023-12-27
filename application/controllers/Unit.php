<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checkNotLogin();
        $this->load->model('UnitModel');
    }

    public function index()
    {
        $data['row'] = $this->UnitModel->get();
        $this->template->load('template', 'product/unit', $data);
    }

    public function del($id)
    {
        $this->UnitModel->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Deleted');
        }
        redirect('unit');
    }

    public function add()
    {
        $unit = new stdClass();
        $unit->id_unit = null;
        $unit->nama_unit = null;
        $data = array(
            'page' => 'add',
            'row' => $unit
        );
        $this->template->load('template', 'product/unitAdd', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->UnitModel->add($post);
        } else if (isset($_POST['edit'])) {
            $this->UnitModel->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Changed');
        }
        redirect('unit');
    }

    public function edit($id)
    {
        $query = $this->UnitModel->get($id);
        if ($query->num_rows() > 0) {
            $unit = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $unit
            );
            $this->template->load('template', 'product/unitAdd', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');</script>";
            redirect('unit');
        }
    }
}
