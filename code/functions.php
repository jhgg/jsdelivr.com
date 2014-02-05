<?php

function buildresult($name, $ver, $filenames, $author, $homepage, $github, $description, $arra2, $domain) {

    $names = str_replace('.', '', $name);
    echo '<article class="project clearfix">
        <header>
        <div class="infobar"><div class="updatebtn">
            <a data-toggle="modal" data-id="' . $name . '" class="openUpdateDialog" href="#update">
                <img title="New version available" src="img/plus.png" alt="Plus" width="26" height="26">
            </a>
        </div>
        <h1><a href="http://' . $domain . '/#!' . $name . '">' . $name . '</a>
        <div class="btn-group" id="version_drop">
        <button title="Select a different version"  class="btn btn-small" id="ver' . $names . '">' . $ver . '</button>
        <button title="Select a different version" data-id="' . $name . '" id="dbut"  data-dropdown="#dropdown-1" data-toggle="dropdown" class="btn btn-small dropdown-toggle">
            <span class="caret"></span>
        </button>

        <ul id="dropdown-1" class="dropdown-menu">';

    foreach ($arra2 as $arra) {
        if ($arra)
            echo "<li><a href='#'>" . $arra[version] . "</a></li>";
    }
    $arra2 = '';

    echo '</ul></div><div class="tags">';
    showtags($name);
    echo '</div></h1></div>
        <div class="author">
            <span title="Author Name" class="authorname">' . $author . '</span>
            <span class="social">
                <a href="' . $github . '">
                    <img src="img/github.png" alt="github" title="Github" width="26" height="26">
                </a>
                <a rel="nofollow" href="' . $homepage . '">
                    <img src="img/web.png" alt="web" title="Website" width="26" height="26">
                </a>
            </span>
        </div>
        <div class="content">
            <p>' . $description . '</p>
        </div>
        </header>
        <div class="integration">
            <a href="#' . $names . 'modal" data-toggle="modal" class="download">Integration</a>
        </div>
        <div class="integration-zip">
            <a href="//cdn.jsdelivr.net/' . $name . '/' . $ver . '/' . $name . '.zip" class="download">Download Zip</a>
        </div>
        <div id="fileli' . $names . '" class="files">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>CDN Files</th>
                    </tr>
                </thead>
                <tbody> ';


    $arra = '';
    foreach ($filenames as &$filename) {
        if ($filename)
            echo "<tr><td><input class='sefile' onclick='this.select()' value='//cdn.jsdelivr.net/$name/$ver/$filename'></td></tr> ";
    }

    echo '</tbody>
            </table>
        </div>

</article>';

}


function showtags($name) {
    if (substr($name, 0, 2) === 'wp') {
        echo '<span class="badge badge-info">WordPress</span>';
    }
    if (strpos($name, 'jquery') !== false) {
        echo '<span class="badge badge-info">jQuery</span>';
    }
    if (strpos($name, 'bootstrap') !== false) {
        echo '<span class="badge badge-info">Bootstrap</span>';
    }
    if (substr($name, 0, 5) === 'font-') {
        echo '<span class="badge badge-info">Font</span>';
    }
}

function quickview($names, $vers, $filenamesarr) {

    foreach ($names as $name) {
        $name2 = str_replace('.', '', $name);

        echo '<div class="modal bigmodal hide" id="' . $name2 . 'modal" style="">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Quick Integration Code</h3>
    </div>
    <div class="modal-body">
    <textarea class="field span11" rows="15">';
        parsefilenames($name, $vers, $filenamesarr);
        echo '</textarea>
    </div>
</div>';
    }
}

function parsefilenames($name, $vers, $filenamesarr) {
    //echo $filenamesarr[$name][0][0];
    $ver = $vers[$name];
    foreach ($filenamesarr[$name] as $filenames) {
        foreach ($filenames as $filename) {
            if (checkext($filename) == 'js') {
                echo '<script src="//cdn.jsdelivr.net/' . $name . '/' . $ver . '/' . $filename . '"></script>&#13;';
            } elseif (checkext($filename) == 'css') {
                echo '<link rel="stylesheet" href="//cdn.jsdelivr.net/' . $name . '/' . $ver . '/' . $filename . '">&#13;';
            }
        }
    }

}

function checkext($filename) {
    return substr(strrchr($filename, '.'), 1);
}


?>
