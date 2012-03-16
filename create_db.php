<?php
$page_title = "Create the Database";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php print($page_title) ?></title>
</head>
<body>

<?php // Script number 12.2, connect.php #2

// This script connects to the MySQL server. 

// error handling
ini_set('display errors',1);  // Let me learn from my mistakes!
error_reporting(E_ALL|E_STRICT); // Show all possible problems! 

// Attempt to connect to MySQL and print out messages: 
if($dbc = @mysql_connect('localhost', 'username', 'password'))
	{
		print '<p>Successfully connected to MySQL!</p>';
		
	// Try to create the database: 
	
if(@mysql_query('CREATE DATABASE localnotes'))
		
	{
			print '<p>The database has been created!  Now make the table that will store your entries:<a href ="create_table.php">Create table</p>.';
			
		}	else	{
		
		// Could not create it. 
		
			print '<p style="color:red;">Could not create the database because:<br />'.mysql_error().'.</p>';
		}		
		
// Try to select the database: 

	if(@mysql_select_db('localnotes'))
		{
		
			print '<p>The database has been selected!</p>';
			
		}	else	{	
			
			print '<p style="color:red;">Could not select the database because:<br />'. mysql_error().'.</p>';
		}			
		
		// Close the connection
		mysql_close(); 
		
	}	else	{
	
		print '<p style="color:red;">Could not connect to MySQL:<br />'.mysql_error().'.</p>';
		
	}		
						

?>

</body>
</html>