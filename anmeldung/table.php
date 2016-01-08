<?php

if (!session_id()) {
    session_start();
}

include("global.php");

$activity_id = $_POST['activity'];

$connection = mysql_connect($db_url, $db_user, $db_pwd);
mysql_select_db($db_name, $connection);

$rs2 = mysql_query('SHOW COLUMNS FROM ' . $activity_table . ';') or die('Fehler: Anmeldungen können nicht angezeigt werden.');
$query = 'SELECT * FROM ' . $activity_table . ' WHERE ' . $activity_column . '=' . $activity_id . ';';
//echo $query;
$rs1 = mysql_query($query) or die('Fehler: Anmeldungen können nicht angezeigt werden.');

if (mysql_num_rows($rs1)) {
    echo '<table cellpadding="0" cellspacing="0" class="db-table">';
    echo '<tr>';
    while ($column = mysql_fetch_row($rs2)) {
        $columnName = $column[0];
        echo '<th>', $columnName, '</th>';
    }
    echo '</tr>';
    while ($row2 = mysql_fetch_row($rs1)) {
        echo '<tr>';
        foreach ($row2 as $key => $value) {
            echo '<td>', $value, '</td>';
        }
        echo '</tr>';
    }
    echo '</table><br />';
} else {
    echo '<p>Es sind keine Anmeldungen vorhanden.</p>';
}

