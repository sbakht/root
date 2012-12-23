<html>
  <head>
    <title>Financial Balance Sheet</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        $("#getprofit").click(function() {
          
          var numuser = $("#numuser").val();
          var channels = $("#channels").val();
          var suscribpercell = $("#suscribpercell").val();
          
          var numcell = numuser / suscribpercell;
        
          $("#numcell").text(numcell);
          
        });
      });
    
    </script>
  </head>
  
  
  <body>
    <?php
      $channels = 0;
    ?>
    
    
    <b># of Users:</b>
    <span id="numuser">60000000</span><br>
    
    
    <b>Suscribers/cell:</b>    
    <span id="numuser">1000</span><br>
    
    <b>Number of Cells</b>
    <span id="numcell">60000</span><br>
    
    <input type="submit" id="getprofit" />
  
  
  </body>
</html>