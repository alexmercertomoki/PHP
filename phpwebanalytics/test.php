<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 12/5/15
 * Time: 22:13
 */
require_once "processLog.php";
require_once "functions.php";



$pl = new pl();
$pl -> processLog(" ");

$nowip = $pl->ip ;
$nowdate = $pl->date;
$nowpage = $pl->page;
$nowmachine = $pl->machine;


$connect = connectDB();

if ($connect) {
    // serial is auto_increment  or  you will have to set auto-increment creating a table yourself

//    $res = mysql_query("Insert into weblog(ip,time,page,machine) values ('$nowip','$nowdate','$nowpage','$nowmachine')");
//    printf("Last inserted record has id %d\n", mysql_insert_id());


    echo "-$res- <br>";

}

?>