<?php

if (!session_id()) {
    session_start();
}

include("global.php");

$connection = mysql_connect($db_url, $db_user, $db_pwd);
mysql_select_db($db_name, $connection);

$aktionen = mysql_query('SELECT code, answer FROM lime_answers WHERE qid = 58') or die('cannot read activities');
echo '<select name="aktionen">';
while ($aktion = mysql_fetch_row($aktionen)) {
    echo '<option value="' . $aktion[0] . '">' . $aktion[1] . '</option>';
}
echo '</select>';
