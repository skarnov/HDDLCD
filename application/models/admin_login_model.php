<?php

class Admin_Login_Model extends CI_Model {
    
    public function admin_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email', $data['admin_email']);
        $this->db->where('admin_password', $data['admin_password']);
        $this->db->where('admin_status', 1);
        $where = '(admin_level="1" OR admin_level = "2")';
        $this->db->where($where);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
}