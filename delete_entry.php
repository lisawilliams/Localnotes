<?php
$page_title = "Delete an Entry";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php print($page_title) ?></title>
</head>
<body>

<?php // Script number 12.8, delete_entry.php
// This script deletes a blog entry. 

// error handling
ini_set('display errors',1);  // Let me learn from my mistakes!
error_reporting(E_ALL|E_STRICT); // Show all possible problems! 

// Connect and select:
$dbc = mysql_connect('localhost', 'database', 'lavalamp');
mysql_select_db('myblog');

if(isset($_GET['id']) && is_numeric($_GET['id']))
	{
		// Display the entry in a form:
		// Define the query:
		$query = "SELECT title, entry FROM entries WHERE entry_id={$_GET['id']}";
		if($r = mysql_query($query)) 
		
			// Run the query. 
			{ 
				// Retrieve the information: 			
				$row = mysql_fetch_array($r);
				
				// Make the form: 
				print '<form action="delete_entry.php" method="post">
				<p>Are you sure you want to delete this entry?</p>
				<p><h3>'. $row['title'] .'</h3>' . $row['entry'] . '<br />
				<input type="hidden" name="id" value="'.$_GET['id'].'" />
				<input type="submit" name="submit" value="Delete this entry" /></p>
				
				</form>';
				
			}	else	{
			
				// Couldn't get the information. 
				print '<p style = "color:red;">Could not retrieve the blog entry because:<br />'
				. mysql_error() .'.</p>
				<p>The query being run was:'. $query . '</p>';
			}
	} elseif(isset($_POST['id'])&&is_numeric($_POST['id']))
			{
				// Handle the form: 
				// Define the query: 
				$query = "DELETE FROM entries WHERE entry_id={$_POST['id']} LIMIT 1";
				$r = mysql_query($query); // Execute the query. 
				
				// Report on the result: 
				if(mysql_affected_rows() == 1)
					{
						print '<p>The blog entry has been deleted.</p>';
						
					}	else	{
					
						print '<p style="color:red;">Could not delete the blog entry because:<br />'
						. mysql_error() .'.</p><p>The query being run was: '.$query.'</p>';
					}
						
		}	else	{  // No ID set. 
			
			print '<p style="color:red;">This page has been accessed in error.</p>';
	} // End of main IF. 
	
// Close the database connection. 	
mysql_close();					
									

?>

</body>
</html>