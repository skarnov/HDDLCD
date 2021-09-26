<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Ecommerce extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) 
        {
            redirect('admin_login', 'refresh');
        }
    }
    
    public function index()
    {
        $data = array();
        $data['title'] = 'Dashboard';
        $data['dashboard'] = $this->load->view('admin/dashboard', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_date_time');
        $sdata['exception'] = 'You are Successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('admin_login');
    }
    
    public function edit_admin($admin_id) 
    {
        $data = array();
        $data['title'] = 'Edit Admin';
        $data['admin_info'] = $this->ecommerce_model->select_admin_by_id($admin_id);
        $data['dashboard'] = $this->load->view('admin/edit_admin', $data, true);
        $sdata = array();
        $sdata['edit_admin'] = 'Update Admin Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }
    
    public function update_admin() 
    {
        $this->ecommerce_model->update_admin_info();
        redirect('ecommerce');
    }
        
    public function add_category()
    {
        $data = array();
        $data['title'] = 'New Category';
        $data['dashboard'] = $this->load->view('admin/add_category', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_category()
    {
        $this->ecommerce_model->save_category_info();
        $sdata = array();
        $sdata['save_category'] = 'Category Saved';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/add_category');
    }
    
    public function manage_category()
    {
        $data = array();
        $data['title'] = 'Manage Category';
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['dashboard'] = $this->load->view('admin/manage_category', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_category($category_id) 
    {
        $data = array();
        $data['title'] = 'Edit Category';
        $data['category_info'] = $this->ecommerce_model->select_category_by_id($category_id);
        $data['dashboard'] = $this->load->view('admin/edit_category', $data, true);
        $sdata = array();
        $sdata['edit_category'] = 'Update Category Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_category() 
    {
        $this->ecommerce_model->update_category_info();
        redirect('ecommerce/manage_category');
    }
    
    public function delete_category($category_id) 
    {
        $this->ecommerce_model->delete_category_by_id($category_id);
        redirect('ecommerce/manage_category');
    }
    
    public function add_subcategory()
    {
        $data = array();
        $data['title'] = 'New Subcategory';
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['dashboard'] = $this->load->view('admin/add_subcategory', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_subcategory()
    {
        $this->ecommerce_model->save_subcategory_info();
        $sdata = array();
        $sdata['save_subcategory'] = 'Subcategory Saved';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/add_subcategory');
    }
    
    public function manage_subcategory()
    {
        $data = array();
        $data['title'] = 'Manage Subcategory';
        $config['base_url'] = base_url() . 'ecommerce/manage_subcategory/';
        $config['total_rows'] = $this->db->count_all('tbl_subcategory');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_subcategory'] = $this->ecommerce_model->select_all_subcategory($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_subcategory', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_subcategory($subcategory_id) 
    {
        $data = array();
        $data['title'] = 'Edit Subcategory';
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['subcategory_info'] = $this->ecommerce_model->select_subcategory_by_id($subcategory_id);
        $data['dashboard'] = $this->load->view('admin/edit_subcategory', $data, true);
        $sdata = array();
        $sdata['edit_subcategory'] = 'Update Subcategory Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_subcategory() 
    {
        $this->ecommerce_model->update_subcategory_info();
        redirect('ecommerce/manage_subcategory');
    }
    
    public function delete_subcategory($subcategory_id) 
    {
        $this->ecommerce_model->delete_subcategory_by_id($subcategory_id);
        redirect('ecommerce/manage_subcategory');
    }
    
    public function add_product()
    {
        $data = array();
        $data['title'] = 'New Product';
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_subcategory();
        $data['dashboard'] = $this->load->view('admin/add_product', $data, true);
        $this->load->view('admin/master', $data);
    }
        
    public function save_product()
    {
        $this->form_validation->set_rules('category_id', 'Category', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Category');
        $this->form_validation->set_rules('subcategory_id', 'Subcategory', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Subcategory');
        if ($this->form_validation->run() == False) {
            $data = array();
            $data['title'] = 'Form Validation Error';
            $data['all_category'] = $this->ecommerce_model->select_all_category();
            $data['all_subcategory'] = $this->ecommerce_model->select_all_subcategory();
            $data['dashboard'] = $this->load->view('admin/add_product', $data, true);
            $this->load->view('admin/master', $data);
        }
        else
        {
            $data=array();
            $data['category_id'] = $this->input->post('category_id', true);
            $data['subcategory_id'] = $this->input->post('subcategory_id', true);
            $data['product_name'] = $this->input->post('product_name', true);
            $data['product_code'] = $this->input->post('product_code', true);
            /** IF THEY DO NOT SELECT A IMAGE **/
            $cnt = 0;
            foreach ($_FILES as $eachFile)
            {
                if ($eachFile['size'] > 0)
                {

                    $config['upload_path'] = 'upload_image/product_image_' . $cnt . '/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '10240';
                    $config['max_width'] = '5000';
                    $config['max_height'] = '5000';
                    $error = '';
                    $fdata = array();
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('product_image_' . $cnt))
                    {
                        $error = $this->upload->display_errors();
                        echo $error;
                        exit();
                    } 
                    else 
                    {
                        $fdata = $this->upload->data();
                        $index = 'product_image_' . $cnt;
                        $up['main'] = $config['upload_path'] . $fdata['file_name'];
                    }        
                    /** START IMAGE RESIZE **/
                    $config['image_library'] = 'gd2';
                    $config['new_image'] = 'upload_image/product_image_' . $cnt . '/';
                    $config['source_image'] = $up['main'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = '220';
                    $config['height'] = '250';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    if (!$this->image_lib->resize()) {
                        $error = $this->image_lib->display_errors();
                        echo $error;
                        exit();
                    } else {
                        $index = 'product_image_' . $cnt;
                        $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                        unlink($fdata['full_path']);
                        }
                    /** END IMAGE RESIZE **/
                    }
                    $cnt++;
            }
            /** END OF IF THEY DO NOT SELECT A IMAGE **/
            $data['product_old_price'] = $this->input->post('product_old_price', true);
            $data['product_price'] = $this->input->post('product_price', true);
            $data['product_description'] = $this->input->post('product_description', true);
            $this->ecommerce_model->save_product_info($data);
            $sdata = array();
            $sdata['save_product'] = 'Product Saved';
            $this->session->set_userdata($sdata);
            redirect('ecommerce/add_product');
        }
    }
    
    public function manage_product()
    {
        $data = array();
        $data['title'] = 'Manage Product';
        $config['base_url'] = base_url() . 'ecommerce/manage_product/';
        $config['total_rows'] = $this->db->count_all('tbl_product');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_product'] = $this->ecommerce_model->select_all_product($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_product', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_product($product_id) 
    {
        $data = array();
        $data['title'] = 'Edit Product';
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_subcategory();
        $data['product_info'] = $this->ecommerce_model->select_product_by_id($product_id);
        $data['dashboard'] = $this->load->view('admin/edit_product', $data, true);
        $sdata = array();
        $sdata['edit_product'] = 'Update Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_product() 
    {
        $this->ecommerce_model->update_product_info();
        redirect('ecommerce/manage_product');
    }
    
    public function delete_product($product_id) 
    {        
        $this->ecommerce_model->delete_product_by_id($product_id);
        redirect('ecommerce/manage_product');
    }
    
    public function edit_image_one()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_0/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_0'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_0';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/product_image_0/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_0';
                    $evis_inventorydata[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->ecommerce_model->edit_image($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/manage_product');
    }
    
    public function edit_image_two()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_1/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_1'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_1';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/product_image_1/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_1';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->ecommerce_model->edit_image($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/manage_product');
    }
    
    public function edit_image_three()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_2/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_2'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_2';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/product_image_2/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_2';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->ecommerce_model->edit_image($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/manage_product');
    }
    
    public function edit_image_four()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_3/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_3'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_3';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/product_image_3/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_3';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->ecommerce_model->edit_image($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/manage_product');
    }
    
    public function edit_image_five()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_4/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_4'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_4';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/product_image_4/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_4';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->ecommerce_model->edit_image($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/manage_product');
    }
}