<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$limit = 8;
		$getHeaderContent['title'] = 'All About Blood - Home';
		$getHeaderContent['miniDescription'] = 'Home';
		$getHeaderContent['keyword'] = 'keyword';

		$this->load->model('BlogModel');
		//$dashBoard['recentBlogs'] = $this->BlogModel->get_recent_5_blogs();
		$dashBoard['recentBlogs'] = $this->BlogModel->get_recent_blog($limit);
		$this->load->view('public/user/layout/header',$getHeaderContent);
		$this->load->view('public/user/home',$dashBoard);
		$this->load->view('public/user/layout/footer');
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
		$getSingleBlog['getPreviousBlog'] = $this->BlogModel->get_previous_blog($blogId);
		$getSingleBlog['getNextBlog'] = $this->BlogModel->get_next_blog($blogId);
		$getSingleBlog['getAllCategoryDetails'] = $this->BlogModel->get_all_category_details();
		$content = $this->BlogModel->get_selected_blog_header_contents($blogId);
		$getHeaderContent['title'] = $content['title'];
		$getHeaderContent['miniDescription'] = $content['miniDescription'];
		$getHeaderContent['keyword'] = $content['keyword'];

		$this->load->view('public/user/layout/header',$getHeaderContent);
		$this->load->view('public/user/blogs/singleblog',$getSingleBlog);
		$this->load->view('public/user/layout/footer');
	}

		public function tag()
		{
			$getHeaderContent['miniDescription'] = 'All Blogs by Tag Name';
			$getHeaderContent['keyword'] = 'All Blogs';
			$tag = urldecode($this->uri->segment(3));
			$getHeaderContent['title'] = 'All Blogs By '.$tag.' tag';
			$this->load->model('BlogModel');
			$getAllPostedBlogsByTag['getAllPostedBlogsByTag'] = $this->BlogModel->get_all_blogs_by_tag($tag);
			$getAllPostedBlogsByTag['getAllCategoryDetails'] = $this->BlogModel->get_all_category_details();
			$getAllPostedBlogsByTag['tagName'] = $tag;
			$this->load->view('public/user/layout/header',$getHeaderContent);
			$this->load->view('public/user/blogs/tagblogs',$getAllPostedBlogsByTag);
			$this->load->view('public/user/layout/footer');
		}

		public function category()
		{
			$getHeaderContent['miniDescription'] = 'All Blogs by ';
			$getHeaderContent['keyword'] = 'All Blogs';
			$category = $this->uri->segment(3);
			//print_r($category); exit();
			$getHeaderContent['title'] = 'All Blogs By '.$category.' Category';
			$this->load->model('BlogModel');
			$this->load->model('CategoryModel');
			$getAllPostedBlogsByCategory['getAllPostedBlogsByCategory'] = $this->BlogModel->get_all_blogs_by_category($category);
			$getAllPostedBlogsByCategory['getAllCategoryDetails'] = $this->BlogModel->get_all_category_details();
			$getAllPostedBlogsByCategory['name'] = $this->CategoryModel->get_name_of_category($category);
			$this->load->view('public/user/layout/header',$getHeaderContent);
			$this->load->view('public/user/blogs/categoryblogs',$getAllPostedBlogsByCategory);
			$this->load->view('public/user/layout/footer');
		}
	
}
