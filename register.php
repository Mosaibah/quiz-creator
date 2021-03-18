<?php
$titel = 'Register';
require_once 'template/header.php';
require __DIR__.'/config/app.php';
require_once __DIR__.'/config/database.php';

if(isset($_SESSION['logged_in'])){
    header('location: index.php');
}

$errors = [];
$name = null;
$email = null;
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $email = mysqli_real_escape_string($mysqli, $_POST['email']);
  $name = mysqli_real_escape_string($mysqli, $_POST['name']);
  $password = mysqli_real_escape_string($mysqli, $_POST['password']);
  $password_confirmation = mysqli_real_escape_string($mysqli, $_POST['password_confirmation']);

  if(empty($email)){array_push($errors, 'Email is required');}
  if(empty($name)){array_push($errors, 'Name is required');}
  if(empty($password)){array_push($errors, 'Password is required');}
  if(empty($password_confirmation)){array_push($errors, 'password confirmation is required'); }
  if($password != $password_confirmation){
    array_push($errors, 'passwords don`t match');
  };

  if(!count($errors)){
      $userExists = $mysqli->query("select id, email from users where email='$email' limit 1");

      if($userExists->num_rows){
          array_push($errors, 'Email already registered');
      }

  }

  // create a new user

  if(!count($errors)){

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "insert into users (email , name , password) values ('$email' , '$name' , '$password')";
    $mysqli->query($query);

    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $mysqli->insert_id;
    $_SESSION['user_name'] = $name;
    $_SESSION['success_message'] = "Welcome back, $name";

    header('location: index.php');
    die();
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
                      <h2 class="form-title">انشاء حساب جديد</h2>
                      <div class="form-group">
                          <input type="text" class="form-input" name="name" id="name" placeholder="الاسم"/>
                      </div>
                      <div class="form-group">
                          <input type="email" class="form-input" name="email" id="email" placeholder="البردي الالكتروني"/>
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-input" name="password" id="password" placeholder="كلمة المرور"/>
                          <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                      </div>
                      <div class="form-group">
                          <input type="password" class="form-input" name="password_confirmation" id="re_password" placeholder="تأكيد كلمة المرور"/>
                      </div>
                      <div class="form-group">
                          <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                      </div>
                  </form>
                  <p class="loginhere">
                  </p>
              </div>
          </div>
      </section>

  </div>
  <style media="screen">
    footer{
      position: fixed;
       bottom: 0px;
       left: 0px;
       right: 0px;
       margin-bottom: 0px;
    }
  </style>
  <!-- JS -->
 <script src="template/regiser/vendor/jquery/jquery.min.js"></script>
 <script src="template/regiser/js/main.js"></script>





<?php
require_once 'template/footer.php';
?>
