<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
      header("Location: ../index.php");
    }
?>
<?php include_once "header.php"; ?>
  <body>
    <div class="wrapper">
      <section class="chat-area">
        <header>

        <?php
            include_once 'php/config.php';
            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
            $sql = "SELECT * FROM users WHERE unique_id = '{$user_id}' " ;
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query)>0){
              $row = mysqli_fetch_assoc($query);
            }
        ?>

            <a href="userlist.php"><i class="material-icons back-btn">arrow_back</i></a>
            <img src="php/profile_photo/<?php echo $row['img']; ?>" alt="" />
            <div class="details">
              <span><?php echo $row['fname']." ".$row['lname']; ?></span>
              <p><?php echo $row['status']; ?></p>
            </div> 
        </header>
        <div class="chat-box">
            
        </div>
        <form action="#" class="typing-area">
            <input type="text" name = "outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
            <input type="text" name = "incoming_id" value="<?php echo $user_id; ?>" hidden>
            <input type="text" class="input-field" name = "message" placeholder="Type a message here...">
            <button><i class="material-icons send">send</i></button>
        </form>
      </section>
    </div>

    <script src="js/message.js"></script>

  </body>
</html>
