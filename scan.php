<?php
error_reporting(E_ERROR | E_PARSE);

ini_set('output_buffering', 0);
ini_set('implicit_flush', 1);
ob_end_flush();
ob_start();

mysql_connect('localhost','p','p');
mysql_select_db('jimaek_jsdelivr') or die( "Unable to select database 1");
mysql_query("TRUNCATE TABLE `files`;");
mysql_close();

$fp = fopen('sitemap.xml', 'w');
fwrite($fp, '<?xml version="1.0" encoding="utf-8"?>');
fwrite($fp, '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"  xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">');
fclose($fp);

$directory = 'files';
$plugin_directory = array_diff(scandir($directory), array('..', '.', 'info.ini'));
 foreach ($plugin_directory as &$plugin_dir){
 //in files folder. Have list of plugins folders
 $data['project'] = $plugin_dir;
    $version_directory = array_diff(scandir("files/$plugin_dir"), array('..', '.', 'info.ini'));
    natsort($version_directory);
        foreach ($version_directory as &$ver_dir){
        //in versions plugins folder. Have list of version folders
        $data['version'] = $ver_dir;
        if($ver_dir)$result = find_all_files("files/$plugin_dir/$ver_dir/",$plugin_dir,$ver_dir);
            $data['files'] = implode(",", $result);
            db($data['project'],'','',$data['version'],$data['files']);


        }


 }


function find_all_files($dir,$plugin_dir,$ver_dir)
{
$sdir = str_replace("files/$plugin_dir/$ver_dir/",'',$dir);

if(!$plugin_dir)$sdir = $sdir.'/';
    $root = scandir($dir);
    foreach($root as $value)
    {
        if($value === '.' || $value === '..' || $value === 'info.ini') {continue;}
        if(is_file("$dir/$value")) {$result[]="$sdir$value";continue;}
        foreach(find_all_files("$dir/$value") as $value)
        {
        $value = str_replace("files/$plugin_dir/$ver_dir//",'',$value);
            $result[]=$value;
        }
    }
    return $result;
}

function db($name,$homepage,$author,$version,$filename){
if($name == 'jslock')return 0;
mysql_connect('localhost','p','p');
@mysql_select_db('jimaek_jsdelivr') or die( "Unable to select database 2");
$s = $name.'.zip,';
$filename = str_replace($s, '', $filename);
$s = ','.$name.'.zip';
$filename = str_replace($s, '', $filename);
// UPDATE `cdn`.`files` set filename\"$filename\" WHERE name=\"$name\"
if (!mysql_query("INSERT  INTO `jimaek_jsdelivr`.`files` (`name`,`homepage`,`author`,`version`,`filename`) VALUES ('$name','$homepage','$author','$version','$filename');"))
  {
  echo 'Fail!';
  echo mysql_error();
  exit;
  }
  else
  {
  echo "Succesfuly added $name v$version! <br/>";
  ob_flush(); flush();
  }
mysql_close();
sitemap($name);
}

function sitemap($name){
$file = 'sitemap.xml';
$mod = date( 'c', filemtime( $file ) );
$current = file_get_contents($file);
$current .= "<url> ";
$current .= "<loc>http://www.jsdelivr.com/#!$name</loc>";
$current .= "<lastmod>$mod</lastmod> ";
$current .= "<changefreq>monthly</changefreq> ";
$current .= "</url>";
file_put_contents($file, $current);
}

$file = 'sitemap.xml';
$current = file_get_contents($file);
$current .= "</urlset>";
file_put_contents($file, $current);

$file2 = 'timestamp.txt';
$mod = date( 'U', filemtime( 'sitemap.xml' ) );
file_put_contents($file2, $mod);

?>


