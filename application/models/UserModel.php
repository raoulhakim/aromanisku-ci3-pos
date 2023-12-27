<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('tb_users');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_users');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['nama_user'] = $post['nama_user'];
        $params['alamat_user'] = $post['alamat_user'] ? $post['alamat_user'] : null;
        $params['level_user'] = $post['level_user'];
        $this->db->insert('tb_users', $params);
    }

    public function edit($post)
    {
        $params['username'] = $post['username'];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['nama_user'] = $post['nama_user'];
        $params['alamat_user'] = $post['alamat_user'] ? $post['alamat_user'] : null;
        $params['level_user'] = $post['level_user'];
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('tb_users', $params);
    }

    public function del($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tb_users');
    }
}
?>