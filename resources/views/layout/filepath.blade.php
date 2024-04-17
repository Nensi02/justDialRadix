<?php

if (strpos($_SERVER['HTTP_HOST'], "localhost") !== FALSE) {
    define('SITE_DIRECTORY', "justDial");  // If site hosten in particular directory then set it. If site upload on Root then put it Slash (/) Only
} else {
    $_SERVER['DOCUMENT_ROOT'] .=  "nensi";
    define('SITE_DIRECTORY', "nensi/justDial");  // If site hosten in particular directory then set it. If site upload on Root then put it Slash (/) Only
}
define('SITE_PROTOCOL', "http://"); //$_root_path

define('SITE_URL', SITE_PROTOCOL . $_SERVER['HTTP_HOST'] . "/" . SITE_DIRECTORY);  //Site URL with Protocol

define('NENSI', SITE_URL.'/img');

?>