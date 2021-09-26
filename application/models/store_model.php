<?php 

class Store_Model extends CI_Model {
        
    public function select_product_by_category($category_id = null, $start=null, $limit=null)
    {
        $sql = "SELECT * ". "FROM tbl_product p, tbl_subcategory as c WHERE c.subcategory_id = $category_id AND p.subcategory_id = c.subcategory_id ";
        if ($category_id) 
        {
            $sql .= "AND p.category_id = $category_id ";
        }
        if ($limit != '' && $start >= 0) 
        {
            $sql .= " LIMIT $start, $limit ";
        }
        $result = $this->db->query($sql)->result();
        return $result;
    }
}