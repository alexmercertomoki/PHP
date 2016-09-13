<?php
/**
 * Created by Bilei.
 * User: Bilei
 * Date: 11/7/15
 * Time: 19:35
 */
    // 0 1 neither prime nor composite so start from 2
    for($i = 2; $i <= 100; $i ++){
        if(isPrime($i)){
            echo " $i";
        }

    }

    // function isPrime
    function  isPrime($number) {
        // divide 2 to the number before the number if one of them the remainder is 0 then it is composite
        for($i = 2; $i < $number; $i ++){
            if($number % $i == 0){
                return false;
            }
        }
        return true;
    }


?>