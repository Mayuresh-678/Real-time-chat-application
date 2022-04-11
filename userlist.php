<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
      header("Location: ../index.php");
    }
?>
<?php include_once "header.php"; ?>
  <body>
    <div class="wrapper">    
      <section class="users">
        <header>
          
          <?php
            include_once 'php/config.php';
            $sql = ("SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}' ");
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query)>0){
              $row = mysqli_fetch_assoc($query);
            }
          ?>

          <div class="content">
            <img src="php/profile_photo/<?php echo $row['img']; ?>" alt="Profile photo" />
            <div class="details">
              <span><?php echo $row['fname']." ".$row['lname']; ?></span>
              <p><?php echo $row['status']; ?></p>
            </div> 
          </div>
          <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
        </header>
        <div class="search">
          <span>Select an user to start chat</span>
          <input type="text" name= "searchTerm" placeholder="Enter name to search..." />
          <button class="search-icon "><i class="material-icons">search</i></button>
        </div>
        <div class="users-list">
        
        </div>
      </section>
    </div>

    <script src="js\users.js"></script>
  </body>
</html>