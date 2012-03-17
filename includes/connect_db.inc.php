 <? 
 // Script name , connect_db.inc.php 
// This script takes database connection details, like the database username and 
// password, as well as the database name, and puts them in an include file. 
// That way, you can change these details only once, instead of in each script. 


// Connect and select: 
$dbc = mysql_connect('localhost', 'username', 'password'); 
mysql_select_db('localnotes');
?>

