<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {
        
    public function index()
    {
        $data = array();
        $data['title'] = 'Home';
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_subcategory();
        $data['home_product'] = $this->ecommerce_model->select_all_home_product();
        $data['home'] = $this->load->view('home', $data, true);
        $this->load->view('master', $data);
    }
        
    public function product_listing($category_id = null, $start = null)
    {
	$data = array();
        $data['title'] = 'Product Listing';
        if(!$start)
        {
            $start=0;
        }
        $data['start']= $start;
        $data['limit']= 1;
        $data['total_product'] = count($this->store_model->select_product_by_category($category_id, '', ''));
        $data['product_listing'] = $this->store_model->select_product_by_category($category_id, $start, $data['limit']);
        $data['this_page'] = count($data['product_listing']);
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_subcategory();
        $data['home'] = $this->load->view('product_listing', $data, true);
        $this->load->view('master', $data);
    }
    
    public function product_details($product_id)
    {
        $data = array();
        $data['product_details'] = $this->ecommerce_model->select_product_by_id($product_id);        
        $this->load->view('product_details', $data);
    }
}