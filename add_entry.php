<?php
$page_title = "Add a Blog Entry";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php print($page_title) ?></title>
</head>
<body>

<?php // Script 12.6, add_entry.php #2
// This script adds an entry to the database. 
// This version of the script reduces vulnerabilities associated with using apostrophes in a user's entry

// error handling
ini_set('display errors',1);  // Let me learn from my mistakes!
error_reporting(E_ALL|E_STRICT); // Show all possible problems! 

if(isset($_POST['submitted']))

{

// Connect and select: 
$dbc = mysql_connect('localhost','username	','password');
mysql_select_db('localnotes');

// Validate form data: 
$problem = FALSE;
if(!empty($_POST['title']) && !empty($_POST['entry'])) 
	{
		$title = mysql_real_escape_string(trim($_POST['title']));
		$entry = mysql_real_escape_string(trim($_POST['entry']));
		
	}	else	{	
	
		print '<p style="color=red;">Please submit both a title and an entry.</p>';
		$problem = TRUE;
	}
	
if(!$problem)
	{
		// Define the query: 
		$query = "INSERT INTO entries (entry_id, title, entry, date_entered) VALUES (0, '$title', '$entry', NOW())";
				 
		// Execute the query: 
		if(@mysql_query($query, $dbc))
			{
			
				print '<p>Your blog entry has been added to the database.</p>';
				
			}	else	{
				
				print '<p style="color:red;">Could not add the entry because:<br />'
				. mysql_error() .'.</p>
				<p>The query being run was: '.$query.'</p>';
			}
	// No problem!
	
	mysql_close();
	}
}	
// End of form submission IF. 

// Display the form: 
?>

<form action="add_entry.php" method="post">
<p>Entry Title:<input type="text" name="title" size="40" maxsize="10" /></p>
<p>Entry Text:<textarea name="entry" cols="40" rows="5"></textarea></p>
<input type="submit" name="submit" value="Post this entry" />
<input type="hidden" name="submitted" value="true" />
</form>

</body>
</html>