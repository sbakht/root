<?php
//function createXML($name)
function createXML($name)
{
	copy('../masterlist.xml', 'root/masterlist.xml');
	rename("masterlist.xml", $name.".xml");
	/*$doc = new DomDocument('1.0', 'UTF-8');
    //$dococ = new_xmldoc('1.0');
	//$root = $dococ->add_root($name);
	//$p90x = $root->new_child('P90X');
	//$week = $p90x->new_child('W1');
	$doc->formatOutput = true;
	
$thename = $doc->createElement($name);
 
$p90x = $doc->createElement('p90x');
 
$week = $doc->createElement('week1');
$p90x->appendChild($week);
 
$author = $doc->createElement('author','Mark Twain');
$p90x->appendChild($author);
 
//$p90xs->appendChild($p90x);
 
$p90x = $doc->createElement('book');
 
$title = $doc->createElement('title','Adventures of Huckleberry Finn');
$p90x->appendChild($title);
 
$author = $doc->createElement('author','Mark Twain');
$p90x->appendChild($author);
 
//$p90xs->appendChild($p90x);
 
//$doc->appendChild($p90xs);
//echo $doc->saveXML();
$doc->save($name.".xml");
*/



}


?>
