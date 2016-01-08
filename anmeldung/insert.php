<?php

if (!session_id()) {
    session_start();
}

include("global.php");

$connection = mysql_connect($db_url, $db_user, $db_pwd);
mysql_select_db($db_name, $connection);

$code = mysql_query('SELECT MAX(code) FROM lime_answers') + 1;
$sortorder = mysql_query('SELECT MAX(sortorder) FROM lime_answers') + 1;

$query = 'INSERT INTO lime_answers VALUES (58, ' . $code . ', ' . $name . ', ' . $sortorder . ', 1, de, 0)'; 

echo $query;

mysql_query($query) or die('Fehler: Kann Aktion nicht erstellen.');





