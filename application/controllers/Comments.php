<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

	function test() {
		$this->load->view('public/user/blogs/test');
	}

	public function comment()
	{
		//echo "hii"; die();
		$blogTitleURL = $this->uri->segment(3);
		$blogId = ($this->uri->segment(4)/1555);
		//print_r($blogId); exit();
		$commentDetails = $this->input->post();
		//print_r($commentDetails); exit();
		$this->load->model('BlogModel');
		$addComment = $this->BlogModel->add_comment($commentDetails,$blogId);
		if($addComment)
		{
			redirect('blogs/view/'.$blogTitleURL.'/#comment');
		}
		else
		{

		}
		//print_r($commentDetails);
	}
	public function comment1()
	{
		echo "hii";
	}

	public function delete()
	{
		$blogTitleURL = $this->uri->segment(3);
		$commentID = $this->uri->segment(4);
		//print_r($commentID); exit();
		$this->load->model('Adminmodel');
		$isSessionCreated = $this->Adminmodel->check_session_is_created();
		if($isSessionCreated)
		{
			$this->load->model('BlogModel');
			$deleteComment = $this->BlogModel->delete_comment($commentID);
			if($deleteComment)
			{
				redirect('blogs/view/'.$blogTitleURL.'/#comment');
			}
			else
			{
				redirect('blogs/view/'.$blogTitleURL.'/#comment');
			}
		}
		else
		{
			$this->session->set_flashdata('only_admin_can_delete', "This feature is available for authorized user only!!");
			redirect('blogs/view/'.$blogTitleURL.'/#comment');
		}
		//echo "comment is ".$CommentID;
		//echo "blog Url  ".$blo;
	}

}


?>

