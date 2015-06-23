<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Create_user_model extends CI_Model {
		
		function __construct() {
			// Call the Model constructor
		    parent::__construct();
		}
		
		function userExist($new_user) {
			$count = $this->db->query("select id from users where username = " + $new_user);
			return $count->num_rows();
		}
		
		function add_user($new_user) {
			$this->db->insert('users', $new_user);
			return $this->db->insert_id();
		}
		
	}
?>
		