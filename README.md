website
=======

jsDelivr's official website at jsdelivr.com


hash.php and timestamp.txt are used by WordPress plugin. 

scan.php -  It is run every time a change is made to the repo. It scans files/ directory and populates the database.

packagesmain.php - used by API

To get it to work:

* Create files/ directory and put some folders from the main repo
* Modify config.php with your DB login information
* Modify scan.php with DB login information (yeap its stupid)
* Run scan.php and the DB should get populated with data
* Modify custom.js:59 and change the hostname to point to your local setup.
* Modify footer.php:33 and change the hostname to point to your local setup like above.


**WARNING**

This code will make you wanna kill yourself.
Only experienced developers should attempt at reading this repo.
