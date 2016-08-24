<?php
$connection = mysql_connect('localhost:666', 'root', 'root');
if (!$connection){
    die("Database Connection Failed" . mysql_error());
}
$select_db = mysql_select_db('srb_db');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}