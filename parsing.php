
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
	
	$my_xpath_query = "//p";
	$res1 = $xpath->query($my_xpath_query);
   	
   	$my_xpath_query2 = "//a/@href";
	$res2 = $xpath->query($my_xpath_query2);

foreach($res1 as $span1)
   {
     $string = $span1->nodeValue;
 	 $string = str_do_better($string);
    }
foreach($res2 as $span2)
   {
     $links[] = "http://194.243.23.67:8080/albopretorio/" .$span2->nodeValue;
    }    
	
$string_arr = explode(":", $string);
unset($string_arr[0]);

$string_arr_items=array_chunk($string_arr, 5);

for($i=0, $size = count($string_arr_items); $i<=$size; $i++) {
	$string_arr_items[$i]=format_item($string_arr_items[$i]);
	echo $i;
}
print_r($string_arr_items);

//LINKS
print_r($links);

}

function str_do_better($string)
{
    $string = preg_replace('/^[ \t]*[\r\n]+/m', '', $string);
	$string = str_replace("\n", "", $string);
	$string = str_replace("\r", "", $string);
	return $string;
}

function format_item($array)
{
	$item[0]=str_replace("    Tipo", "",$array[0]);
	$item[1]=str_replace("    Data pubblicazione", "",$array[1]);
	$item[2]=str_replace("    Data scadenza", "",$array[2]);
	$item[3]=str_replace("Oggetto", "",$array[3]);
	$item[4]=str_replace("Documento Numero", "",$array[4]);
	return $item;
}

