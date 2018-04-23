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



<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
require_once 'core/init.php';
if(Input::exists()) {			
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array(
				'required' => true,
				'min' => 2,
				'max' => 20,
				'unique' => 'users'
				),
			'password' => array(
				'required' => true,
				'min' => 6		
				),
			'password_again' => array(
				'required' => true,
				'matches' => 'password'			
				),
			'name' => array(
				'required' => true,
				'min' => 2,
				'max' => 50		
				)
			));
			if($validation->passed()) {
					$user = new User();
					$salt = Hash::salt(32);
					try {
						$user->create(array(
								'username' => Input::get('username'),
								'password' => Hash::make(Input::get('password'), $salt),
								'salt' => $salt,
								'name' => Input::get('name'),
								'joined' => date('Y-m-d H:i:s'),
								'group' => 1
							));
						Session::flash('home', 'You have been registered and can now log in!.');
						Redirect::to('index.php');
					} catch(Exception $e) {
						die($e->getMessage());
					}
				} else {
					foreach($validation->errors() as $error) {
						echo $error, '<br>';
				}	
			}				
}
?>
<br>
<div class="container-fluid">
	<form class="form-horizontal" action="" method="post">
		<div class="form-group">	
			<label for="username" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-10">
			<input class="form-control" type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">
			</div>
		</div>
		<div class="form-group">				
			<label for="password" class="col-sm-2 control-label">Choose a password</label>
			<div class="col-sm-10">
			<input class="form-control" type="password" name="password" id="password">
			</div>
		</div>
		<div class="form-group">	
			<label for="password_again" class="col-sm-2 control-label">Enter your password again</label>
			<div class="col-sm-10">
			<input class="form-control" type="password" name="password_again" id="password_again">
			</div>
		</div>
		<div class="form-group">	
			<label for="name" class="col-sm-2 control-label">Your name</label>
			<div class="col-sm-10">
			<input class="form-control" type="text" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name">
			</div>
		</div>
		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<input type="hidden" name="token" value"<?php echo Token::generate(); ?>">
		<input class="btn btn-default" type="submit" value="Register">
		</div>
		</div>
	</form>
</div>

</body>
</html>