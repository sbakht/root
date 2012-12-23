<?php
  clearstatcache(); 
  //include("redirecttologin.php");
  $workouts = simplexml_load_file("../xml/workouts.xml");
  
  session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <style>
    .dayHeading {
    display:block;
    }
    </style>
    <title>Workout</title>
    <script src="p90xjs.js" language="javascript" type="text/javascript"></script>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <?php include("navigation.php"); ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    
    <script>
    $(document).ready(function() {
      $('#numWeeks').focusout(function() {
      $('#get_week').empty();
      $('#get_week').append('<option>--Select Week--</option>');
        for(var i = 1; i <= $('#numWeeks').val(); i++) {
          $('#get_week').append('<option>' + i + '</option>');
        }
      });
    });
    
    $(document).ready(function() {
      $('#get_week').change(function() {
        $.ajax({
          type: "GET",
          url: "../xml/exercises.xml",
          dataType: "xml",
          success: function(xml) {
            $(xml).find('routine').each(function() {
              
              $('#day1').append('<option>' + $(this).attr('name') + '</option>');
              $('#day2').append('<option>' + $(this).attr('name') + '</option>');
              $('#day3').append('<option>' + $(this).attr('name') + '</option>');
              $('#day4').append('<option>' + $(this).attr('name') + '</option>');
              $('#day5').append('<option>' + $(this).attr('name') + '</option>');
              $('#day6').append('<option>' + $(this).attr('name') + '</option>');
              $('#day7').append('<option>' + $(this).attr('name') + '</option>');
            });
            $('#day').css('display','block');
            // $('#day1').css('display','block');
            // $('#day2').css('display','block');
            // $('#day3').css('display','block');
            // $('#day4').css('display','block');
            // $('#day5').css('display','block');
            // $('#day6').css('display','block');
            // $('#day7').css('display','block');
            // $('.dayHeading').css('display','block');
          }
        });
                  //  echo "<select id='get_workout' name='get_workout'>";
            //echo "<option value='null'>--Select Workout--</option>";
            //foreach($workouts->program->workout as $workout) {
             // echo "<option>".$workout["name"]."</option>";
            //}
            //echo "</select>";
      });
    });
    </script>
  
  </head>
  <body>   
    <b>Title</b>
    <input type="text" />
    <b># of Weeks</b>
    <input type="text" id="numWeeks" maxlength="2" onkeyup="this.value=this.value.replace(/[^\d]+/,'')"/> 
    <b>Week</b>
    <select id='get_week'>
      <option value='null'>--Select Week--</option>
    </select>
    <div id="day" style="display:none;">
      <b class="dayHeading">Day 1</b>
      <select id="day1" >
      </select>
      <b class="dayHeading" >Day 2</b>
      <select id="day2" >
      </select>
      <b class="dayHeading" >Day 3</b>
      <select id="day3" >
      </select>
      <b class="dayHeading" >Day 4</b>
      <select id="day4" >
      </select>
      <b class="dayHeading" >Day 5</b>
      <select id="day5" >
      </select>
      <b class="dayHeading" >Day 6</b>
      <select id="day6" >
      </select>
      <b class="dayHeading">Day 7</b>
      <select id="day7" >
      </select>
      <button>Save</button>
    </div>
    
   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="../js/bootstrap.min.js"></script>
  </body>
</html>