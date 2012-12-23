<?php
//function createXML($name)
function createXML($name)
{
	copy('../xml/masterlist.xml', '../xml/Users/masterlist.xml');
	rename("../xml/Users/masterlist.xml", "../xml/Users/".$name.".xml");
}


?>
