<html>
  <head>
    <style>
      .connected {
        padding:1px;
        
        }
    </style>
    <title>To-Do List</title>
		<link type="text/css" href="css/start/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
		<script type="text/javascript"> 
    
    	$(function() {
        //$( "#bank, #todo" ).sortable({connectWith: ".connected"}).disableSelection();
        $( ".connected" ).sortable({connectWith: ".connected"}).disableSelection();
      });
      
      
  
      $(document).ready(function(){
        $("#bankbutton").click(function() {
          $("#bank").append("<li style='padding: 2px;'><span style='border: 1px solid; background-color:#EEEEEE;'>" + $("#bankinput").val() + "</span></li>");
        });
      });
      
    $(document).ready(function(){
      // $("#todo li").live('dblclick', function() {
      $("li").live('dblclick', function() {
        if($(this).css("text-decoration") == "line-through") {
          $(this).remove();
        }
        $(this).css("text-decoration","line-through");
      });
      
      // $("#bank li").live('dblclick', function() {
        // $(this).remove();
      // });
      
      // $("#bank li").sortable({receive: function() {
        // $(this).remove();
        // }
      // });
    });
    
    $(document).ready(function(){
      $("#save").click(function() {
        // var elems = $("#todotoday li"); // returns a nodeList
        // var arr = jQuery.makeArray(elems);

        // var todayList = [];
        // $("#todotoday li").each(function(){ 
          // todayList.push($(this).text())
        // });
        
        // var tomorrowList = [];
        // $("#todotomorrow li").each(function(){ 
          // tomorrowList.push($(this).text())
        // });
          
        // var list = [todayList,tomorrowList];    
       
        var list = [];
        for(var i = 1; i <= 2; i++) {
          var tododaylist = [];
          $("#" + i + " li").each(function(){ 
            tododaylist.push($(this).text())
          });
          list.push(tododaylist)
        }   
        
        $.ajax({
          type: "GET",
          url: "save.php",
          data: {today: list },
          success: function(xml){
            alert(xml);
          }
        });
      });
    });
    
    
    </script>
  </head>
  
  <body>
  <a href='../p90x/saad/login.php'>Login</a>
  <a href='../p90x/saad/logout.php'>Logout</a><br>
    <?php
      $str = "D, M d y";
      //echo date("D, d M y"); 
      $tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
      $lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
      $nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);
      //echo date("D, d M y", $tomorrow);
    ?>

    <b>Bank</b>
      <ul class="connected" id="bank">
      </ul>
    
    <!--<b>Today - <?php echo date($str) ?> </b>
    <ol class="connected" id="todotoday">
      <li style="padding: 2px"><span style="border: 1px solid; background-color:#EEEEEE;">here</span></li>
    </ol>
    
    <b>Tomorrow - <?php echo date($str, $tomorrow) ?> </b>
    <ol class="connected" id="todotomorrow">
      <li style=""><span style="border: 1px solid; background-color:#EEEEEE;">here</span></li>
    </ol>-->
    
    <b>Today - <?php echo date($str) ?> </b>
    <ol class="connected" id="1">
      <li style="padding: 2px"><span style="border: 1px solid; background-color:#EEEEEE;">here</span></li>
    </ol>
    
    <b>Tomorrow - <?php echo date($str, $tomorrow) ?> </b>
    <ol class="connected" id="2">
      <li style=""><span style="border: 1px solid; background-color:#EEEEEE;">here</span></li>
    </ol>
    
    <input type"text" id="bankinput" />
    <button id="bankbutton">Submit</button>
    <button id="save">Save</button>
  </body>
</html>