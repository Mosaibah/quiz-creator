<?php
$titel = 'Login';
require_once 'template/header.php';
require __DIR__.'/config/app.php';
require_once __DIR__.'/config/database.php';

if(isset($_SESSION['logged_in'])){
    header('location: index.php');
}

$errors = [];
$email = null;
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $email = mysqli_real_escape_string($mysqli, $_POST['email']);
  $password = mysqli_real_escape_string($mysqli, $_POST['password']);

  if(empty($email)){array_push($errors, 'Email is required');}
  if(empty($password)){array_push($errors, 'Password is required');}


  if(!count($errors)){
    $userExists = $mysqli->query("select id, email, password, name, role from users where email='$email' limit 1");

      if(!$userExists->num_rows){
          array_push($errors, "Your email, '$email' dose not exist in our records");
      }else {

          $foundUser = $userExists->fetch_assoc();

          if(password_verify($password, $foundUser['password'])){

            //login
              $_SESSION['logged_in'] = true;
              $_SESSION['user_id'] = $foundUser['id'];
              $_SESSION['user_name'] = $foundUser['name'];
              $_SESSION['user_role'] = $foundUser['role'];
              $_SESSION['success_message'] = "Welcome back, $foundUser[name]";

              if($foundUser['role'] == 'admin'){
                header('location: admin');
                die();
              }else {

                header('location: index.php');
                die();
              }


          }else {

            array_push($errors, 'wrong password');

          }

      }

  }



}

?>

<!-- Register // form -->
<link rel="stylesheet" href="template/register/fonts/material-icon/css/material-design-iconic-font.min.css">

<link rel="stylesheet" href="template/register/css/style.css">
  <div class="main">



      <section class="signup">
          <!-- <img src="images/signup-bg.jpg" alt=""> -->
          <div class="container">
              <div class="signup-content">
                  <form method="POST" id="signup-form" class="signup-form">
                    <?php include 'template/errors.php' ?>

                      <h2 class="form-title">تسجيل الدخول</h2>

                      <div class="form-group">
                          <input type="email" class="form-input" name="email" id="email" placeholder="البريد الالكتروني"/>
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-input" name="password" id="password" placeholder="كلمة المرور"/>
                          <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                      </div>

                      <div class="form-group">
                          <input type="submit" name="submit" id="submit" class="form-submit" value="سجل دخول"/>
                      </div>
                  </form>
                  <p class="loginhere">
                  </p>
              </div>
          </div>
      </section>

  </div>
  <!-- JS -->
 <script src="template/regiser/vendor/jquery/jquery.min.js"></script>
 <script src="template/regiser/js/main.js"></script>




<?php
require_once 'template/footer.php';
?>
