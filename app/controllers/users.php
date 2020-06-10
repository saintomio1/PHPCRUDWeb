<?php
include( ROOT_PATH . "/app/database/db.php");
include( ROOT_PATH . "/app/helpers/middleware.php");
include( ROOT_PATH . "/app/helpers/validateUser.php");


$table = 'users';

//$admin_users = selectAll($table, ['admin' => 1]);
$admin_users = selectAll($table);

	// variable declaration
$errors = array();
$id = "";
$username = "";
$admin = "";
$email = "";
$password = "";
$passwordConf = "";
	
 
function loginUser($user)
	{
$_SESSION['id'] = $user['id']; 
$_SESSION['username'] = $user['username']; 
$_SESSION['admin'] = $user['admin']; 
$_SESSION['message'] = "You are now logged in";
$_SESSION['type'] = 'success';

if ($_SESSION['admin']) {
header('location: ' . BASE_URL . '/admin/dashboard.php');
}else{
header('location: ' . BASE_URL . '/index.php');
	}
exit();
	}

//Register/ Create User
if (isset($_POST['register-btn']) || isset($_POST['create-admin'])) {
$errors = validateUser($_POST);

if (count($errors) === 0) {
   unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);
   $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

if (isset($_POST['admin'])) {
	$_POST['admin'] = 1;
	$user_id = create($table, $_POST);
	$_SESSION['message'] = 'Admin user created successfully';
	$_SESSION['type'] = "success";
	header('location: ' . BASE_URL . '/admin/users/index.php');
	exit();
} else {
	$_POST['admin'] = 0;
	$user_id = create($table, $_POST);
   $user = selectOne($table, ['id' => $user_id]);
	loginUser($user); //User Login
	}
}else{
	$username = $_POST['username'];
	$admin    = isset($_POST['admin']) ? 1 : 0;
	$email    = $_POST['email'];
   $password    = $_POST['password'];
   $passwordConf    = $_POST['passwordConf'];
	}
}

//Updating User
if (isset($_POST['update-user'])) {
	adminOnly();
	$errors = validateUser($_POST);

if (count($errors) === 0) {
	$id = $_POST['id'];
   	unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id']);
   	$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$_POST['admin'] = isset($_POST['admin']) ? 1 : 0; 
	$count = update($table, $id, $_POST);
	$_SESSION['message'] = 'Admin user updated successfully';
	$_SESSION['type'] = 'success';
	header('location: ' . BASE_URL . '/admin/users/index.php');
	exit();

} else {
	$username = $_POST['username'];
	$admin    = isset($_POST['admin']) ? 1 : 0;
	$email    = $_POST['email'];
   $password    = $_POST['password'];
   $passwordConf    = $_POST['passwordConf'];
	}
}

	//Editing User
if (isset($_GET['id'])) {
	$user = selectOne($table, ['id' => $_GET['id']]);

	$id = $user['id'];
	$username = $user['username'];
	$admin    = $user['admin'];
	$email    = $user['email'];
}

if (isset($_POST['login-btn'])) {
	$errors = validateLogin($_POST);

	if (count($errors) === 0) {
		$user = selectOne($table, ['username' => $_POST['username']]);

		if ($user && password_verify($_POST['password'], $user['password'])) {		
			//Log User in
		loginUser($user);
			}else{
				array_push($errors, 'Wrong User Credentials'); 
			}
	}
	
	$username = $_POST['username'];
   $password = $_POST['password'];
}	

//Deleting Post
if (isset($_GET['delete_id'])) {
	adminOnly();
   $count = delete($table, $_GET['delete_id']);
   $_SESSION['message'] = 'Admin deleted successfully';
   $_SESSION['type'] = 'success';
   header('location: ' . BASE_URL . '/admin/users/index.php');
   exit();
}



?>













<?php 
/*
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 

	// REGISTER USER
	if (isset($_POST['register-btn'])) {
		// receive all input values from the form
		$username = esc($_POST['username']);
		$email = esc($_POST['email']);
		$password = esc($_POST['password']);
		//$password_2 = esc($_POST['password_2']);


		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			array_push($errors, "Uhmm...We gonna need your username"); 
		}
		if (empty($email)) { 
			array_push($errors, "Oops.. Email is missing"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "uh-oh you forgot the password"); 
		}
		// if ($password_1 != $password_2) {
		// array_push($errors, "The two passwords do not match");
		// }

		// Ensure that no user is registered twice. 
		// the email and usernames should be unique
		$user_check_query = "SELECT * FROM $table WHERE username='$username' 
								OR email='$email' LIMIT 1";

		$result = mysqli_query($conn, $user_check_query);
		$user = mysqli_fetch_assoc($result);

		if ($user) { // if user exists
			if ($user['username'] === $username) {
			  array_push($errors, "Username already exists");
			}

			if ($user['email'] === $email) {
			  array_push($errors, "Email already exists");
			}
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO $table (username, email, password, created_at, updated_at) 
					  VALUES('$username', '$email', '$password', now(), now())";
			mysqli_query($conn, $query);

			$reg_user_id = mysqli_insert_id($conn); // get id of created user

			$_SESSION['user'] = getUserById($reg_user_id); // put logged in user into session array

			$_SESSION['message'] = "You are now logged in";
			header('location: index.php');
		}
	}


	// LOG USER IN
	if (isset($_POST['login_btn'])) {
		$username = esc($_POST['username']);
		$password = esc($_POST['password']);

		if (empty($username)) { 
			array_push($errors, "Username required"); 
		}
		if (empty($password)) { 
			array_push($errors, "Password required"); 
		}

		if (empty($errors)) {
			$password = md5($password);

			$sql = "SELECT * FROM $table WHERE username='$username' and password='$password' LIMIT 1";

			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// get id of created user
				$reg_user_id = mysqli_fetch_assoc($result)['id']; 

				// put logged in user into session array
				$_SESSION['user'] = getUserById($reg_user_id); 
			  	$_SESSION['message'] = "You are now logged in";

			  	// redirect to home page
			  	header('location: index.php');
			  	exit(0);
			} else {
				array_push($errors, 'Wrong credentials');
			}
		}


		
		

	}



	// escape value from form
	function esc(String $value)
	{	
		// bring the global db connect object into function
		global $conn;

		$val = trim($value); // remove empty space sorrounding string
		$val = mysqli_real_escape_string($conn, $value);

		return $val;
	}

	// Get user info from user id
	function getUserById($id)
	{
		global $conn;
		$sql = "SELECT * FROM $table WHERE id=$id LIMIT 1";

		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);

		// returns user in an array format: 
		// ['id'=>1 'username' => 'Awa', 'email'=>'a@a.com', 'password'=> 'mypass']
		return $user; 
	}
*/
?>
