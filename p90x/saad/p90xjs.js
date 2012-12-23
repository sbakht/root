/*function routinepick(value){
if(value=="bb"){
//alert("ser");
//var start=document.createElement("h3");
//start.appendChild("It works");
//document.body.appendChild(start);
//body.createElement("h3");
//h3.appendChild("It Works");
//document.getElementById("body")+=<h3>It Works</h3>;
document.getElementById('1ex').innerHTML='<table border="1"><tr><td>Wide Front Pull-Ups</td><td><input type="text" name="1e" size="5" /></td></tr></table>';
document.getElementById('2ex').innerHTML='<table border="1"><tr><td>Lawnmowers</td><td><input type="text" name="2e" size="5" /></td></tr></table>';
document.getElementById('3ex').innerHTML='<table border="1"><tr><td>Twenty Ones</td><td><input type="text" name="3e" size="5" /></td></tr></table>';
document.getElementById('4ex').innerHTML='<table border="1"><tr><td>One Arm Cross Body Curl</td><td><input type="text" name="4e" size="5" /></td></tr></table>';
document.getElementById('4ex').innerHTML='<table border="1"><tr><td>One Arm Cross Body Curl</td><td><input type="text" name="4e" size="5" /></td></tr></table>';
document.getElementById('4ex').innerHTML='<table border="1"><tr><td>One Arm Cross Body Curl</td><td><input type="text" name="4e" size="5" /></td></tr></table>';
document.getElementById('4ex').innerHTML='<table border="1"><tr><td>One Arm Cross Body Curl</td><td><input type="text" name="4e" size="5" /></td></tr></table>';
document.getElementById('4ex').innerHTML='<table border="1"><tr><td>One Arm Cross Body Curl</td><td><input type="text" name="4e" size="5" /></td></tr></table>';
document.getElementById('4ex').innerHTML='<table border="1"><tr><td>One Arm Cross Body Curl</td><td><input type="text" name="4e" size="5" /></td></tr></table>';
document.getElementById('4ex').innerHTML='<table border="1"><tr><td>One Arm Cross Body Curl</td><td><input type="text" name="4e" size="5" /></td></tr></table>';
document.getElementById('4ex').innerHTML='<table border="1"><tr><td>One Arm Cross Body Curl</td><td><input type="text" name="4e" size="5" /></td></tr></table>';

}


}
*/
function successAcc(){
alert("Account Successfully Created");
}

//loads and displays the xml doc
function loadXMLDoc(value){
	var xmlhttp;
	var txt,x,i;
	var thevalue;
	/* //unnecessary stuff, i fixed with better programming
	if(value=="cb"){
		thevalue="e1";
	}else if(value=="lb"){
		thevalue="e2";
	}else if(value=="sa"){
		thevalue="e3";
	}else if(value=="cst"){
		thevalue="e4";
	}else if(value=="bb"){
		thevalue="e5";
	}else if(value=="ar"){
		thevalue="e6";
	}
	*/
	
	//AJAX doing its stuff
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			xmlDoc=xmlhttp.responseXML;
			txt="";
			x=xmlDoc.getElementsByTagName(value);
			for (i=0;i<x.length;i++)
			{
				txt=txt + '<tr><td>'+x[i].childNodes[0].nodeValue + '</td><td><input type="text" name="1e" size="5" /></td><td><input type="text" name="1e" size="30" /></td></tr>';
			}
			document.getElementById("1ex").innerHTML='<table border="1"><th>Exercise</th><th>Amount</th><th>Comments</th>'+txt+'</table>';
		}
	}
	xmlhttp.open("GET","exercises1.xml",true);
	xmlhttp.send();

}
function checkChar(str)
{
var xmlhttp;

if (str.length==0)
  { 
  document.getElementById("errorcheck").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("errorcheck").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","checkchar.php?q="+str,true);
xmlhttp.send();
}


function getcookie(cookieName) {
   thisCookie = document.cookie.split("; ");
   for (i=0; i<thisCookie.length; i++ ) {
      if (cookieName == thisCookie[i].split("=") [0] )
             return thisCookie[i].split("=") [1]
      } /* end for i */
      
    return null;  /* i.e., the cookie was not found! */
}   /*end of function cookieVal */

function checkCookie(){
	var theCookie=getCookie("username");
	if(theCookie){
		document.write("cookie");
	}else{
		document.write("no cookie");
		}


}
/*function setcookie(cookiename, value){
	expiredate= new Date;
	expiredate.setMonth(expiredate.getMonth() + 6);
	document.cookie=cookiename+"="+value+";expires= "+expiredate.toGMTString();
}

function loadlb(){
	var xmlhttp;
	var txt,x,i;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			xmlDoc=xmlhttp.responseXML;
			txt="";
			x=xmlDoc.getElementsByTagName("e2");
			for (i=0;i<x.length;i++)
			{
				txt=txt + x[i].childNodes[0].nodeValue + "<br />";
			}
			document.getElementById("1ex").innerHTML=txt;
		}
	}
	xmlhttp.open("GET","exercises.xml",true);
	xmlhttp.send();

}
function loadsa(){
	var xmlhttp;
	var txt,x,i;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			xmlDoc=xmlhttp.responseXML;
			txt="";
			x=xmlDoc.getElementsByTagName("e3");
			for (i=0;i<x.length;i++)
			{
				txt=txt + x[i].childNodes[0].nodeValue + "<br />";
			}
			document.getElementById("1ex").innerHTML=txt;
		}
	}
	xmlhttp.open("GET","exercises.xml",true);
	xmlhttp.send();

}

function loadcst(){
	var xmlhttp;
	var txt,x,i;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			xmlDoc=xmlhttp.responseXML;
			txt="";
			x=xmlDoc.getElementsByTagName("e4");
			for (i=0;i<x.length;i++)
			{
				txt=txt + x[i].childNodes[0].nodeValue + "<br />";
			}
			document.getElementById("1ex").innerHTML=txt;
		}
	}
	xmlhttp.open("GET","exercises.xml",true);
	xmlhttp.send();

}
*/

function getCookie(c_name) {
  var i,x,y,ARRcookies=document.cookie.split(";");
  for (i=0;i<ARRcookies.length;i++) {
    x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
    y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
    x=x.replace(/^\s+|\s+$/g,"");
    if (x==c_name) {
      return unescape(y);
    }
  }
}
      
//Loads user data into tables from xml
function loadUserData(i) {  
  var wo = $("#get_workout").val();
  var we = $("#get_week").val();

  //var url = document.URL;
  //var n = new String(url.match(/day\d/g));
  //var i = new String(n.match(/\d/g));
  var s = document.getElementById('sidebar' + i).innerHTML;
  var x = s.split(": ").pop();
  var routineTitle = x.replace('&amp;','&'); //Needs this fix otherwise comparing strings doesn't return true
  var dayNum = i;
  var i = 1;
  
  $.ajax({
    type: "GET",
    url: "../xml/Users/" + getCookie("workoutStat") + ".xml" + "?cache=" + new Date().getTime(),
    dataType: "xml",
    success: function(xml){
      $(xml).find('program').each(function(){
        $(this).find('workout').each(function(){ //Loops through everything in workout element
          if($(this).attr('name') == $("#get_workout").val()) {  //Checks for workout type (classic, muscle)        
            $(this).find($("#get_week").val()).each(function() { //Finds and loops through week set by user
              $(this).find('routine').each(function() { //Will loop through all 7 routines in the above week
                if($(this).attr('name') == routineTitle) {
                  $(this).children().each(function() { //Loops through all the exercises <e1>, <e2>, etc
                    $(".amount" + i + "day" + dayNum).live().val($(this).find('amt').text());
                    $(".comment" + i + "day" + dayNum).live().val($(this).find('com').text());
                    i++;
                  }); 
                }
              });
            });
          }
        });
      });
    }
  });
}

