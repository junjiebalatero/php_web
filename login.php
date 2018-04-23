<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
body {
background-image: url("bg.png"); 
}
</style> 
<body>


<?php
require_once 'core/init.php';
if(Input::exists()){
	if(Token::check(Input::get('token'))){

		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array('required' => true),
			'password' => array('required' => true)
		));
		if($validation->passed()){
			$user = new User();
			$remember = (Input::get('remember') === 'on') ? true : false;
			$login = $user->login(Input::get('username'), Input::get('password'), $remember);	
			if($login){
				Redirect::to('index.php');
			} else{
				echo '<p>Sorry, logging in failed.</p>';
			}
		} else {
			foreach($validation->errors() as $error){
				echo $error, '<br>';
			}
		}
	}
}
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script><br>
<div class="container-fluid">
	<form class="form-horizontal" action="" method="post">
		<div class="form-group">		
			<label for="username" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-10">
			<input type="text" class="form-control" name="username" id="username" autocomplete="off" placeholder="Username">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
			<input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password">
			</div>
		</div>
		<div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label for="remember">
						<input type="checkbox" name="remember" id="remember"> Remember me
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
				<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
				<input type="submit" class="btn btn-default" value="Log in">
			</div>
		</div>
	</form>
</div>


</body>
</html>