<?php
  include("redirecttologin.php");
  $workouts = simplexml_load_file("../xml/workouts.xml");
  
  session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Workout</title>
    <script src="p90xjs.js" language="javascript" type="text/javascript"></script>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <?php include("navigation.php"); ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script>
    // <![CDATA[

      
      //Loads user data into tables from xml
      function changeColor(sidebar) {
        $("#sidebar1").css("color","#0088CC");
        $("#sidebar2").css("color","#0088CC");
        $("#sidebar3").css("color","#0088CC");
        $("#sidebar4").css("color","#0088CC");
        $("#sidebar5").css("color","#0088CC");
        $("#sidebar6").css("color","#0088CC");
        $("#sidebar7").css("color","#0088CC");
        $(sidebar).css("color","#000000");
      }
      
      
/*       //Bit of a hack here with wasted resources. Generates the initial table on page load.
      $(document).ready(function(){
        var wo = $("#get_workout").val();
        var we = $("#get_week").val();
        $.ajax({
          type: "GET",
          url: "getexercises.php",
          data: {workout: wo, week: we},
          success: function(msg){
            $("#exercise_table").html(msg);
            //Set the first sidebar to black(selected look) initially on load
            $("#sidebar1").css("color","#000000");
          }
        });
      }); */
      
      //Updates to new table on workout/week change   
      $(document).ready(function(){
        $("form").change(function(){
          var wo = $("#get_workout").val();
          var we = $("#get_week").val();
          $.ajax({
            type: "GET",
            url: "getexercises.php",
            data: {workout: wo, week: we},
            success: function(data){
              $("#exercise_table").html(data);
              //Sets the first table as default on load
              $("#sidebar1").load(changeColor("#sidebar1"));
              loadUserData(1); 
            }
          });
        });
      });
      
      //Saves user data into their xml file on save button click
      $(document).ready(function(){
        $("#save").live('click',function(){
        
          var wo = $("#get_workout").val();
          var we = $("#get_week").val();
          
          var url = document.URL;
          var n = new String(url.match(/day\d/g));
          var dayNum = new String(n.match(/\d/g));
          var s = document.getElementById('sidebar' + dayNum).innerHTML;
          var x = s.split(": ").pop()
          
          //Creates array full of user's inputted exercise amounts
          var i = 1;
          var userInputAmount = new Array();
          while(1) {
            if($(".amount" + i + "day" + dayNum).length > 0) {
              userInputAmount.push($(".amount" + i + "day" + dayNum).val());
            }else{
              break;
            }
            i++;
          }
          
          var i = 1;
          var userInputComment = new Array();
          while(1) {
            if($(".comment" + i + "day" + dayNum).length > 0) {
              userInputComment.push($(".comment" + i + "day" + dayNum).val());
            }else{
              break;
            }
            i++;
          }          
          
          //Calls save.php to save user data to xml
          $.ajax({
            type: "GET",
            url: "save.php",
            data: {workout: wo, week: we, name: x, useramount: userInputAmount, usercomment: userInputComment},
            success: function(data){
              alert("Data Saved");
            }
          });
        });
      });

      //when u click the sidebar, it hides the other tables, and shows the one for that workout you clicked
      $(document).ready(function(){     
        $("#sidebar1").live('click',function(){
          changeColor("#sidebar1");
          $("#collapse1").show();
          $("#collapse2,#collapse3,#collapse4,#collapse5,#collapse6,#collapse7").hide();
          loadUserData(1); 
        });
        
        $("#sidebar2").live('click',function(){
          changeColor("#sidebar2");
          $("#collapse1,#collapse3,#collapse4,#collapse5,#collapse6,#collapse7").hide();
          $("#collapse2").show();
          loadUserData(2); 
        });
        
        $("#sidebar3").live('click',function(){
          changeColor("#sidebar3");
          $("#collapse3").show();
          $("#collapse1,#collapse2,#collapse4,#collapse5,#collapse6,#collapse7").hide();
          loadUserData(3); 
        });
        
        $("#sidebar4").live('click',function(){
          changeColor("#sidebar4");
          $("#collapse4").show();
          $("#collapse1,#collapse2,#collapse3,#collapse5,#collapse6,#collapse7").hide();
          loadUserData(4);          
        }); 
        
        $("#sidebar5").live('click',function(){
          changeColor("#sidebar5");
          $("#collapse5").show();
          $("#collapse1,#collapse2,#collapse3,#collapse4,#collapse6,#collapse7").hide();
          loadUserData(5);
        });
        
        $("#sidebar6").live('click',function(){
          changeColor("#sidebar6");
          $("#collapse6").show();
          $("#collapse1,#collapse2,#collapse3,#collapse4,#collapse5,#collapse7").hide();
          loadUserData(6);
        });
        
        $("#sidebar7").live('click',function(){
          changeColor("#sidebar7");
          $("#collapse7").show();
          $("#collapse1,#collapse2,#collapse3,#collapse4,#collapse5,#collapse6").hide();
          loadUserData(7);
        });       
      });

    // ]]>
    </script>
  
  </head>
  <body>   
    <div>
      <form class="navbar-form" >
        <?php
            echo "<select id='get_workout' name='get_workout'>";
            echo "<option value='null'>--Select Workout--</option>";
            foreach($workouts->program->workout as $workout) {
              echo "<option>".$workout["name"]."</option>";
            }
            echo "</select>";
            
            echo "<select id='get_week' name='get_week'>";
            echo "<option value='null'>--Select Week--</option>";
            echo "<option href='#day1' value='week1'>Week 1</option>";
            echo "<option value='week2'>Week 2</option>";
            echo "<option value='week3'>Week 3</option>";
            echo "<option value='week4'>Week 4</option>";
            echo "<option value='week5'>Week 5</option>";
            echo "<option value='week6'>Week 6</option>";
            echo "<option value='week7'>Week 7</option>";
            echo "<option value='week8'>Week 8</option>";
            echo "<option value='week9'>Week 9</option>";
            echo "<option value='week10'>Week 10</option>";
            echo "<option value='week11'>Week 11</option>";
            echo "<option value='week12'>Week 12</option>";
            echo "<option value='week13'>Week 13</option>";
            echo "</select>";          
        ?>
      </form>
    </div>
    
    <div id="exercise_table"></div>
    <span><img src="http://placehold.it/350x150"></span>
    
   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="../js/bootstrap.min.js"></script>
  </body>
</html>