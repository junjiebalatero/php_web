<link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script><?php
require_once 'core/init.php';
$user = new User();
if(!$user->isLoggedIn()){
Redirect::to('index.php');
}
if(Input::exists()){
if(Token::check(Input::get('token'))){

$validate = new Validate();
$validation = $validate->check($_POST, array(
'name' => array(
'required' => true,
'min' => 2,
'max' => 50
)
));
if($validation->passed()){				
try{
$user->update(array(
	'name' => Input::get('name')
));
Session::flash('home', 'Your details have been updated.');
Redirect::to('index.php');
} catch(Exception $e){
die($e->getMessage());
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
			<label class="col-sm-2 control-label" for="name">Name</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="name" value="<?php echo escape($user->data()->name); ?>">
			</div>
		</div>
		<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
					<input class="btn btn-default" type="submit" value="Update">
					<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
				</div>
		</div>
	</form>
</div>

