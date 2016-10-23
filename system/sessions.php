<?php
//session_start();
//unset($_SESSION['authenticity_token']);
include SYSTEM.'/lib/user.php';
$user = new User($registry); 
if(!isset($_SESSION['authenticity_token'])){
	$token = $user->checkToken(); 
	$_SESSION['authenticity_token'] = $token;
}
if(!isset($_SESSION['rol_id'])){
	$_SESSION['rol_id'] = 3;
}
$rol_id = $_SESSION['rol_id'];
$registry->set('rol_id',$rol_id);

/*/LOGIN/*/
if(isset($_POST['commit_login'])){
	$session 	= $_POST['session'];
	if($_POST['authenticity_token'] == $_SESSION['authenticity_token']){
		$login = $user->login($session);
		if($login->num_rows > 0){
			if($login->row['is_active'] == 1){
				$_SESSION['admin']['id'] 		= $login->row['user_id'];
				$_SESSION['admin']['name']		= $login->row['firstname'];
				$_SESSION['admin']['username']	= $login->row['username'];
				$_SESSION['admin']['email']		= $login->row['email'];
				$_SESSION['admin']['role']		= $login->row['role'];
				$_SESSION['rol_id']				= $login->row['role_id'];
				$_SESSION['admin']['site_id']	= $login->row['site_id'];

				!empty($login->row['image']) ? 
				$_SESSION['admin']['image'] = $login->row['image'] : 
				$_SESSION['admin']['image'] = $utility->get_gravatar($login->row['email'],50);
				
				header('Location: /admin/dashboard');
				exit;
			}else{
				$result['message'] = '<div class="alert alert-danger center">Este usuario no cuenta con los permisos suficientes</div>';
				header("HTTP/1.0 400 Bad Request");
			}
		}
		else{
			$result['message'] = '<div class="alert alert-danger center">La combinación email  password<br />'.
								'no coincide en la base de datos</div>';
			header("HTTP/1.0 400 Bad Request");					

		}
	}
	else{
		$result['message'] = '<div class="alert alert-danger center">invalid token</div>';
	}
}
if($route =='logout'){
	if(isset($_SESSION['admin'])){
		$session->destroy();
		$_SESSION['authenticity_token'] = $token;
		$_SESSION['rol_id'] = 2;
	}
	header('Location: login');
	exit;
}