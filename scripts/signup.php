<?php
if(isset($_POST['signup']))
{
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$email=$_POST['email']; 
$password=md5($_POST['password']); 
$mobile=$_POST['mobile']; 
//sprawdzenie czy mail jest poprawny
if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
echo "error : You did not enter a valid email.";
}
else {
$emailCheck = $dbh->query( "SELECT * FROM dbusers WHERE email = '{$email}' ");
$rowCount = $emailCheck->fetchColumn();
if($rowCount > 0) {
$email_exist ='
<div class="text-danger">
User with that email already exists!
</div>
';
} else {
	$sql="INSERT INTO  dbusers(firstname,lastname,email,password,mobile) VALUES(:fname,:lname,:email,:password,:mobile)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':fname',$fname,PDO::PARAM_STR);
	$query->bindParam(':lname',$lname,PDO::PARAM_STR);
	$query->bindParam(':email',$email,PDO::PARAM_STR);
	$query->bindParam(':password',$password,PDO::PARAM_STR);
	$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId) {
		$success_msg = '<div class="text-success">
		Sign up process succesfull
		</div>';
	}
	else {
		$error_msg = '<div class="text-danger">
		Something went wrong. Please try again
		</div>';
	}
}
}
}
?>