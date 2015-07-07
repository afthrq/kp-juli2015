<?php

class Users_model extends CI_Model 
{

	function validate($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		
		if($query->num_rows == 1)
		{
			return true;
		}		
	}

    function role_check($username)
    {
    	/*$this->db->select('user_id');
    	$this->db->where('username', $username);

    	$this->db->select('p_role_id');
    	$this->db->where('')


    	$query = $this->db->get('user');
    	foreach ($query->result() as $row)
		{
   			return $row->level;
		}*/

		$this->db->select('a.user_id'); 
		$this->db->where('a.username', $username); 
		$this->db->get('user as a'); 
		//save the sub query in variable $sub_query = $this->db->last_query(); 
		$sub_query = $this->db->last_query();

		$this->db->select('b.p_role_id');
		$this->db->where("b.p_role_id = ($sub_query)", NULL, False);
		$this->db->get("user_role as b"); 
		//save the sub query in variable $sub_query = $this->db->last_query(); 
		$sub_query = $this->db->last_query();

		$this->db->select('c.name');
		$this->db->where("c.p_role_id = ($sub_query)", NULL, False);
		$query = $this->db->get("p_role as c");		
    	foreach ($query->result() as $row)
		{
   			return $row->name;
		}
    }
}
