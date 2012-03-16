<?php
$page_title = "Create a Table";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php print($page_title) ?></title>
</head>
<body>

<?php // Script number 12.4, create_table.php

// error handling
ini_set('display errors',1);  // Let me learn from my mistakes!
error_reporting(E_ALL|E_STRICT); // Show all possible problems! 

// This script connects to the MySQL server, selects the database, and creates a table. 

// Connect and select: 
if($dbc = @mysql_connect('localhost', 'username', 'password')) 
	
	{
		// Handle the error if the database couldn't be selected: 
		if(!@mysql_select_db('localnotes', $dbc))
			
			{
				print '<p style="color:red;">Could not connect 
				to MySQL:<br />' . mysql_error($dbc) . '.</p>';
			mysql_close();
			$dbc = FALSE;
	}	
	
	}	else	{
	
		// Connection failure.  
		print '<p style = "color:red;">Could not connect to MySQL:<br />'.mysql_error().'.</p>';
	}
	
	if($dbc) 
		{ 
			// Define the query: 
			$query = 'CREATE TABLE entries (entry_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			title VARCHAR(100) NOT NULL, 
			entry TEXT NOT NULL,
			date_entered DATETIME NOT NULL
			)';
			
			// Execute the query: 
			if(@mysql_query($query))
				{
					print '<p>The table has been created.</p>';
					
				}	else	{
				
					print '<p style="color:red;">Could not create the table because: <br />'.mysql_error().'.</p><p>The query being run was:'.$query.'</p>';
				}
	
	// Close the connection. 			
	mysql_close();			
	
	}
	?>

</body>
</html>