<?php
  $workouts = simplexml_load_file("workouts.xml");
  
  session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Workout</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <?php include("navigation.html"); ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script>
    // <![CDATA[

      //Bit of a hack here with wasted resources. Generates the initial table on page load.
      $(document).ready(function(){
        var wo = $("#get_workout").val();
        var we = $("#get_week").val();
        $.ajax({
          type: "GET",
          url: "getexercises.php",
          data: {workout: wo, week: we},
          success: function(msg){
            $("#exercise_table").html(msg);
          }
        });
      });
      
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
            }
          });
        });
      });
      
      $(document).ready(function(){
        $("#save").live('click',function(){
        
          var wo = $("#get_workout").val();
          var we = $("#get_week").val();
          
          var url = document.URL;
          var n = new String(url.match(/day\d/g));
          var i = new String(n.match(/\d/g));
          var s = document.getElementById('sidebar' + i).innerHTML;
          var x = s.split(": ").pop()
          
          //Creates array full of user's inputted exercise amounts
          var i = 1;
          var userInputData = new Array();
          while(1) {
            if($(".amount" + i).length > 0) {
              userInputData.push($(".amount" + i).val());
            }else{
              break;
            }
            i++;
          }
          
          //Calls save.php to save user data to xml
          $.ajax({
            type: "GET",
            url: "save.php",
            data: {workout: wo, week: we, name: x, userdata: userInputData},
            success: function(data){
              $("#exercise_table").html(data);
            }
          });
        });
      });

      //when u click the sidebar, it hides the other tables, and shows the one for that workout you clicked
      $(document).ready(function(){
      $("button").live('click',function(){
        $("#collapse1").show();
        $("#collapse2,#collapse3,#collapse4,#collapse5,#collapse6,#collapse7").hide();
        $("table input").val(''); //Remove old table values
        
        
          var wo = $("#get_workout").val();
          var we = $("#get_week").val();
          
          var url = document.URL;
          var n = new String(url.match(/day\d/g));
          var i = new String(n.match(/\d/g));
          var s = document.getElementById('sidebar' + i).innerHTML;
          var x = s.split(": ").pop()
          
          //Calls save.php to save user data to xml
          $.ajax({
            type: "GET",
            url: "load.php",
            data: {workout: wo, week: we, name: x},
            success: function(data){
              //$(data).each(function(index) {
              alert(data);
              //$("#exercise_table").html($(this).text());
              //$("#exercise_table").html(data[0]);
              //});
            }
          });
        
        
        
        
      });
      
      $("#sidebar2").live('click',function(){
        $("#collapse2").show();
        $("#collapse1,#collapse3,#collapse4,#collapse5,#collapse6,#collapse7").hide();
        $("table input").val(''); //Remove old table values        
      });
      
      $("#sidebar3").live('click',function(){
        $("#collapse3").show();
        $("#collapse1,#collapse2,#collapse4,#collapse5,#collapse6,#collapse7").hide();
        $("table input").val(''); //Remove old table values
      });
      
      $("#sidebar4").live('click',function(){
        $("#collapse4").show();
        $("#collapse1,#collapse2,#collapse3,#collapse5,#collapse6,#collapse7").hide();
        $("table input").val(''); //Remove old table values      
      }); 
      
      $("#sidebar5").live('click',function(){
        $("#collapse5").show();
        $("#collapse1,#collapse2,#collapse3,#collapse4,#collapse6,#collapse7").hide();
        $("table input").val(''); //Remove old table values       
      });
      
      $("#sidebar6").live('click',function(){
        $("#collapse6").show();
        $("#collapse1,#collapse2,#collapse3,#collapse4,#collapse5,#collapse7").hide();
        $("table input").val(''); //Remove old table values       
      });
      
      $("#sidebar7").live('click',function(){
        $("#collapse7").show();
        $("#collapse1,#collapse2,#collapse3,#collapse4,#collapse5,#collapse6").hide();
        $("table input").val(''); //Remove old table values        
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
            foreach($workouts->program->workout as $workout) {
              echo "<option>".$workout["name"]."</option>";
            }
            echo "</select>";
            
            echo "<select id='get_week' name='get_week'>";
            echo "<option value='week1'>Week 1</option>";
            echo "<option value='week2'>Week 2</option>";
            echo "<option value='week3'>Week 3</option>";
            echo "<option value='week4'>Week 4</option>";
            echo "<option value='week5'>Week 5</option>";
            echo "<option value='week6'>Week 6</option>";
            echo "<option value='week7'>Week 7</option>";
            echo "<option value='week8'>Week 8</option>";
            echo "<option value='week9'>Week 9</option>";
            echo "</select>";          
        ?>
      </form>
      <button>clear</button>
      <h3><a href="home.php">Home</a></h3>
    </div>
    
    <div id="exercise_table"></div>
    
   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="../js/bootstrap.min.js"></script>
  </body>
</html>