<?php include('layouts/header.php'); ?>


<?php


include('server/connection.php');

if(isset($_POST['register'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];


  //If password dont match
  if($password !== $confirmPassword){
    header('location: register.php?error=Passwords dont match');

    //If password is less than 6 char 
  }else if(strlen($password) < 6){
    header('location: register.php?error=Password must be at least 6 charachters');
  

    //if there is no error 
  }else{ 
    
        //Check whether there is a user with this email or not
        $stmt1 = $conn->prepare("SELECT count(*) FROM users where user_email=?");
        $stmt1->bind_param('s',$email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();

        //if there is a user already registerd with this email 
        if($num_rows != 0){
          header('location: register.php?error=user with this email already exists');

          //If no registerd with this email before 
        }else{ 

                  //Create a new user 
                  $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
                                  VALUES (?,?,?)");
                            
                  $stmt->bind_param('sss',$name,$email,md5($password));

                  //If account was created successfully
                 if($stmt->execute()){
                  $user_id = $stmt->insert_id;
                  $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['logged_in'] = true;
                    header('location: accout.php?register_success=You registered successfully');

                //account could not be created.
                 }else{
                    header('location: register.php?error=could not create an account at the moment.');
                 }
              }

        }
    
    //If user has already registered, then take user to account page.
      }else if(isset($_SESSION['logged_in'])){
        header('location: accout.php ');
        exit; 
      }




// else{
//     header('location: register.php?error=please fill in the form');
// }






?>



<!-- Register -->

  <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Register</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="register-form" method="POST" action="register.php">
          <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" id="register-name" placeholder="Enter Name " required>
           </div>
            <div class="form-group">
                 <label>Email</label>
                 <input type="email" class="form-control" name="email" id="register-email" placeholder="Enter Email " required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="register-password" placeholder="Enter Password " required>
           </div>
           <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="confirmPassword" id="register-confirm-password" placeholder="Enter Confirm Password " required>
       </div>
           <div class="form-group">
            <input type="submit" name="register" class="btn" id="register-btn" value="Register">
       </div>
       <div class="form-group">
        <a id="login-url" href="login.php" class="btn">Do you have an account?Login </a>
   </div>
        </form>
    </div>
  </section>



  <?php include('layouts/footer.php'); ?>