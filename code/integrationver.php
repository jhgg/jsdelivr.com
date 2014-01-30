<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('config.php'); 
include('functions.php'); 

$version = $_GET["v"];
$input = $_GET["n"];

mysql_connect('localhost',$dbuser,$dbpass);
@mysql_select_db($dbname) or die( "Unable to select database");
$input = mysql_real_escape_string($input);
$query = mysql_query("SELECT `filename` FROM `$dbname`.`files`  WHERE name=\"$input\" AND version=\"$version\" ");
while ($row = mysql_fetch_assoc($query)) {
$filenames = explode(",", $row['filename']);

$name2 = str_replace('.','',$name);

   echo '<div class="modal bigmodal" id="'.$name2.'modal" style="">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">x</button>
    <h3>Quick Integration Code</h3>
    </div>
    <div class="modal-body">
    <textarea class="field span11" rows="15">';
	foreach($filenames as $filename){
		if(checkext($filename)=='js')
		{
		echo '<script type="text/javascript" src="//cdn.jsdelivr.net/'.$input.'/'.$version.'/'.$filename.'">&#13;';}elseif(checkext($filename)=='css'){
		echo '<link type="text/css" rel="stylesheet" href="//cdn.jsdelivr.net/'.$input.'/'.$version.'/'.$filename.'" />&#13;';}
		}
	echo '</textarea>    
    </div>
</div>';

}
?>