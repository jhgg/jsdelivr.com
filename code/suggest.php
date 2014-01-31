<?php
//header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + (24 * 60 * 60)));
error_reporting(E_ERROR);
include('config.php');
include('functions.php');


if(!$google){
$input = $_GET["q"];
// No direct access to this file
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!IS_AJAX && !$good) {die('Restricted access');}
}else{
$input = $google;
}


$data = array();
mysql_connect('localhost',$dbuser, $dbpass);
@mysql_select_db($dbname) or die( "Unable to select database");
$input = mysql_real_escape_string($input);
switch ($input){
    case 'bootstrap':
    $query = mysql_query("select * from `$dbname`.`files` WHERE name='bootstrap' ORDER BY `version` DESC");
    break;
    default:
    $query = mysql_query("SELECT * FROM  ( select * from `$dbname`.`files` WHERE name LIKE '%$input%' ORDER BY `version` DESC) as tmp_table GROUP BY `name` LIMIT 10");
}

while ($row = mysql_fetch_assoc($query)) {
$id  = $row['id'];
$name = $row['name'];
$ver = $row['version'];
$filenames = explode(",", $row['filename']);
$file_info = parse_ini_file("../files/$name/info.ini");
$author = $file_info ['author'];
$homepage = $file_info ['homepage'];
$description = $file_info ['description'];
$github = $file_info ['github'];
if(empty($github)){ $github = "http://github.com";}

$query2 = mysql_query("SELECT `version` FROM `$dbname`.`files` WHERE name=\"$name\";");
while($arra2[]=mysql_fetch_array($query2));

buildresult($name,$ver,$filenames,$author,$homepage,$github,$description,$arra2,$domain);
$arra2 ='';
$names[] .= $name; //build array with all names
$vers[$name] .= $ver;
$filenamesarr[$name] = array($filenames);

if($name==$input)break;
}
if(!$name){echo "No results<br>"; }
echo "<script>
$(function(){
  $('#dropdown-1 >li > a').click(function(e){
  e.preventDefault();
  var version=$(this).text();
  var file =  window.test;
  fileg = file.replace(/\./g,'');

  var filelist = 'fileli'+fileg;
  var versionli = 'ver'+fileg;
  var modalli = fileg+'modal';

  if(!file){
            file = document.getElementById('s').value;
        }
  file =  file.replace(/\#!/g,'');
    var yt_url='http://$domain/code/filever.php?v='+version+'&n='+file;
    $.ajax({
        type: 'GET',
        url: yt_url,

        success: function(response)
    {
        $('#' + filelist).html('');
        if(response.length)
        {
            $('#' + filelist).append(response);
            $('#' + versionli).text(version);
        }

    }
  });

   var yt_url='http://$domain/code/integrationver.php?v='+version+'&n='+file;
    $.ajax({
        type: 'GET',
        url: yt_url,

        success: function(response)
    {
        $('#' + modalli).html('');
        if(response.length)
        {
            $('#' + modalli).append(response);
        }

    }
  });

});
return false;
});
</script>
<script>$('.files').showMore();</script>";
quickview($names,$vers,$filenamesarr);
?>
