<?php 
class CategoryModel extends CI_Model
{
	public function index()
	{

	}



	public function get_category()
	{
		$query = $this->db->query('SELECT `name`,`slug`,`parent_category` FROM `category` WHERE 1');
    	return $query->result();
	}

	public function add_category($categoryDetails)
	{
			$parentCategory = $categoryDetails['parent_category'];
			$name = $categoryDetails['category_name'];
			$slug = strtolower(url_title($categoryDetails['category_name']));
			$description = $categoryDetails['category_desc'];
			$date = date('Y-m-d H:i:s');
			if($parentCategory == 'none')
			{
				$addcategory = $this->db->insert('category',['parent_category'=>$parentCategory,'name'=>$name,'slug'=>$slug,'description'=>$description,'child_hierarchy'=>'','date'=>$date]);
				if($addcategory)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
					$this->_update_parent_category($parentCategory,$name);
					$addcategory = $this->db->insert('category',['parent_category'=>$parentCategory,'name'=>$name,'slug'=>$slug,'description'=>$description,'	child_hierarchy'=>'','date'=>$date]);
					if($addcategory)
					{
						return true;
					}
					else
					{
						return false;
					}
			}
	}

	function _update_parent_category($parentCategory,$name)
	{
		//print_r($name); exit();
		$categotySlug = strtolower(url_title($parentCategory));
		$sql = "SELECT * FROM `category` WHERE slug = '$categotySlug'";
		$result = $this->db->query($sql);
		$row = $result->row();
		$child_hierarchy = $row->child_hierarchy;
		if($child_hierarchy == '')
		{
			$child_hierarchy = $name; 
		}
		else
		{
			$child_hierarchy = $child_hierarchy.','.$name; 
		}
		$updateParent =  $this->db->set('child_hierarchy', $child_hierarchy); //Update Register Status
									$this->db->set('haschild', 'yes'); //Update Register Status
									$this->db->where('slug', $categotySlug); //Condition
									$this->db->update('category');  //table name
	}	

	public function update_category($categoryDetails,$categoryId)
	{
		$this->db->set('name', $categoryDetails['category_name']); //Update Register Status
									$this->db->set('parent_category', $categoryDetails['parent_category']); //Update Register Status
									$this->db->set('slug', strtolower(url_title($categoryDetails['category_name']))); //Condition  
									$this->db->set('description', $categoryDetails['category_desc']);
									$this->db->where('id', $categoryId);
									$this->db->update('category');  //table name
	}

	public function check_isduplicate_slug_or_not($categorySlug)
	{
		$sql = "SELECT * FROM `category` WHERE slug = '$categorySlug'";
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

	public function get_all_category()
	{
		$query = $this->db->query("SELECT * FROM `category` WHERE status = 1");
    	return $query->result();
	}

	public function get_single_category($categorySlug)
	{
		$query = $this->db->query("SELECT * FROM `category` WHERE slug = '$categorySlug'");
		return $query->result();
	}
	public function get_name_of_category($category)
	{
		$sql = "SELECT * FROM `category` WHERE slug = '$category'";
		$result = $this->db->query($sql);
		$row = $result->row();
		return $row->name;
	}
}
	?>
