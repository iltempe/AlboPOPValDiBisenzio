
//-------------------------------------------------------------------------------
//  LIBRARY FOR PARSING Albo POP Project
//-------------------------------------------------------------------------------
//  Author      Matteo Tempestini
//  Date        11 02 2016
//  License     MIT
//-------------------------------------------------------------------------------
//  List of parsers for Albo POP 
//-------------------------------------------------------------------------------

<?php

require_once('utility.php');


//estracting text information from albo pretorio of "vallata" cities
function parsing_albo_vallata($url) {

	$html = file_get_contents($url);
	$dom = new DOMDocument();
	$dom->loadHTML($html);
	$xpath = new DOMXPath($dom);
 
//XPath Query
//$my_xpath_query = "//body/div[1]/div";
	$my_xpath_query = "//p";
  $data = array();

$res = $xpath->query($my_xpath_query);

foreach($res as $span)
   {
   	 //echo get_string_between($span->nodeValue, "Data pubblicazione:", "Data scadenza:");
     $stringa = $span->nodeValue;
     $data[] = get_string_between($span->nodeValue, "Data pubblicazione:", "Data scadenza:");
     print_r($span->nodeValue);
     print_r("---------------");
    }	

   
   	//$my_xpath_query = "//a/@href";
	//$res = $xpath->query($my_xpath_query);

	//foreach($res as $span)
   	//{
	// echo $span->nodeValue;     
   	//}	
}

