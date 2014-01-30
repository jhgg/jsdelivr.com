website
=======

jsDelivr's official website at jsdelivr.com


hash.php and timestamp.txt are used by WordPress plugin. 

scan.php -  It is run every time a change is made to the repo. It scans files/ directory and populates the database.

To get it to work copy some directories from the Github repo into the files/ directory and run scan.php.

It will populate the DB. Make sure you change the javascript to point to your local server for ajax requests.
