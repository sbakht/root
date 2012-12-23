<?php
  $workouts = simplexml_load_file("workouts.xml");
  $exercises = simplexml_load_file("exercises.xml");
  
  session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Workout</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
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

      //when u click the sidebar, it hides the other tables, and shows the one for that workout you clicked
      $(document).ready(function(){
      $("#sidebar1").live('click',function(){
        $("#collapse1").show();
        $("#collapse2,#collapse3,#collapse4,#collapse5,#collapse6,#collapse7").hide();

          
        $.ajax({
          type: "GET",
          url: "data.xml",
          dataType: "xml",
          success: function(xml){
            $(xml).find('workout').each(function(){
              var routine = $(this).attr('name');
              if( $("#get_workout").val() == routine) {
                var numExercises = $(this).find($("#get_week").val()).find('day1').children.size();
                alert("dfdf");
                for(var i = 1; i <= numExercises; i++) {
                  $(".amount" + i).val($(this).find($("#get_week").val()).find('day1').find('e' + i).text());
                }
              }
            });
          }
        });
      });
      
      $("#sidebar2").live('click',function(){
        $("#collapse2").show();
        $("#collapse1,#collapse3,#collapse4,#collapse5,#collapse6,#collapse7").hide();
      });
      $("#sidebar3").live('click',function(){
        $("#collapse3").show();
        $("#collapse1,#collapse2,#collapse4,#collapse5,#collapse6,#collapse7").hide();
      });
      $("#sidebar4").live('click',function(){
        $("#collapse4").show();
        $("#collapse1,#collapse2,#collapse3,#collapse5,#collapse6,#collapse7").hide();
      }); 
      $("#sidebar5").live('click',function(){
        $("#collapse5").show();
        $("#collapse1,#collapse2,#collapse3,#collapse4,#collapse6,#collapse7").hide();
      });
      $("#sidebar6").live('click',function(){
        $("#collapse6").show();
        $("#collapse1,#collapse2,#collapse3,#collapse4,#collapse5,#collapse7").hide();
      });
      $("#sidebar7").live('click',function(){
        $("#collapse7").show();
        $("#collapse1,#collapse2,#collapse3,#collapse4,#collapse5,#collapse6").hide();
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
            foreach($workouts->workout as $workout) {
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
      <button'>clear</button>
      <span>derp</span>
      <h3><a href="home.php">Home</a></h3>
    </div>
    
    <div id="exercise_table"></div>
    
   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="../js/bootstrap.min.js"></script>
  </body>
</html>