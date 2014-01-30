<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('config.php'); 

$version = $_GET["v"];
$input = $_GET["n"];

mysql_connect('localhost',$dbuser,$dbpass);
@mysql_select_db($dbname) or die( "Unable to select database");
$input = mysql_real_escape_string($input);
$query = mysql_query("SELECT `filename` FROM `$dbname`.`files`  WHERE name=\"$input\" AND version=\"$version\" ");
while ($row = mysql_fetch_assoc($query)) {
$filenames = explode(",", $row['filename']);
echo '<div class="files">
		    <table class="table table-striped table-hover">		
				<thead>
				<tr><th>CDN Files</th></tr>
				</thead>
				<tbody>	';
foreach ($filenames as &$filename) {
    if($filename)echo "<tr><td>//cdn.jsdelivr.net/$input/$version/$filename</td></tr>";
}
echo '</tbody>
			</table>
		</div> <script>$(".files").showMore();</script>';
}


?>