<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {
        checkLogin();
        $this->load->view('login');
    }

    public function logout()
    {
        $params = array('id_user', 'level_user');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('UserModel', 'userModel');
            $query = $this->userModel->login($post);
            echo "login";
            if ($query->num_rows() > 0) {
                $row = $query->row();
                echo $row->username;
                $params = array(
                    'id_user' => $row->id_user,
                    'level_user' => $row->level_user
                );
                $this->session->set_userdata($params);
                echo "<script>
                    alert('Login Successfull');
                    window.location='" . site_url('dashboard') . "'
                </script>";
            } else {
                echo "<script>
                    alert('Maaf, Login Gagal');
                    window.location='" . site_url('auth/login') . "'
                </script>";
            }
        } else {
            echo "tidak login";
        }
    }
}
