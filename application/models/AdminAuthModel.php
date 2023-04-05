<?php 
/**
 * 
 */
class AdminAuthModel extends CI_Model
{
	function getUser($user)
	{
		$this->db->where(["admin_user"=>$user,"status"=>1]);
		$query = $this->db->get("admin");

		return $query;

	}
	
}