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

        // an XMLHttpRequest
        var xhr = null;

        /*
         * void
         * quote()
         *
         * Gets a quote.
         */
        function loadXMLDoc()
        {
            // instantiate XMLHttpRequest object
            try
            {
                xhr = new XMLHttpRequest();
            }
            catch (e)
            {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }

            // handle old browsers
            if (xhr == null)
            {
                alert("Ajax not supported by your browser!");
                return;
            }

            // construct URL
            var url = "getexercises.php?workout=" + document.getElementById("get_workout").value + "&week=" + document.getElementById("get_week").value;
            
            // get quote
            xhr.onreadystatechange = handler;
            xhr.open("GET", url, true);
            xhr.send(null);
        }


        /*
         * void
         * handler()
         *
         * Handles the Ajax response.
         */
        function handler()
        {
            // only handle loaded requests
            if (xhr.readyState == 4)
            {
                if (xhr.status == 200)
                    document.getElementById("exercise_table").innerHTML = xhr.responseText;
                else
                    alert("Error with Ajax call!");
            }
        }
        
      $(document).ready(function(){
      $("button").click(function(){
        $("#collapse1").toggle();
      });
    });

    // ]]>
    </script>



    
  </head>
  <body>   
    <div>
      <form class="navbar-form" onsubmit="loadXMLDoc(); return false;">
        <?php
            echo "<select id='get_workout' name='get_workout'>";
            foreach($workouts->workout as $workout) {
              echo "<option>".$workout["name"]."</option>";
            }
            echo "</select>";
            
            echo "<select id='get_week' name='get_week'>";
            echo "<option>Week 1</option>";
            echo "<option>Week 2</option>";
            echo "<option>Week 3</option>";
            echo "<option>Week 4</option>";
            echo "<option>Week 5</option>";
            echo "<option>Week 6</option>";
            echo "<option>Week 7</option>";
            echo "<option>Week 8</option>";
            echo "<option>Week 9</option>";
            echo "</select>";          
        ?>
        <input type="submit" value="Submit" />
      </form>
      <button>clear</button>
      <h3><a href="home.php">Home</a></h3>
    </div>
    
    <div id="exercise_table"></div>
    
   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="../js/bootstrap.min.js"></script>
  </body>
</html>