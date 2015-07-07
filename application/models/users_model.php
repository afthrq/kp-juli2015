<?php

class Users_model extends CI_Model 
{

	function validate($user, $password)
	{
		$this->db->where('username', $user_name);
		$this->db->where('password', $password);
		$query = $this->db->get('users');
		
		if($query->num_rows == 1)
		{
			return true;
		}		
	}

    function role_check($user_name)
    {
    	$this->db->select('level');
    	$this->db->where('username', $user_name);
    	$query = $this->db->get('users');
    	foreach ($query->result() as $row)
		{
   			return $row->level;
		}
    }
}
