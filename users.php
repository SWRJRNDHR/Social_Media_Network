<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <?php
          include_once "php/config.php";
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
          if(mysqli_num_rows>0){
            $row = mysqli_fetch_assoc($sql);
          }

          ?>
      <div class="users-list">
        
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
