<?php 
class BlogModel extends CI_Model
{
	public function index()
	{

	}
	public function check_weather_title_is_unique0($title)
	{
		$urlTitle = strtolower(url_title($title));
		$sql = "SELECT * FROM `blogs` WHERE url = '$urlTitle'";
		$result = $this->db->query($sql);
		$row = $result->row();
		if($row)
		{
			return  false;
		}
		else
		{
			return true;
		}
	}

	public function check_weather_title_unique($title)
	{
		$sql = "SELECT * FROM `blogs` WHERE title = '$title'";
		$result = $this->db->query($sql);
		$row = $result->row();
		if($row)
		{
			return $row->category;
		}
		else
		{
			return 1;
		}	
	}

	public function save_blog($newBlogDetails,$fileName)
	{
		$postedByName = $this->session->userdata('username');
		$categotyName = $newBlogDetails['category'];
		$newCategotyName = implode(',',$categotyName);


		$slugCategory = '';
		$newCategotyNameSlug = $categotyName;
		foreach ($newCategotyNameSlug as $singleCategory)
		{
			$slug = strtolower(url_title($singleCategory));
			$slug = $slug;
			$slugCategory = $slugCategory.$slug.",";
		}

		$date = time();
		$addBlog = $this->db->insert('blogs',['title'=>$newBlogDetails['title'],'url'=>strtolower(url_title($newBlogDetails['title'])),'category_url'=>$slugCategory,'category'=>$newCategotyName,'body'=>$newBlogDetails['body'],'image'=>$fileName,'tags'=>$newBlogDetails['tags'],'keywords'=>$newBlogDetails['keywords'],'publishby'=>$postedByName,'publishbyurl'=>strtolower(url_title($postedByName)),'description'=>$newBlogDetails['description'],'minidescription'=>$newBlogDetails['mini_description'],'upload_date'=>$date,'commenting'=>$newBlogDetails['allow']]);
		if($addBlog)
		{
			$this->_update_blog_counter($categotyName);
			return true;
		}
		else
		{
			return false;
		}
		//echo $day;
	}
	public function _update_blog_counter($categotyName)
	{
		foreach ($categotyName as $singleCategory)
		{
			$sql = "SELECT * FROM `category` WHERE name = '$singleCategory'";
			$result = $this->db->query($sql);
			$row = $result->row();
			$counter = $row->blogcounter;
			$Newcounter = $counter + 1;
			$this->db->set('blogcounter', $Newcounter); //value that used to update column  
					$this->db->where('name', $singleCategory); //which row want to upgrade  
					$this->db->update('category');  //table name
		}
	}
	public function update_blog($newBlogDetails,$blogId)
	{
		$this->db->set('body', $newBlogDetails['body']); //value that used to update column  
		$this->db->set('tags', $newBlogDetails['tags']);
		$this->db->set('keywords', $newBlogDetails['keywords']);	
		$this->db->set('description', $newBlogDetails['description']);
		$this->db->set('minidescription', $newBlogDetails['mini_description']);
		$this->db->set('commenting', $newBlogDetails['allow']);
		$this->db->where('id', $blogId); //which row want to upgrade  
		$this->db->update('blogs');  //table name	
	}
	public function get_all_blogs()
	{
		$query = $this->db->query("SELECT * FROM `blogs` WHERE status = 1");
    	return $query->result();
	}

	public function get_all_selected_user_posted_blogs($publishByURL)
	{
		$query = $this->db->query("SELECT * FROM `blogs` WHERE publishbyurl = '$publishByURL' AND status = 1");
    	return $query->result();	
	}

	public function get_selected_blog($blogTitleURL)
	{
		$query = $this->db->query("SELECT * FROM `blogs` WHERE url = '$blogTitleURL' AND status = 1");
    	return $query->result();		
	}
	public function fetch_selected_blog($blogId)
	{
		$query = $this->db->query("SELECT * FROM `blogs` WHERE id = '$blogId' AND status = 1");
    	return $query->result();		
	}

	public function get_selected_blog_comment($blogId)
	{
		$query = $this->db->query("SELECT * FROM `comments` WHERE blog_id = '$blogId' AND status = 1 ORDER BY comment_date DESC");
    	return $query->result();			
	}

	public function get_selected_blog_comment_reply($blogId)
	{
		$query = $this->db->query("SELECT comments.*, reply.* FROM comments, reply WHERE comments.`id` = reply.`comment_id` AND comments.`blog_id` = '$blogId' AND reply.`status`= 1");
		return $query->result();
    	//print_r($query->result()); exit();
	}
	public function get_selected_blog_header_contents($blogId)
	{
		$sql = "SELECT * FROM `blogs` WHERE `id` = '$blogId' ";
		$result = $this->db->query($sql);
		$row = $result->row();

		$data['title'] = $row->title;
		$data['miniDescription'] = $row->minidescription;
		$data['keyword'] = $row->keywords;

		return $data;
	}

	public function get_selected_blog_comment_count($blogId)
	{
		$sql = "SELECT COUNT(*) AS total FROM `comments` WHERE `blog_id` = '$blogId' AND status = 1";
		$result = $this->db->query($sql);
		$row = $result->row();
		$count = $row->total;
		return $count;
	}

	public function get_count_of_allblogs()
	{
		$sql = "SELECT COUNT(*) AS total FROM `blogs` WHERE status = 1";
		$result = $this->db->query($sql);
		$row = $result->row();
		$count = $row->total;
		return $count;
	//	$query = $this->db->query("SELECT COUNT(*) AS total, title FROM `blogs` WHERE status = 1");
		//return $query->result(); SELECT COUNT(comment), blog_id from comments GROUP BY blog_id ORDER BY COUNT(comment) DESC LIMIT 1;
	}

	public function most_commented_blog()
	{
		$sql = "SELECT COUNT(comment) AS total, blog_id from comments GROUP BY blog_id ORDER BY COUNT(comment) DESC LIMIT 1";
		$result = $this->db->query($sql);
		$row = $result->row();
		$data['count'] = $row->total;
		$data['blogId'] = $row->blog_id;
		return $data;
	}

	public function get_name_of_most_commented_blog($blogID)
	{
		$sql = "SELECT  title FROM `blogs` WHERE id = '$blogID'";
		$result = $this->db->query($sql);
		$row = $result->row();
		return $row->title;	
	}

	public function get_blog_id($blogTitleURL)
	{
		$sql = "SELECT * FROM `blogs` WHERE url = '$blogTitleURL'";
		$result = $this->db->query($sql);
		$row = $result->row();
		return $row->id;
	}

	public function get_recent_blogs($blogTitleURL,$limit)
	{
		$query = $this->db->query("SELECT * FROM `blogs` WHERE url NOT IN ('$blogTitleURL') AND status = 1 ORDER BY upload_date DESC LIMIT $limit;");
		return $query->result();
	}
	public function get_recent_blog($limit)
	{
		$query = $this->db->query("SELECT * FROM `blogs` WHERE status = 1 ORDER BY upload_date DESC LIMIT $limit;");
		return $query->result();	
	}

	public function get_recent_ten_blogs($limit)
	{
		$query = $this->db->query("SELECT * FROM `blogs` WHERE  status = 1 ORDER BY upload_date DESC LIMIT $limit;");
		return $query->result();	
	}

	public function get_related_five_blogs($categoryURL,$blogTitleURL)
	{
		$query = $this->db->query("SELECT * FROM `blogs` WHERE url NOT IN ('$blogTitleURL') AND category_url = '$categoryURL' ORDER BY upload_date DESC LIMIT 5;");
		return $query->result();	
	}

	public function get_blog_catagory($blogTitleURL)
	{
		$sql = "SELECT * FROM `blogs` WHERE url =  '$blogTitleURL' AND status = 1";
		$result = $this->db->query($sql);
		$row = $result->row();
		return $row->category_url;
	}

	public function get_all_blogs_by_tag($tag)
	{
		$query = $this->db->query("SELECT * FROM `blogs` WHERE tags LIKE '%$tag%' AND status = 1 ORDER BY upload_date DESC");
    	return $query->result();		
	}

	public function get_all_blogs_by_category($category)
	{	
		$query = $this->db->query("SELECT * FROM `blogs` WHERE category_url LIKE '%$category,%' AND status = 1 ORDER BY upload_date DESC");
    	return $query->result();	
	}

	public function add_comment($commentDetails,$blogId)
	{
		$date = time();
		$time = date("h:i:sa");
		$addBlog = $this->db->insert('comments',['blog_id'=>$blogId,'comment'=>$commentDetails['comment'],'comment_by'=>$commentDetails['name'],'email'=>$commentDetails['email'],'comment_date'=>$date,'comment_time'=>$time]);
		if($addBlog)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function delete_comment($commentID)
	{
		$deleteComment = $this->db->set('status', 0); //Update Register Status
									$this->db->where('id', $commentID); //Condition
									$this->db->update('comments');  //table name
		if($deleteComment)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_previous_blog($blogId)
	{
		//$previousId = $blogId - 1;
		//$checkBlogIsPresentWithId = $this->check_weather_blog_present_with_id($previousId);
		$query = $this->db->query("SELECT * from  blogs where id = (select min(id) from blogs where id > '$blogId')");
		return $query->result();

	}
	public function get_next_blog($blogId)
	{
		//$nextId = $blogId - 1;
		//$checkBlogIsPresentWithId = $this->check_weather_blog_present_with_id($previousId);
		$query = $this->db->query("SELECT * from  blogs where id = (select max(id) from blogs where id < '$blogId')");
		return $query->result();
	}
	public function get_all_category_details()
	{
		$query = $this->db->query("SELECT * from  category where status = 1");
		return $query->result();
	}

	public function update_blog_image($blogId,$fileName)
	{
		$this->db->set('image', $fileName); //value that used to update column  
				$this->db->where('id', $blogId); //which row want to upgrade  
				$this->db->update('blogs');  //table name
	}

}
?>

