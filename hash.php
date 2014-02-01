<?php
include('code/config.php');
$cachefile = 'cache/hash.cache';
$cachetime = 360 * 60;
// Serve from the cache if it is younger than $cachetime
if (file_exists($cachefile) && (time() - $cachetime < filemtime($cachefile))) {
    include($cachefile);
    echo "<!-- Cached " . date('jS F Y H:i', filemtime($cachefile)) . " -->";
    exit;
}
ob_start();


error_reporting(0);
mysql_connect('localhost',  $dbuser, $dbpass);
@mysql_select_db($dbname) or die("Unable to select database");
$query = mysql_query("select * from `jimaek_jsdelivr`.`files` ORDER BY `version` DESC ");
$k     = 0;

while ($row = mysql_fetch_assoc($query)) {
    $k++;
    //$id[$k]  = $row['id'];
    $name      = $row['name'];
    $ver       = $row['version'];
    $zip       = $name . '.zip';
    $filenames = explode(",", $row['filename']);
    foreach ($filenames as &$filename) {
        $url      = "http://www.jsdelivr.com/files/$name/$ver/$filename";
        $contents = file_get_contents(stripslashes($url));
        $hash[]   = md5($contents);

    }
    $file_info   = parse_ini_file("files/$name/info.ini");
    $author      = $file_info['author'];
    $homepage    = $file_info['homepage'];
    $description = $file_info['description'];
    $package[]   = array(
        "name" => $name,
        "zip" => $zip,
        "version" => $ver,
        "description" => $description,
        "homepage" => $homepage,
        "author" => $author,
        "files" => $filenames,
        "hashes" => $hash
    );

    /*$query2 = mysql_query("SELECT `version` FROM `jimaek_jsdelivr`.`files` WHERE name=\"$name\";");
    while ($arra2 = mysql_fetch_assoc($query2)) {
    $arra[$k] .=  implode(',',$arra2).', ';
    }*/
    $hash = '';


}

$fpackage = array(
    "package" => $package
);

header('Content-type: application/json');
echo json_encode($fpackage);

$fp = fopen($cachefile, 'w');   // open the cache file for writing
fwrite($fp, ob_get_contents()); // save the contents of output buffer to the file
fclose($fp);                    // close the file
ob_end_flush();                 // Send the output to the browser
?>
