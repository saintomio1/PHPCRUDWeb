<?php


function usersOnly($rediret = '/index.php') 
{
if (empty($_SESSION['id'])) {
	$_SESSION['message'] = "You need to login first";
	$_SESSION['type'] = "error";
	header('location: ' . BASE_URL . $rediret);
   exit(0);
   }
}

function adminOnly($rediret = '/index.php') 
{
if (empty($_SESSION['id']) || empty($_SESSION['admin'])) {
	$_SESSION['message'] = "You're not authorised";
	$_SESSION['type'] = "error";
	header('location: ' . BASE_URL . $rediret);
   exit(0);
   }
}

function guestsOnly($rediret = '/index.php') 
{
if (isset($_SESSION['id'])) {
	header('location: ' . BASE_URL . $rediret);
   exit(0);
   }
}
