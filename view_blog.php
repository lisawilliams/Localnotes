<?php
$page_title = "My Localnotes";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php print($page_title) ?></title>
</head>
<body>

<?php // Script number 12.7, view_blog.php
// This script retrieves blog notes from the database and displays them in the browser. 

// error handling
ini_set('display errors',1);  // Let me learn from my mistakes!
error_reporting(E_ALL|E_STRICT); // Show all possible problems! 

// Use include file instead of connect and select code:
include ('includes/connect_db.inc.php');

// Connect and select: 
//$dbc = mysql_connect('localhost', 'localnotesuser', 'lavalamp');
//mysql_select_db('localnotes');

// Define the query:
$query = 'SELECT * FROM notes ORDER BY date_entered DESC';

// Run the query. 
if ($r = mysql_query($query)) 

	{
		// Retrieve and print every record: 
		while($row = mysql_fetch_array($r))
			{ 
				print "<p><H3>{$row['title']}</h3>
				{$row['entry']}</br>
				<a href=\"edit_entry.php?id={$row['entry_id']}\">Edit</A>
				<a href=\"delete_entry.php?id={$row['entry_id']}\">Delete</a></p><hr />\n";
			}
			
	}	else	{		
					// Do this if the query didn't run. 
					print '<p style="color:red;">Could not retrieve the date because:<br />
					'. mysql_error() .'.</p><p>The query being run was:'.$query.'</p>';
	} // End of query IF. 
	
// Close the database connection. 	
mysql_close();	
	

?>

</body>
</html>