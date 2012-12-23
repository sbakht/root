<?php
	//$a[] = new array("!","@","#");

	//get the q parameter from URL
	$q=$_GET["q"];
	$hint="";
	
	//check if all the characters are alphanumeric
	if (strlen($q) > 0){
		$hint="";
		if(!(ctype_alnum($q))){
			$hint="Incorrect usage of characters";
		}else{
			$hint="";
		}
	}
	  
	// Set output to "no suggestion" if no hint were found
	// or to the correct values
	if($hint == ""){
	  $response="";
	//}else if($hint
	}else{
	  $response=$hint;
	}

	//output the response
	echo $response;
?>