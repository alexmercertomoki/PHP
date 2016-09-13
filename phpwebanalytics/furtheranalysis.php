
<!DOCTYPE html>

<html>

<body>

<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>

<body>
<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 12/7/15
 * Time: 16:13
 */

require_once 'functions.php';


    $conn = connectDB();


    if ($_POST["function"]== "see how many requests there are"){

        numbers($conn);


    }else if ($_POST["function"] == "see who are viewing"){
        who($conn);

    }else if ($_POST["function"] == "see traffic"){
        traffic($conn);

    }else if ($_POST["function"] == "see pages being viewed"){
        pages($conn);

    }else if ($_POST["function"] == "see what kinds of machines are viewing"){

        machines($conn);
    }



    function numbers($conn){
        if($conn){
            $res = mysql_query("select count(ip) from weblog");

            echo "<h2>Number of requests during period:</h2><br>";

            while ($row = mysql_fetch_array($res)) {
                printf("There are %d requests during this period... " , $row[0]);
            }
        }
        echo " <br><br><a href=\"mainpage.php\" class=\"btn btn-default\" role=\"button\">Back to Main Page</a>";


    }
    function who($conn){

        if($conn){
            echo "<h2>People who viewed during period their ips are:</h2><br>";

            $res = mysql_query("select DISTINCT ip from weblog");

            while ($row = mysql_fetch_array($res)) {
                printf("%s was viewing <br>" , $row[0]);
            }

        }
        echo " <br><br><a href=\"mainpage.php\" class=\"btn btn-default\" role=\"button\">Back to Main Page</a>";


    }
    function traffic($conn){
        if($conn){

            echo "<h2> Requests on 10 minutes basis: </h2><br>";

            $res = mysql_query("select time from weblog");

            $date = array(0,0,0,0,0,0,0);
            $date[0] = date_create("2015-11-21 05:10:00");
            $date[1] = date_create("2015-11-21 05:20:00");
            $date[2] = date_create("2015-11-21 05:30:00");
            $date[3] = date_create("2015-11-21 05:40:00");
            $date[4] = date_create("2015-11-21 05:50:00");
            $date[5] = date_create("2015-11-21 06:00:00");
            $date[6] = date_create("2015-11-21 06:10:00");
            $count = array(0,0,0,0,0,0);

            while ($row = mysql_fetch_array($res)) {
                $dateFromDB = date_create($row[0]);

                if($dateFromDB < $date[1]){
                    $count[0] ++;
                } else if($dateFromDB < $date[2]){
                    $count[1] ++;
                } else if($dateFromDB < $date[3]){
                    $count[2] ++;
                } else if($dateFromDB < $date[4]){
                    $count[3] ++;
                } else if($dateFromDB < $date[5]){
                    $count[4] ++;
                } else if($dateFromDB < $date[6]){
                    $count[5] ++;
                }

            }
            $len = count($count);

            for($i = 0; $i < $len; $i++) {

                $res1 = date_format($date[$i],"Y/m/d g:i:s");
                $res2 = date_format($date[$i],"Y/m/d g:i:s");
                echo " <br> $res1 - $res2   -------   $count[$i] time(s) <br>";

            }


        }
        echo "<br><a href=\"mainpage.php\" class=\"btn btn-default\" role=\"button\">Back to Main Page</a>";


    }
    function pages($conn){


        if($conn){

            $res = mysql_query("select page,count(page) from weblog GROUP BY page");
            echo "<h2> All the pages that are viewed and the number of times being viewed: </h2><br>";
            while ($row = mysql_fetch_array($res)) {

                 if(strpos($row[0], ']') !== FALSE ) {

                } else {
                     printf("%s was viewed  %d time(s) <br>", $row[0], $row[1]);
                 }
            }

        }
        echo "<br><a href=\"mainpage.php\" class=\"btn btn-default\" role=\"button\">Back to Main Page</a>";


    }
    function machines($conn){

        if($conn){

            $res = mysql_query("select DISTINCT machine from weblog");

            echo "<h2> The kinds of machines that are viewing: </h2><br>";

            while ($row = mysql_fetch_array($res)) {
                printf("%s <br>" , $row[0]);
            }

        }

        echo " <br><br><a href=\"mainpage.php\" class=\"btn btn-default\" role=\"button\">Back to Main Page</a>";

    }





?>

</body>
</html>