<?php
/**
 * Created by PhpStorm.
 * User: Bilei
 * Date: 12/5/15
 * Time: 03:29
 */


ini_set('post_max_size','64M');
ini_set('upload_max_filesize', '64M');

require_once "functions.php";
require_once "processLog.php";


echo "Hello welcome !";



if ($_FILES["logfile"]["error"] > 0)
{
    echo "Error: " . $_FILES["logfile"]["error"] . "<br />";
}
else if ($_FILES["logfile"]["type"] !== "text/plain")
{
    echo "File must be a plain text file";
}
else {
    // $file_handle = fopen($_FILES["file"]["name"], "rb");
    $fp = fopen($_FILES['logfile']['tmp_name'], 'r');



    $connect = connectDB();

    while (!feof($fp)) {

        $line =fgets($fp);
        $pl = new pl();
        $pl->processLog($line);


        if ($connect) {

            mysql_query("Insert into weblog(ip,time,page,machine) values ('$pl->ip','$pl->date','$pl->page','$pl->machine')");

        }else {
            echo "sth is wrong ! ";
        }

    }

    fclose($fp);


}
header('Location: mainpage.php');


?>


