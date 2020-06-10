<?php
define ('ROOT_PATH', realpath(dirname(__FILE__)));

//var_dump(ROOT_PATH);

define('BASE_URL', 'http://localhost/fcc_blog2020b'); 
/*
	session_start();
	// connect to database
	$conn = mysqli_connect("localhost", "root", "", "blog2020");

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
   }
   */

/* Defining ROOT_PATH Methods

if (is_production()) {
    define('ROOT_PATH', '/some/production/path');
} else {
    define('ROOT_PATH', '/root');
}
*/

/*
define('ROOT_PATH', dirname(__FILE__));
*/
/* To Require....
require_once "../utility.php";
echo ROOT_PATH;
*/




    // define global constants
	//define ('ROOT_PATH', realpath(dirname(__FILE__)));
	
	/*OR 
	define ('ROOT_PATH', dirname(__FILE__));
	*/
   
//var_dump(ROOT_PATH);

	//define("BASE_URL", "http://localhost/fcc_blog2020b");
	//define("BASE_PATH", "http://localhost:8888")


/*
	// This Option wont work in XAMPP
   define (ROOT_PATH, realpath(dirname(__FILE__)));
   
//var_dump(ROOT_PATH);

	define(BASE_URL, "http://localhost/fcc_blog2020b");
	*/
?>
