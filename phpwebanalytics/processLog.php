<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 12/5/15
 * Time: 21:18
 */
class pl{

    public $ip;
    public $date;
    public $page;
    public $machine;

    function processLog($line){

        $this->ip = substr($line, 0, strrpos($line," - -") );
        $temp = substr($line,strrpos($line,"[") + 1, strrpos($line,']') - strrpos($line,'[') - 1 );

    //date_format($date,"Y/m/d g:i:s")
        $this->date = date_format(date_create($temp),"Y/m/d g:i:s");


        $httpstart = stripos($line,"\"http://") + 1;
        $httpend = stripos($line,"\"",$httpstart);
//        echo $httpstart."<br>";
//        echo $httpend."<br>";

        $this->page = substr($line,$httpstart, $httpend - $httpstart);
        $this->machine = substr($line, stripos($line,"(") + 1, stripos($line,")") - stripos($line,"(") - 1);

    }


}

?>