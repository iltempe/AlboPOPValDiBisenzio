#!/usr/bin/php

//-------------------------------------------------------------------------------
// Albo POP Project main script
//-------------------------------------------------------------------------------
//  Author      Matteo Tempestini
//  Date        11 02 2016
//  License     MIT
//-------------------------------------------------------------------------------
//  Select the right parser and Build RSS Feed
//-------------------------------------------------------------------------------

<?php

require_once( 'class.rssbuilder.php' );
require_once('parsing.php');

//CANTAGALLO
rss_build('cantagallo');


function rss_build($comune) {

//FEED TEMPLATE

//<rss version="2.0">
//<channel>
//<title>alboPOPPrato</title>
//<link>http://albopretorio.comune.prato.it</link>
//<description>*non ufficiale* feed RSS Albo Pretorio di Prato</description>
//<lastBuildDate>Thu, 11 Feb 2016 07:20:32 GMT</lastBuildDate>
//<generator>PyRSS2Gen-1.1.0</generator>
//<docs>http://blogs.law.harvard.edu/tech/rss</docs>


//ITEMS
//title>...</title>
//<description>...</description>
//<guid isPermaLink="true">...</guid>
//<pubDate>Tue, 09 Feb 2016 00:00:00 GMT</pubDate>

//build the RSS feed
$RB = new RSSBuilder();


switch ($comune) {

    case 'cantagallo':

		$parsed=parsing_albo_vallata('http://194.243.23.67:8080/albopretorio/albocantagallo.php');

		$RB->addChannel(); 
		$RB->addChannelElement( 'title', 'alboPOPCantagallo' );
		$RB->addChannelElement( 'link', 'http://194.243.23.67:8080/albopretorio/albocantagallo.php' );
		$RB->addChannelElement( 'description', '*non ufficiale* feed RSS Albo Pretorio di Cantagallo' );
		//$RB->addChannelElement( 'pubDate', 'Tue, 10 Jun 2003 04:00:00 GMT' );
		$RB->addChannelElement( 'lastBuildDate', 'Tue, 10 Jun 2003 09:41:01 GMT' );
		//$RB->addChannelElement( 'docs', 'http://blogs.law.harvard.edu/tech/rss' );
		$RB->addChannelElement( 'generator', 'PHP Framework' );
		//$RB->addChannelElement( 'managingEditor', 'editor@example.com' );
		
	for($i = 0; $i <=count($parsed[1]); $i++)
		{ 
			$RB->addItem();
			$RB->addItemElement( 'title', 'Star City' );
			$RB->addItemElement( 'description', 'How do Americans get ready to work with Russians aboard the International Space' );
			$RB->addItemElement( 'link', $parsed[1][i] );
			$RB->addItemElement( 'pubDate', 'Tue, 03 Jun 2003 09:39:21 GMT' );
		}
	break;

}

echo $RB;
}
