<html>
    <head>
        <style type="text/css">
            table.db-table 		{ border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
            table.db-table th	{ background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
            table.db-table td	{ padding:5px; border-left:1px solid #ccc; border-top:1px
                                </style>
                                <title>PHP-Test</title>
            </head>
            <body>

                <?php
                echo '<h1> Anmeldestand </h1>';

                /* connect to the db */
                $connection = mysql_connect('db1179.mydbserver.com', 'p7590d1', 'Spinn0r!!');
                mysql_select_db('usr_p7590_1', $connection);

                function addAktion($name) {

                    $code = mysql_query('SELECT MAX(code) FROM lime_answers') + 1;
                    $sortorder = mysql_query('SELECT MAX(sortorder) FROM lime_answers') + 1;

                    mysql_query('INSERT INTO lime_answers VALUES (58, ' . $code . ', ' . $name . ', ' . $sortorder . ', 1, de, 0)') or die('cannot add aktion');
                }
                ?>

                <script src="jquery-1.11.2.min.js"></script>
                <script>
                    $(document).ready(function () {
                       $("#activities").load("<Bitte auswählen>");
                       // $("#table").load("table.php", {'activity': $('#activities option:first-child').val()});
                       $("#activities").click(function () {
                          // alert("sdf");
                           $("#activities").load("list.php");
                       });
                        $("#activities").change(function () {
                            var tmp = $('#activities option:selected').val();
                            $("#table").load("table.php", {'activity': tmp});
                        });
                    });

                    function insert() {
                        $("#activities").load("list.php");
                        var new_name = document.getElementById('newActivity').value;
                        alert(new_name);
                    }

                    function removeA() {
                        if (confirm('Aktion wirklich entfernen?')) {
                            var delete_action = document.getElementById('activities').value;
                            alert('Comming soon.');
                        } else {
                            // Do nothing!
                        }
                    }
                </script>


                <label for="newActivity">Neue Aktion: </label>
                <input type="text" name="newActivity" id="newActivity" />
                <input id="addBtn" type="button" value="Hinzuf&uuml;gen" onclick="insert();" />
                <br> <br>
                <label for="activities">Aktion ausw&auml;hlen:</label> 
                <select id="activities"><option value="noValue">Bitte wählen</option></select> 
                <input id="removeBtn" type="button" value="L&ouml;schen" onclick="removeA();">
                <br> <br>
                <div id="table"></div>

            </body>
        </html>