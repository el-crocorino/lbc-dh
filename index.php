<?php 

require_once('config.php') ; 

// libraries inclusion

for($i=0;$i<count($dConfig['includes']);$i++){ 
	require_once('includes/' . $dConfig['includes'][$i]);
}

$flux = new flux('appartements', 'http://www.leboncoin.fr/locations/offres/languedoc_roussillon/?f=a&th=1&mre=650&sqs=5&ret=2&location=Montpellier');

$search = $flux->get_url_content();
$search = $flux->load_search_DOM($search);
$list = $flux->getElementsByClassName($search, 'list-lbc');

foreach ($list[0]->getElementsByTagName('a') as $key => $value) {

 	$length = $value->attributes->length;
	$title = $value->attributes->item(1)->textContent;
	echo $title . "\r\n" ;
	$url = $value->attributes->item(0)->textContent;
	echo $url . "\r\n" ;

 }

//var_dump($list);

?> 