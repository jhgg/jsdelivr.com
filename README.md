# jsdelivr.com

jsDelivr's official website at [jsdelivr.com](http://www.jsdelivr.com/)


hash.php and timestamp.txt are used by WordPress plugin.

scan.php -  It is run every time a change is made to the repo. It scans files/directory and populates the database.

packagesmain.php - used by API

To get it to work:

* Put project directories inside files/
* Create a MySQL database using structure from DB_structure.sql
* Modify config.php with your DB login information
* Run scan.php and the DB should get populated with data.


**WARNING**

This code will make you wanna kill yourself.
Only experienced developers should attempt at reading this repo.
