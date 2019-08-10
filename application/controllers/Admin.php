<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->model('Adminmodel');
		$isSessionCreated = $this->Adminmodel->check_session_is_created();
		if($isSessionCreated)
		{
			redirect('admin/dashboard');
		}
		else
		{
			$this->load->view('layout/header');
			$this->load->view('public/admin/adminlogin');
			$this->load->view('layout/footer');
		}
	}


	public function login()
	{
		$adminLoginCredentials = $this->input->post();
		$username = $adminLoginCredentials['username'];
		$password = $adminLoginCredentials['password'];
		$this->load->model('Adminmodel');
		$checkAdminUsername = $this->Adminmodel->check_username_valid_or_not($username);
		if($checkAdminUsername)
		{
			$checkPassword = $this->Adminmodel->check_password($username,$password);
			if($checkPassword)
			{
				$getAdminId = $this->Adminmodel->get_admin_id($username);
				$getAdminName = $this->Adminmodel->get_admin_name($username);
				//$this->session->set_userdata('userid',$getAdminId);
				//$this->session->set_userdata('username',$getAdminName);
				$this->session->set_userdata(array('userid' => $getAdminId,
													'username' => $getAdminName
													));
				redirect('admin/dashboard');
			}
			else
			{
				$this->session->set_flashdata('wrong_password', "Invalid Password!!");
				redirect('admin');
			}
		}
		else
		{
			$this->session->set_flashdata('wrong_username', "Username you have entered is not valid please enter valid Username!!");
			redirect('admin');
		}
		//print_r($adminLoginCredentials);
	}

	

	public function dashboard()
	{
		$getHeaderContent['miniDescription'] = 'All Blogs';
		$getHeaderContent['title'] = 'Admin Dashboard';
		$getHeaderContent['keyword'] = 'All Blogs';

		$this->load->model('Adminmodel');
		$isSessionCreated = $this->Adminmodel->check_session_is_created();
		if($isSessionCreated)
		{
			$limit = 10;
			$this->load->model('BlogModel');
			$dashBoard['recentBlogs'] = $this->BlogModel->get_recent_ten_blogs($limit);
			$mostCommentedBlog = $this->BlogModel->most_commented_blog();
			$blogID = $mostCommentedBlog['blogId'];
			//print_r($count); exit();
			$dashBoard['mostCommnets'] = $mostCommentedBlog['count'];
			$dashBoard['mostCommnetedBlogTitle'] = $this->BlogModel->get_name_of_most_commented_blog($blogID);
			$dashBoard['totalBlogs'] = $this->BlogModel->get_count_of_allblogs();
			$this->load->view('public/admin/layout/header',$getHeaderContent);
			$this->load->view('public/admin/dashboard',$dashBoard);
			$this->load->view('public/admin/layout/footer');
		}
		else
		{
			redirect('admin', 'refresh');
		}
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
		//print_r($newBlogDetails); exit();

	
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
			$this->load->model('BlogModel');
			$isUniqueTitle = $this->BlogModel->check_weather_title_unique($title);
			if($isUniqueTitle == 1)
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
						$this->session->set_flashdata('added', "The blog is added successfully!!");
						redirect('admin/newblog');
					}
					else
					{
						$this->session->set_flashdata('not_added', "The blog is not added!!");
						redirect('admin/newblog');
					}
			}
			else
			{
				echo $isUniqueTitle;
			}
		}
		else
		{
			$this->newblog();
		}

	}
public function edit()
	{
		//$blogTitleURL = $this->uri->segment(3);
		$this->load->model('BlogModel');
		$blogId = $this->uri->segment(3);
		$content = $this->BlogModel->get_selected_blog_header_contents($blogId);
		$this->load->model('CategoryModel');
		$getSingleBlog['category'] = $this->CategoryModel->get_all_category();
		$getSingleBlog['getSingleBlog'] = $this->BlogModel->fetch_selected_blog($blogId);


		$getHeaderContent['title'] = 'Edit - '.$content['title'];
		$getHeaderContent['miniDescription'] = $content['miniDescription'];
		$getHeaderContent['keyword'] = $content['keyword'];
		//print_r($blogId); exit();

		//$this->load->view('public/admin/layout/header',$getHeaderContent);
		$this->load->view('layout/header');
		$this->load->view('public/admin/blogs/editblog',$getSingleBlog);
		//$this->load->view('public/admin/layout/footer');
		$this->load->view('layout/footer');
	}
	public function changeimage()
	{
		$blogId = $this->uri->segment(3);
		$this->load->view('layout/header');
		$this->load->view('public/admin/blogs/updateblogimage');
		$this->load->view('layout/footer');
	}
	public function updateimage()
	{
		$fileName = '';
		$blogId = $this->uri->segment(3);
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
				$this->BlogModel->update_blog_image($blogId,$fileName);
				$this->session->set_flashdata('image_updated', "The blog Image is updated successfully!!");
				redirect('blogs/allblogs');
	}

	public function update()
	{
		$newBlogDetails = $this->input->post();
		//print_r($newBlogDetails); exit();
		$blogId = ($this->uri->segment(3))/1548;
	
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
			$this->load->model('BlogModel');
			$updateBlog = $this->BlogModel->update_blog($newBlogDetails,$blogId);
			$this->session->set_flashdata('blog_updated', "The blog is updated successfully!!");
			redirect('admin/dashboard');
		}
	}

	public function upload1()
	{
		$newBlogDetails = $this->input->post();
		//print_r($newBlogDetails); exit();
		$title = $newBlogDetails['title'];
		$this->form_validation->set_rules('title','Title','required|is_unique[blogs.title]',
											array(
												'required' => 'Please enter %s it is mandatory.',
												'is_unique' => '%s is already exist please try with another Title.', 
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
				$this->load->model('BlogModel');
				$isNotDuplicateTitle = $this->BlogModel->check_weather_title_is_unique($title);
				if($isNotDuplicateTitle)
				{
					$saveData = $this->BlogModel->save_blog($newBlogDetails,$fileName);
					if($saveData)
					{
						$this->session->set_flashdata('added', "The blog is added successfully!!");
						redirect('admin/newblog');
					}
					else
					{
						$this->session->set_flashdata('not_added', "The blog is not added!!");
						redirect('admin/newblog');
					}
				}
				else
				{
					$this->session->set_flashdata('duplicate', "This Title is present please Enter Unique Title!!");
					redirect('admin/newblog');
				}
			}
			else
			{
				$this->session->set_flashdata('image_not_upload', "File is not uploaded!!");
				redirect('admin/newblog');
			}
		}
		else
		{
			$this->newblog();
		}

	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');	
	}

}
