#!/usr/bin/php

//-------------------------------------------------------------------------------
//  Utility Albo POP Project
//-------------------------------------------------------------------------------
//  Author      Matteo Tempestini
//  Date        11 02 2016
//  License     MIT
//-------------------------------------------------------------------------------
//  List of utility for Albo POP 
//-------------------------------------------------------------------------------

<?php

function get_string_between($string, $start, $end){
    $string = " ".$string;
    $ini = strpos($string,$start);
    if ($ini == 0) return "";
    $ini += strlen($start);   
    $len = strpos($string,$end,$ini) - $ini;
    return substr($string,$ini,$len);
}
