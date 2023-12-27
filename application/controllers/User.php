<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checkNotLogin();
        checkAdmin();
        $this->load->model('UserModel');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['row'] = $this->UserModel->get();
        $this->template->load('template', 'User/user', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_user', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('level_user', 'Level User', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'User/userAdd');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->UserModel->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('data berhasil disimpan');</script>";
            }
            echo "<script>window.location='" . site_url('user') . "';</script>";
        }
    }

    public function del()
    {
        $id = $this->input->post('id_user');
        $this->UserModel->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('User Deleted Successfully');</script>";
        }
        echo "<script>window.location='" . site_url('user') . "';</script>";
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama_user', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'matches[password]');
        }
        if ($this->input->post('password_confirmation')) {
            $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'matches[password]');
        }
        $this->form_validation->set_rules('level_user', 'Level User', 'required');
        if ($this->form_validation->run() == FALSE) {
            $query = $this->UserModel->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'User/userEdit', $data);
            } else {
                echo "<script>alert('Data Tidak Ditemukan');
                window.location='" . site_url('user') . "';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->UserModel->edit($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('data berhasil diubah');</script>";
            }
            echo "<script>window.location='" . site_url('user') . "';</script>";
        }
    }

    function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM tb_users WHERE username = '$post[username]' AND id_user != '$post[id_user]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} sudah dipakai');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
