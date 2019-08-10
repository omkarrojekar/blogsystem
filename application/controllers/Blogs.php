<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

	public function index()
	{
		//$this->load->view('welcome_message');
	}
	public function newblog()
	{
		$this->load->model('Adminmodel');
		$isSessionCreated = $this->Adminmodel->check_session_is_created();
		if($isSessionCreated)
		{
			$this->load->model('CategoryModel');
			$category['category'] = $this->CategoryModel->get_all_category();
			$this->load->view('layout/header');
			$this->load->view('public/admin/blogs/newblog',$category);
			$this->load->view('layout/footer');	
		}
		else
		{
			$this->load->view('layout/header');
			$this->load->view('public/admin/adminlogin');
			$this->load->view('layout/footer');
		}
	}

	public function upload()
	{
		$newBlogDetails = $this->input->post();
		$fileName = '';
		$title = $newBlogDetails['title'];
		//print_r($title); exit();
		$this->form_validation->set_rules('title','Title','required|is_unique[blogs.title]',
											array(
												'required' => 'Please enter %s it is mandatory.',
												'is_unique' => '%s is aleready exist with the same Title'
												));
		$this->form_validation->set_rules('category','Category','required',
											array(
												'required' => 'Please enter %s it is mandatory.'
												));
		$this->form_validation->set_rules('body','Body','required',
											array(
												'required' => 'Please enter %s it is mandatory.'
												));
		$this->form_validation->set_rules('description','Description','required',
											array(
												'required' => 'Please enter %s it is mandatory.'
												));
		$this->form_validation->set_rules('tags','Tags','required',
											array(
												'required' => 'Please enter %s it is mandatory.'
												));
		$this->form_validation->set_rules('keywords','Keywords','required',
											array(
												'required' => 'Please enter %s it is mandatory.'
												));
		$this->form_validation->set_rules('mini_description','Mini Description','required',
											array(
												'required' => 'Please enter %s it is mandatory.'
												));
		if($this->form_validation->run())
		{
			$config = array(
				'upload_path' => './upload/',
				'allowed_types' => 'jpg|jpeg|png|PNG|JPEG|JPG',
				'max-size' =>10000,
				'filename' => $this->input->post('file')
			);
			$this->load->library('upload', $config);
			$uploadFile =  $this->upload->do_upload('file');
			if($uploadFile)
			{
				$data = $this->upload->data();
				$fileName = $data['file_name'];
			}
			else
			{
				$fileName = 'nopreview.png';
			}
			$this->load->model('BlogModel');
				$saveData = $this->BlogModel->save_blog($newBlogDetails,$fileName);
				if($saveData)
				{
					echo "Reached";
				}
				else
				{
					echo "Not Reached";
				}
		}
		else
		{
			$this->newblog();
		}

	}

	public function blogimage()
	{
		$this->load->model('Adminmodel');
		$isSessionCreated = $this->Adminmodel->check_session_is_created();
		if($isSessionCreated)
		{
			$this->load->view('layout/header');
			$this->load->view('public/admin/blogs/blogiamge');
			$this->load->view('layout/footer');	
		}
		else
		{
			$this->load->view('layout/header');
			$this->load->view('public/admin/adminlogin');
			$this->load->view('layout/footer');
		}
	}

	public function allblogs()
	{
		$getHeaderContent['miniDescription'] = 'All Blogs';
		$getHeaderContent['title'] = 'All Blogs';
		$getHeaderContent['keyword'] = 'All Blogs';

		$this->load->model('BlogModel');
		$getAllBlogs['getAllBlogs'] = $this->BlogModel->get_all_blogs();
		$this->load->view('public/admin/layout/header',$getHeaderContent);
		$this->load->view('public/admin/blogs/allblogs',$getAllBlogs);
		$this->load->view('public/admin/layout/footer');	
	}

	public function postby()
	{
		$getHeaderContent['miniDescription'] = 'All Blogs by User';
		$getHeaderContent['keyword'] = 'All Blogs';
		$publishByURL = $this->uri->segment(3);
		$getHeaderContent['title'] = 'All Blogs By '.$publishByURL;
		$this->load->model('BlogModel');
		$getAllUserPostedBlogs['getAllUserPostedBlogs'] = $this->BlogModel->get_all_selected_user_posted_blogs($publishByURL);
		$this->load->view('public/admin/layout/header',$getHeaderContent);
		$this->load->view('public/admin/blogs/allblogsbyuser',$getAllUserPostedBlogs);
		$this->load->view('public/admin/layout/footer');	
	}
	public function view()
	{
		$blogTitleURL = $this->uri->segment(3);
		$limit = 5;
		$this->load->model('BlogModel');
		$blogId = $this->BlogModel->get_blog_id($blogTitleURL);
		$categoryURL = $this->BlogModel->get_blog_catagory($blogTitleURL);
		$blogCategory = $this->BlogModel->get_blog_catagory($blogTitleURL);
		$getSingleBlog['getSingleBlog'] = $this->BlogModel->get_selected_blog($blogTitleURL);
		$getSingleBlog['getRecentFiveBlogs'] = $this->BlogModel->get_recent_blogs($blogTitleURL,$limit);
		$getSingleBlog['getRelatedFiveBlogs'] = $this->BlogModel->get_related_five_blogs($categoryURL,$blogTitleURL);
		$getSingleBlog['getSingleBlogComment'] = $this->BlogModel->get_selected_blog_comment($blogId);
		$getSingleBlog['getCommentReplys'] = $this->BlogModel->get_selected_blog_comment_reply($blogId);
		$getSingleBlog['BlogCommentCount'] = $this->BlogModel->get_selected_blog_comment_count($blogId);
		$content = $this->BlogModel->get_selected_blog_header_contents($blogId);


		$getHeaderContent['title'] = $content['title'];
		$getHeaderContent['miniDescription'] = $content['miniDescription'];
		$getHeaderContent['keyword'] = $content['keyword'];

		$this->load->view('public/admin/layout/header',$getHeaderContent);
		$this->load->view('public/admin/blogs/singleblog',$getSingleBlog);
		$this->load->view('public/admin/layout/footer');
	}

	public function tag()
	{
		$getHeaderContent['miniDescription'] = 'All Blogs by User';
		$getHeaderContent['keyword'] = 'All Blogs';
		$tag = $this->uri->segment(3);
		$getHeaderContent['title'] = 'All Blogs By '.$tag.' tag';
		$this->load->model('BlogModel');
		$getAllPostedBlogsByTag['getAllPostedBlogsByTag'] = $this->BlogModel->get_all_blogs_by_tag($tag);
		$this->load->view('public/admin/layout/header',$getHeaderContent);
		$this->load->view('public/admin/blogs/tagblogs',$getAllPostedBlogsByTag);
		$this->load->view('public/admin/layout/footer');	
	}

}
