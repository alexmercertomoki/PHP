<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 12/5/15
 * Time: 17:21
 */


require_once 'config.php';


function connectDB(){


   $conn =  mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PW);
    mysql_select_db("phpfinalproject");
    return $conn;

}


