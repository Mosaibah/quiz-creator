<?php
$_SESSION['page'] = true;

include 'template/header.php';

 ?>
    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1>هل انت قد  <strong>التحدي؟</strong></h1>
                        <p>العب وانشئ أسئلة تتحدى فيها غيرك</p>
                        <a href="#about" class="main-button-slider">تعرّف أكثر</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="assets/images/slider-icon.png" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic">
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="assets/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading">
                        <h5>كيف ؟</h5>
                    </div>
                    <div class="left-text">
                        <p>بكل بساطة تقدر من موقعنا تلعب وتختبر نفسك، بشكل بسيط وممتع</p>
                        <a href="#services" class="main-button">تحديات المستخدمين  </a>
                        <?php if(!isset($_SESSION['logged_in'])){ ?>
                        <a href="register.php" class="main-button mr-3 ">سجل حساب وانشئ تحدّيك الخاص</a>
                      <?php }else {?>
                        <a href="before_create.php" class="main-button mr-3 ">انشئ تحدّيك الآن </a>
                    <?php  } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Features Small Start ***** -->
    <section class="section" id="services">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme">
                  <!-- 1 -->
                   <?php
                   $tests = $mysqli->query('select * from tests')->fetch_all(MYSQLI_ASSOC);
                   // print_r($tests);
                   foreach($tests as $test):
                   ?>
                  <!--  -->
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="assets/images/service-icon-01.png" alt=""></i>
                        </div>
                        <h5 class="service-title"><?php echo $test['title'] ?></h5>
                        <p><?php echo 'description' ?></p>
                        <a href="/../../My_app/quiz/index.php?id=<?php echo $test['id']?>&num=<?php echo $test['num']?>" class="main-button">جرب الحين! </a>
                    </div>
                  <?php endforeach; ?>
                    <!--  -->
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Small End ***** -->

<?php

    $errors = [];
    $name = null;
    $email = null;
    $message = null;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $email = mysqli_real_escape_string($mysqli, $_POST['email']);
      $name = mysqli_real_escape_string($mysqli, $_POST['name']);
      $message = mysqli_real_escape_string($mysqli, $_POST['message']);

      if(empty($email)){array_push($errors, 'Email is required');}
      if(empty($name)){array_push($errors, 'Name is required');}
      if(empty($message)){array_push($errors, 'message is required');}


      // create a new user

      if(!count($errors)){


        $query = "insert into messages (email , name , message) values ('$email' , '$name' , '$message')";
        $mysqli->query($query);


        if($mysqli->error){
          array_push($errors, $mysqli->error);
        }else {
          echo "<script>location.href = 'index.php'</script>";
        }

      }

    }

    ?>
    <!-- ***** Contact Us Start ***** -->
    <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <!-- ***** Contact Form Start ***** -->
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="contact-form">
                        <form id="contact" action="" method="post">
                          <div class="row">
                             <?php include __DIR__.'/template/errors.php' ?>

                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="الاسم" required="" class="contact-field">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="text" id="email" placeholder="البريد الالكتروني" required="" class="contact-field">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="الرسالة" required="" class="contact-field"></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">ارسال</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->

    <?php
    require_once 'template/footer.php';
     ?>
