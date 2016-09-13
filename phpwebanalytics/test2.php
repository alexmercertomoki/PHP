<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 12/6/15
 * Time: 02:58
 * 21/Nov/2015:05:10:53 -0800
 */

    $date=date_create("21/Nov/2015:05:10:53 -0800");
    $date2=date_create("21/Nov/2015:05:09:53 -0800");

    $res = date_format($date,"Y/m/d g:i:s");

    echo $res;
    if($date > $date2) echo "YES";

?>