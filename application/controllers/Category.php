<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function index()
	{
		//$this->load->view('welcome_message');
	}

	public function allcategory()
	{
		$getHeaderContent['miniDescription'] = 'Categories';
		$getHeaderContent['keyword'] = 'All Category';
		$getHeaderContent['title'] = 'All Categories';
		$this->load->model('CategoryModel');
		$getAllCategory['getAllCategory'] = $this->CategoryModel->get_all_category();
		$this->load->view('public/admin/layout/header',$getHeaderContent);
		$this->load->view('public/admin/category/allcategory',$getAllCategory);
		$this->load->view('public/admin/layout/footer');	
	}

	public function singlecategory()
	{
		$getHeaderContent['miniDescription'] = 'Categories';
		$getHeaderContent['keyword'] = 'Single Category';

		$categorySlug = $this->uri->segment(3);
		$getHeaderContent['title'] = $categorySlug;
		$this->load->model('CategoryModel');
		$getSingleCategory['getSingleCategory'] = $this->CategoryModel->get_single_category($categorySlug);
		$getSingleCategory['category'] = $this->CategoryModel->get_category();
		$this->load->view('public/admin/layout/header',$getHeaderContent);
		$this->load->view('public/admin/category/singlecategory',$getSingleCategory);
		$this->load->view('public/admin/layout/footer');	
	}

	public function addcategory()
	{
		$getHeaderContent['miniDescription'] = 'Categories';
		$getHeaderContent['keyword'] = 'Add Category';
		$getHeaderContent['title'] = 'New Category';
		$this->load->model('CategoryModel');
		$category['category'] = $this->CategoryModel->get_category();
		$getAllCategory['getAllCategory'] = $this->CategoryModel->get_all_category();
		$this->load->view('public/admin/layout/header',$getHeaderContent);
		$this->load->view('public/admin/category/addcategory',$category);
		$this->load->view('public/admin/layout/footer');	
	}

	public function add()
	{
		
		$categoryDetails = $this->input->post();
		$categorySlug = strtolower(url_title($categoryDetails['category_name']));
		$this->load->model('CategoryModel');
		$isDuplicateSlug = $this->CategoryModel->check_isduplicate_slug_or_not($categorySlug);
		if($isDuplicateSlug)
		{
			$addCategory = $this->CategoryModel->add_category($categoryDetails);
			if($addCategory)
			{
				$this->session->set_flashdata('added_successfully', "Category has been added successfully!!");
				redirect('category/addcategory');
			}
			else
			{
				$this->session->set_flashdata('not_added', "Category is not added please try again later!!");
				redirect('category/addcategory');
			}
		}
		else
		{
			$this->session->set_flashdata('duplicate_title', "Blog Title you have entered is already in use!!");
			redirect('category/addcategory');
		}
		//$categorySlug = strtolower(url_title($categoryDetails['category_name']));
		//print_r($categoryDetails);
	}
	public function update()	
	{
		$categoryId = ($this->uri->segment(3))/1425;
		$categoryDetails = $this->input->post();
		$this->load->model('CategoryModel');
		$this->CategoryModel->update_category($categoryDetails,$categoryId);
		$this->session->set_flashdata('updated_successfully', "Category has been updated successfully!!");
		redirect('category/allcategory');
		//print_r($categoryDetails);
	}

}
