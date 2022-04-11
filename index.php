<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: userlist.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
  <section class="form Login" style="display: none;">
      <header>Realtime Chat App</header>
      <form action="" autocomplete = "off">
        <div class="error-text">This is an error message</div>
        <div class="field input">
          <label for="email">Email Address</label>
          <input
            type="text"
            name="email"
            placeholder="Enter your email address"
          />  
        </div>
        <div class="field input">
          <label for="password">Password</label>
          <input
            type="password"
            name="password"
            placeholder="Enter your new password"
          />
        </div>
        <div class="field button">
          <input id="logbtn" type="submit" value="Login" />
        </div>
      </form>
      <div class="link">Don't have an account ? <a href="#"> Sign Up</a></div>
    </section>

    <section class="form Signin" >
      <header>Realtime Chat App</header>
      <form action="#" enctype="multipart/form-data" autocomplete = "off">
        <div class="error-text">This is an error message</div>
        <div class="personal-details">
          <div class="field input">
            <label for="f-name">First Name</label>
            <input type="text" name="fname" placeholder="First Name" id="f-name" />
          </div>
          <div class="field input">
            <label for="l-name">Last Name</label>
            <input type="text" name="lname" placeholder="Last Name" id="l-name" />
          </div>
        </div>
        <div class="field input">
          <label for="email">Email Address</label>
          <input
            type="text"
            name="email"
            placeholder="Enter your email address"
          />
        </div>
        <div class="field input">
          <label for="password">Password</label>
          <input
            type="password"
            name="password"
            placeholder="Enter your new password"
          />
          <!-- <i class="material-icons visibility">visibility </i> -->
        </div>
        <div class="field image">
          <label for="Profile-photo">Profile photo</label>
          <input type="file" name="image" id="Profile-photo" />
        </div>
        <div class="field button">
          <input type="submit" value="Sign In" />
        </div>
      </form>
      <div class="link">Already signed up ?<a href="#"> Login Now </a></div>
    </section>
  </div>

    <script src="js/script.js"></script>
    <script src="js/signup.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>