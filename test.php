<?php
include('./mysql.php');
$a = sql_create_table('user');
$b = sql_create_table('product');
$c = sql_create_table('trade');
var_dump($a);
var_dump($b);
var_dump($c);
?>