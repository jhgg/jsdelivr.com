<?php
include('code/config.php');
error_reporting(0);
ini_set('memory_limit', '200M');
ini_set('max_execution_time', '0');


mysql_connect('localhost', $dbuser, $dbpass);
@mysql_select_db($dbname) or die("Unable to select database 1");
$query = mysql_query("SELECT DISTINCT `name` from `$dbname`.`files` ORDER BY `name` ASC");

while ($row = mysql_fetch_assoc($query)) {

    $name     = $row['name'];
    $zip      = $name . '.zip';
    $versione = runqr2("select version from `$dbname`.`files` where `name`='$name' ORDER BY `version` DESC ");
    $versions = $versione;
    natsort($versione);
    $latestver   = end($versione);
    $file_info   = parse_ini_file("files/$name/info.ini");
    $author      = $file_info['author'];
    $homepage    = $file_info['homepage'];
    $description = $file_info['description'];
    $mainfile    = $file_info['mainfile'];
    $github      = $file_info['github'];
    foreach ($versions as $version) {
        $filenames = runqr("select filename from `$dbname`.`files` where `name`='$name' and `version`='$version'");
        $filenames = explode(",", $filenames['filename']);
        $asset[]   = array(
            'version' => $version,
            "files" => $filenames
        );
    }
    $package[] = array(
        "name" => $name,
        "zip" => $zip,
        "mainfile" => $mainfile,
        "lastversion" => $latestver,
        "versions" => $versions,
        "description" => $description,
        "homepage" => $homepage,
        "github" => $github,
        "author" => $author,
        "assets" => $asset
    );

    $asset = '';
}

$fpackage = array(
    "package" => $package
);
header('Content-type: application/json');
echo json_encode($fpackage);

function runqr2($run) {
	include('code/config.php');
    mysql_connect('localhost', $dbuser, $dbpass);
    @mysql_select_db($dbname) or die("Unable to select database 2");
    $query = mysql_query($run);
    $arr   = array();
    while ($result_array = mysql_fetch_row($query)) {
        $arr[] = $result_array[0];
    }
    return $arr;
}

function runqr($run) {
	include('code/config.php');
    mysql_connect('localhost', $dbuser, $dbpass);
    @mysql_select_db($dbname) or die("Unable to select database 3");
    $query  = mysql_query($run);
    $result = mysql_fetch_assoc($query);
    mysql_close();
    return $result;
}
?>
