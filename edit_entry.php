<?php
$page_title = "Edit a Localnote ";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<LINK href="style.css" rel="stylesheet" type="text/css">
	<title><?php print($page_title) ?></title>
</head>
<body>

<?php // Script number 12.9, edit_entry.php
// This script edits a blog entry using an UPDATE query. 

// error handling
ini_set('display errors',1);  // Let me learn from my mistakes!
error_reporting(E_ALL|E_STRICT); // Show all possible problems! 

// Use include file instead of connect and select code:
include ('includes/connect_db.inc.php');

// Connect and select: 
//$dbc = mysql_connect('localhost', 'username', 'password'); 
//mysql_select_db('localnotes');

if (isset($_GET['id']) && is_numeric($_GET['id'])) 

	{ 
		// Display the entry in a form: 
		// Define the query: 
		$query = "SELECT title, entry FROM notes WHERE entry_id={$_GET['id']}";
		if($r = mysql_query($query))
			
			{
				// Run the query:
				$row = mysql_fetch_array($r); // Retrieve the information
				
				// Make the form: 
				print '<div id="contentwrapper"><h3>Edit Your Note</h3><form action="edit_entry.php" method="post">
				<p>Entry Title:<input type="text" name="title" size="40" maxsize="10"
				value="'.htmlentities($row['title']).'"</p>
				<p>Entry Text:<textarea name="entry" cols="40" rows="5">'.htmlentities($row['entry']).'</textarea></p>
				<input type="hidden" name="id" value="'.$_GET['id'].'"/>
				<input type ="submit" name="submit" value="Update this entry" />
				</form></div>';
				
				}	else	{
				
					print '<p style="color:red;">Could not retrieve the note because: <br />'
					.mysql_error().'.</p><p>The query being run was:'.$query.'</p>';
				}
				
				} 	elseif(isset($_POST['id'])&&is_numeric($_POST['id']))
				
				{ // Handle the form: 
				
					// Validate and secure the form data: 
					$problem = FALSE;
					if(!empty($_POST['title'])&&!empty($_POST['entry']))
					{
						$title = mysql_real_escape_string(trim($_POST['title']));
						$entry = mysql_real_escape_string(trim($_POST['entry']));
					}	else	{
					
						print '<p style="color:red;">Please submit both a title and a note.</p>';
						$problem = TRUE;
					}
			
			if(!$problem)
			
				{
					// Define the query. 
					$query = "UPDATE notes SET title='$title', entry='$entry' WHERE entry_id={$_POST['id']}";
					$r = mysql_query($query); // Execute the query. 
					
					// Report on the result: 
					if(mysql_affected_rows() == 1) 
					{
					print '<div ="contentwrapper"><p><h3> Your note has been updated. </h3><a href ="view_blog.php">View your note.</a></p></div>';
					
						// } else 	{
// 							print '<p style="color:red;">Could not update the entry because: <br />'
// 							.mysql_error().'.</p><p>The query being run was:'.$query.'</p>';
						}
						
				}  // No problem!
				
				}// End of main IF. 
				
	mysql_close(); // Close the database connection. 
				
							

?>

</body>
</html>