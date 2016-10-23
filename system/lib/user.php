<?php
//namespace User;
class User
{	
	public function __construct($registry) {
		$this->db = $registry->get('db');
	}
	//Login authentication
	public function login($data=''){
		$username = $data['user'];
		$query = $this->db->query
				("SELECT u.user_id,u.firstname,u.username,u.email,u.image,u.site_id,u.is_active,r.name as role,r.role_id as role_id
					FROM admin_users u
					LEFT JOIN admin_roles r
					ON u.role_id = r.role_id
					WHERE username = '$username' 
					AND dev_password = '".$data['password']."'
				");
		return $query;		
	}
	/*/TOKEN/*/
	 public function getToken($bites=16){
	 	$token = bin2hex(openssl_random_pseudo_bytes($bites));
	 }

	/*/TODO integrate checkToken into getToken/*/
	public function generateToken($bites=16){
		return bin2hex(openssl_random_pseudo_bytes($bites));
	}
	public function checkToken($bites=16){
	 	$token = $this->generateToken($bites);
	 	$token_exist = $this->db->query
	 					("SELECT user_id FROM admin_users WHERE confirmation_token='$token'");
	 	
	 	while ($token_exist->num_rows > 0) {
	 		$token = $this->generateToken($bites);
	 		$token_exist = $this->db->query
	 					("SELECT user_id FROM admin_users WHERE confirmation_token='$token'");
	 	}				
	 	return $token;				

	} 
}