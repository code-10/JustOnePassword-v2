<?php include_once 'chocolates.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>JustOnePassword</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <!--font awesome-->  
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--bootstrap js-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
   </head>
   <body>
      <!--Navigation Bar-->
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
         <a href="#" class="navbar-brand">JustOnePassword</a>
         <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse"> <span class="navbar-toggler-icon"></span> </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
               <!--<a href="#" class="nav-item nav-link active">Home</a>-->
            </div>
            <div class="navbar-nav ml-auto">
               <?php if(isset($_SESSION['user_name'])) {
                  echo '<a href="#" class="nav-item nav-link active"><i class="fa fa-user-o">  '.$_SESSION['user_name'].'</i></a>';
                  echo '<a href="logout.php" class="nav-item nav-link">Logout</a>';
                  }?> 
            </div>
         </div>
      </nav>
      <!--heading-->
      <div class="p-2 mb-2" style="background-color:black;">
         <div class="text-center">
            <h2 style="color:white;">Just One Password</h2>
            <p class="m-2" style="color:white;">You only ever have to remember one simple password.</p>
         </div>
      </div>
      <?php $which=$_GET['which']; ?>	
      <div class="container">
         <div class="text-center">
            <? if($which=="user_exists")
               echo "<h4 class='animate__animated animate__fadeOut' style='--animate-duration: 4s;'>User with this user name already exists, if it's your account, login</h4>";
               else if($which=="email_exists")
               echo "<h4 class='animate__animated animate__fadeOut' style='--animate-duration: 4s;'>email already exists, try entering some other email</h4>";
                     else if($which=="login_now")
               echo "<h4 class='animate__animated animate__fadeOut' style='--animate-duration: 4s;'>Login to access passwords</h4>"; 
               else if($which=="register_error")
               echo "<h4 class='animate__animated animate__fadeOut' style='--animate-duration: 4s;'>error while registering :< </h4>"; 
               else if($which=="wrong_password")
               echo "<h4 class='animate__animated animate__fadeOut' style='--animate-duration: 4s;'>wrong password :< </h4>"; 
               else if($which=="user_doesnt_exist")
               echo "<h4 class='animate__animated animate__fadeOut' style='--animate-duration: 4s;'>Register to start using the service</h4>"; 
               ?>
         </div>
      </div>
      <?php if(isset($_SESSION['user_name'])) { ?>
      <div class="text-center m-4">
         <a href="justonepassword.php"><button type="button" class="btn btn-dark">Check my passwords</button></a>
      </div>
      <?php } else { ?>
      <div class="container">
         <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-md-3">
               <div class="panel panel-login">
                  <div class="panel-heading">
                     <div class="row d-flex justify-content-center">
                        <div class="col-xs-6 col-lg-5 col-md-5 col-sm-5 col-5 m-2 text-center">
                           <a href="#" class="active" id="login-form-link" style="color:blue;font-size:32px;">Login</a>
                           <p style="font-size:12px;color:green;">I have already generated passwords</p>
                        </div>
                        <div class="col-xs-6 col-lg-5 col-md-5 col-sm-5 col-5 m-2 text-center">
                           <a href="#" id="register-form-link" style="color:black;font-size:32px;">Register</a>
                           <p style="font-size:12px;color:green;">I'm a new user and want to see magic</p>
                        </div>
                     </div>
                     <hr>
                  </div>
                  <div class="panel-body">
                     <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                           <form  id="login-form" method="POST" action="process.php" style="display: block;">
                              <div class="form-group">
                                 <label for="inputEmail">Username</label>
                                 <input type="text" class="form-control" id="inputuser_name" placeholder="username" name="user_name" required>
                              </div>
                              <div class="form-group">
                                 <label for="inputPassword">Password</label>
                                 <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
                              </div>
                              <button type="submit" name="login_user" class="btn btn-dark">Sign in</button>
                           </form>
                           <form method="POST" action="process.php" id="register-form" style="display: none;">
                              <div class="row">
                                 <div class="col">
                                    <div class="form-group">
                                       <label for="inputuser">First Name</label>
                                       <input type="text" class="form-control" id="inputfirst_name" placeholder="first name" name="first_name" required>
                                    </div>
                                 </div>
                                 <div class="col">
                                    <div class="form-group">
                                       <label for="inputuser">Last Name</label>
                                       <input type="text" class="form-control" id="inputlast_name" placeholder="last name" name="last_name" required>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputuser">Username</label>
                                 <input type="text" class="form-control" id="inputuser_name" placeholder="username" name="user_name" required>
                                 <small id="emailHelp" class="form-text text-muted">username should not contain spaces</small>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail">Email</label>
                                 <input type="email" class="form-control" id="inputEmail" placeholder="email" name="email" required>
                              </div>
                              <div class="form-group">
                                 <label for="inputPassword">Password</label>
                                 <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
                                 <small id="emailHelp" class="form-text text-muted">just enter a simple password</small>
                              </div>
                              <button type="submit" name="register_user" class="btn btn-dark">Register</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php } ?>
      <script>
         $(function() {
            $('#login-form-link').click(function(e) {
            $("#login-form-link").css("color", "blue");
            $("#register-form-link").css("color", "black");
         	$("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
         	$('#register-form-link').removeClass('active');
         	$(this).addClass('active');
         	e.preventDefault();
         });
         	
            $('#register-form-link').click(function(e) {
            $("#register-form-link").css("color", "blue");
            $("#login-form-link").css("color", "black");
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
         });
         
         });
           
            
      </script>
      <br><br><br><br>
   </body>
</html>
