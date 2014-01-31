<?php
error_reporting(0);
ini_set('memory_limit', '200M');
ini_set('max_execution_time', '0');


mysql_connect('localhost','j','j');
@mysql_select_db('jimaek_jsdelivr') or die( "Unable to select database");
$query = mysql_query("SELECT DISTINCT `name` from `jimaek_jsdelivr`.`files` ORDER BY `name` ASC");

while ($row = mysql_fetch_assoc($query)) {

    $name = $row['name'];
    $zip = $name.'.zip';
    $versione = runqr2("select version from `jimaek_jsdelivr`.`files` where `name`='$name' ORDER BY `version` DESC ");
    $versions = $versione;
    natsort($versione);
    $latestver = end($versione);
    $file_info  = parse_ini_file("../www/files/$name/info.ini");
    $author  = $file_info ['author'];
    $homepage  = $file_info ['homepage'];
    $description = $file_info ['description'];
    $mainfile = $file_info ['mainfile'];
    $github = $file_info ['github'];
    foreach($versions as $version){
        $filenames = runqr("select filename from `jimaek_jsdelivr`.`files` where `name`='$name' and `version`='$version'");
        $filenames  = explode(",", $filenames['filename']);
        $asset[] =   array(
                    'version' => $version,
                    "files" => $filenames
        );
    }
    $package[] =  array(
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

$fpackage = array ("package" => $package);
header('Content-type: application/json');
echo json_encode($fpackage);

function runqr2($run){
mysql_connect('localhost','j','');
@mysql_select_db('jimaek_jsdelivr') or die( "Unable to select database");
$query = mysql_query($run);
$arr = array();
while ($result_array = mysql_fetch_row($query)) {
    $arr[] = $result_array[0];
}
return $arr;
}

function runqr($run){
mysql_connect('localhost','j','');
@mysql_select_db('jimaek_jsdelivr') or die( "Unable to select database");
$query = mysql_query($run);
$result = mysql_fetch_assoc($query);
mysql_close();
return $result;
}
?>