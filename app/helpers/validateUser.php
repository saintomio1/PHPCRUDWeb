<?php

function validateUser($user)
{

$errors = array(); 

if (empty($user['username'])) { 
	array_push($errors, 'Uhmm...We gonna need your username'); 
}
      
if (empty($user['email'])) { 
   array_push($errors, 'Oops.. Email is missing'); 
}

if (empty($user['password'])) { 
   array_push($errors, 'uh-oh you forgot the password'); 
}

if ($user['passwordConf'] !==$user['password']) { 
   array_push($errors, 'Passwords do not match'); 
}
/*
$existingUser = selectOne('users', ['email' => $user['email']]);
if ($existingUser) {
   array_push($errors, 'Email already exist');
}   
*/

$existingUser = selectOne('users', ['email' => $user['email']]);
if ($existingUser) {
   if(isset($user['update-user']) && $existingUser['id'] != $user['id']) {
      array_push($errors, 'Email already exist');
   }
   if(isset($user['create-admin'])) {
   array_push($errors, 'Email already exist');
   }   
}

   return $errors;
}


function validateLogin($user)
{

$errors = array(); 

if (empty($user['username'])) { 
	array_push($errors, 'Uhmm...We gonna need your username'); 
}
      
if (empty($user['password'])) { 
   array_push($errors, 'uh-oh you forgot the password'); 
}

   return $errors;
}
