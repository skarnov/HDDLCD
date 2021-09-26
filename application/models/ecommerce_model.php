<?php

class Ecommerce_Model extends CI_Model {
    
    public function select_admin_by_id($admin_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id',$admin_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_admin_info()
    {
        $data=array();
        $data['admin_name'] = $this->input->post('admin_name', true);
        $data['admin_email'] = $this->input->post('admin_email', true);
        $data['admin_password'] = $this->input->post('admin_password', true);
        $data['admin_level'] = $this->input->post('admin_level', true);
        $data['admin_status'] = $this->input->post('admin_status', true);
        $data['admin_type'] = $this->input->post('admin_type', true);
        $admin_id=$this->input->post('admin_id',true);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin',$data);
    }
    
    public function save_category_info()
    {
        $data=array();
        $data['category_name'] = $this->input->post('category_name', true);
        $this->db->insert('tbl_category',$data);
    }
    
    public function select_all_category()
    {
        $sql = "SELECT * FROM tbl_category";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_category_by_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id',$category_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_category_info()
    {
        $data=array();
        $data['category_name'] = $this->input->post('category_name', true);
        $category_id = $this->input->post('category_id', true);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category',$data);
    }
    
    public function delete_category_by_id($category_id)
    {
        $this->db->where('category_id',$category_id);
        $this->db->delete('tbl_category');
    }
        
    public function save_subcategory_info()
    {
        $data=array();
        $data['category_id'] = $this->input->post('category_id', true);
        $data['subcategory_name'] = $this->input->post('subcategory_name', true);
        $this->db->insert('tbl_subcategory',$data);
    }
    
    public function select_all_subcategory()
    {
        $sql = "SELECT * FROM tbl_subcategory";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_home_product()
    {
        $sql = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 5 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_subcategory_by_id($subcategory_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->where('subcategory_id',$subcategory_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function select_published_subcategory_by_id($subcategory_id)
    {
        $sql = "SELECT * FROM tbl_category AS c, tbl_subcategory AS s WHERE c.category_id=s.category_id AND s.subcategory_id='$subcategory_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function update_subcategory_info()
    {
        $data=array();
        $data['category_id'] = $this->input->post('category_id', true);
        $data['subcategory_name'] = $this->input->post('subcategory_name', true);
        $subcategory_id = $this->input->post('subcategory_id', true);
        $this->db->where('subcategory_id',$subcategory_id);
        $this->db->update('tbl_subcategory',$data);
    }
    
    public function delete_subcategory_by_id($subcategory_id)
    {
        $this->db->where('subcategory_id',$subcategory_id);
        $this->db->delete('tbl_subcategory');
    }
    
    public function select_all_published_subcategory()
    {
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->order_by('subcategory_id','ASC');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_product_info($data)
    {
        $this->db->insert('tbl_product',$data);
    }
    
    public function select_all_product($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_product_by_id($product_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_id',$product_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_product_info()
    {
        $data=array();
        $data['category_id'] = $this->input->post('category_id', true);
        $data['subcategory_id'] = $this->input->post('subcategory_id', true);
        $data['product_name'] = $this->input->post('product_name', true);
        $data['product_code'] = $this->input->post('product_code', true);
        $data['product_old_price'] = $this->input->post('product_old_price', true);
        $data['product_price'] = $this->input->post('product_price', true);
        $data['product_description'] = $this->input->post('product_description', true);
        $product_id = $this->input->post('product_id', true);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product',$data);
    }
    
    public function delete_product_by_id($product_id)
    {
        $this->db->where('product_id',$product_id);
        $this->db->delete('tbl_product');
    }
    
    public function edit_image($data)
    {
        $product_id=$this->input->post('product_id',true);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product',$data);
    }
}