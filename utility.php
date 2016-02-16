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

//from dd/mm/YYYY string to RSS pubDate
function string2dataRSS($datestring)
{
		$datestring=str_replace("/", "-",$datestring);
		$datestring=strtotime($datestring);
		$pubDate=date('r',$datestring);
		return $pubDate;
}

//curl manager
function curl_manage($url)
{
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_VERBOSE,1);
		//curl_setopt($ch,CURLOPT_HTTPPROXYTUNNEL,true);
		curl_setopt($ch,CURLOPT_PROXYTYPE,CURLPROXY_HTTP);
		//curl_setopt($ch,CURLOPT_PROXY,'http://proxy.shr.secureserver.net:3128');
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_TIMEOUT,120);
		$data = curl_exec($ch);
		curl_close($ch);
		
		return $data;
}

