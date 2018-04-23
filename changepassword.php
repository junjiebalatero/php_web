<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
require_once 'core/init.php';
$user = new User();
if(!$user->isLoggedIn()){
	Redirect::to('index.php');
}
if(Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'password_current' => array(
					'required' => true,
					'min' => 6
				),
			'password_new' => array(
					'required' => true,
					'min' => 6
				),
			'password_new_again' => array(
					'required' => true,
					'min' => 6,
					'matches' => 'password_new'
				)
			));
			if($validation->passed()){				
				if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password){
					echo 'Your current password is wrong.';
				} else {
					$salt = Hash::salt(32);
					$user->update(array(
						'password' => Hash::make(Input::get('password_new'), $salt),
						'salt' => $salt
						));
						Session::flash('home', 'Your password has been changed!');
						Redirect::to('index.php');
				}
			} else {
				foreach($validation->errors() as $error){
					echo $error, '<br>';
				}
			}
	}
}
?>
<br>
<div class="container-fluid">
	<form class="form-horizontal" action="" method="post">
		<div class="form-group">	
			<label class="col-sm-2 control-label" for="password_current">Current password</label>
			<div class="col-sm-10">
				<input class="form-control" type="password" name="password_current" id="password_current">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password_new">New password</label>
			<div class="col-sm-10">
				<input class="form-control" type="password" name="password_new" id="password_new">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password_new_again">New password again</label>
			<div class="col-sm-10">
				<input class="form-control" type="password" name="password_new_again" id="password_new_again">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input class="btn btn-default" type="submit" value="Change">
				<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
			</div>
		</div>
	</form>
</div>
