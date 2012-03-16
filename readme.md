**Localnotes README**

Localnotes is a super-simple note-taking app that's intended to be used *locally* on your own laptop or desktop machine.

**IMPORTANT:** Localnotes has no, repeat NO access control system.  Once it's installed, you don't need a username or a password to add, edit, or delete entries.  So if you put it on a live webserver ( as opposed to a local webserver  running on your machine) anybody could write, edit, or delete anything you've written.  That's why it's LOCAL notes :)  

**Requirements:**

* You must have MAMP or WAMP installed on your machine.   (Any machine with a web server and MySQL will do, actually). 
* You have to have the username and password for a MySQL user that can create a database, create a table, create, select, update, and delete records. 

**Installation:**

* In your web/htdocs folder, create a new folder entitled "localnotes."
* Put the following files in that folder:  add_entry.php, create_db.php, create_table.php, edit_entry.php, view_blog.php and style.css.   
* Make one more folder inside localnotes and call it "includes."
* Put connect_db.inc.php in the "includes" folder.  You will need to edit it and add the unique MySQL passwords of the MySQL user mentioned in the Requirements section. 
* Point your browser at localhost/localnotes/create_db.php.  If successful, you should get a message telling you the Localnotes database has been created. 
* Point your browser at localhost/localnotes/create_table.php.  If successful, you should get a message telling you the table that your Localnotes entries will be stored in on your Localnotes database has been created.  
* Point your browser at add_entry.php and make a new entry.  
* Point your browser at view_blog.php and you should be able to see your new entry. 

**Notes:**

*  While I have been a longtime tinkerer and bugfixer, I recently started teaching myself to write apps from scratch. This is the first piece of software I have ever written.  *Grouchy comments and snark will go straight to /dev/null.*  Mean people suck, so be nice.
* I cannot, at this time, commit to fielding any support requests for Localnotes.  However, I am happy to allow anyone to fork this code and play with it, and would happily entertain pull requests. 
* Use at your own risk. 
*  I learned how to do this using Larry Ullman's excellent book PHP for the Web. 
* I may be adding additional stuff to Localnotes, but no promises ;)