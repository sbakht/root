<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
 
    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
 
    <!-- Be sure to leave the brand out there if you want it shown -->
    <a class="brand" href="home.php">Workout Island</a>
     
    <!-- Everything you want hidden at 940px or less, place within here -->
    <div class="nav-collapse">
      <!-- .nav, .navbar-search, .navbar-form, etc -->
      <ul class="nav">
  <?php if(isset($_COOKIE["workoutStat"])) {
           echo "<li><a href='workout.php#day1'>Workouts</a></li>";
           echo "<li><a href='../../todo/todo.php'>Todo List</a></li>";
           echo "<li><a href='logout.php'>Logout</a></li>";
        }else{
          echo "<li><a href='login.php'>Login</a></li>";
          echo "<li><a href='register.php'>Register</a></li>";
        } ?>
        
        
    </div>
    </div>
  </div>
</div>