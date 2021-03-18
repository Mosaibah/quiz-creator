<?php
$title = 'Create quiz';
require 'template/header.php';
$_SESSION['page'] = '';


if(!isset($_GET['num']) || !$_GET['num']){
  die('Missing number parameter');
}


$num = $_GET['num'];

$errors = [];
$title = null;
for ($i=1; $i <= $num; $i++) {
  // code...
  ${"question$i"} = null;
  ${"a$i"} = null;
  ${"b$i"} = null;
  ${"c$i"} = null;
  ${"d$i"} = null;
  ${"correct$i"} = null;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //*****************stsrt ****first*******************

  $title = mysqli_real_escape_string($mysqli, $_POST['title']);
  if(empty($title)){array_push($errors, 'Title is required');}

  for ($i=1; $i <= $num ; $i++) {
    // code...



  ${"question$i"} = mysqli_real_escape_string($mysqli, $_POST['question'.$i]);
  ${"a$i"} = mysqli_real_escape_string($mysqli, $_POST['a'.$i]);
  ${"b$i"} = mysqli_real_escape_string($mysqli, $_POST['b'.$i]);
  ${"c$i"} = mysqli_real_escape_string($mysqli, $_POST["c$i"]);
  ${"d$i"} = mysqli_real_escape_string($mysqli, $_POST["d$i"]);
  ${"correct$i"} = mysqli_real_escape_string($mysqli, $_POST['correct'.$i]);

  if(empty(${"question$i"})){array_push($errors,'Question is required');}
  if(empty(${"a$i"})){array_push($errors, 'A is required');}
  if(empty(${"b$i"})){array_push($errors, 'B is required');}
  if(empty(${"correct$i"})){array_push($errors, 'Correct answer is required');}


//
$dbQuestion = ${"question$i"};
$dbA = ${"a$i"};
$dbB = ${"b$i"};
$dbC = ${"c$i"};
$dbD = ${"d$i"};
$dbCorrect = ${"correct$i"};
//
  echo "errors";
  print_r($errors);

  echo "values after post:  ";
  echo "///values:  ";
  echo ("question$i");
  echo ' = ';
  echo ${"question$i"} ;

  echo ("///a$i");
  echo ' = ';
  echo ${"a$i"} ;

  echo ("//b$i");
  echo ' = ';
  echo ${"b$i"} ;

  echo ("///c$i");
  echo ' = ';
  echo ${"c$i"} ;

  echo ("///d$i");
  echo ' = ';
  echo ${"d$i"};

  echo ("///correct$i");
  echo ' = ';
  echo ${"correct$i"};

//end for


  // create a new user

  if(!count($errors)){


    // for ($i=1; $i <= $num ; $i++) {
      // code...

      // code...
      echo "///////////we dont havs an error/";
      echo "N U M B E R = ".$i;
      if($i == 1){
        echo "????????inside if ";
        // $mysqli->query("insert into tests (question1, a$i,b$i,c$i,d$i,correct$i) values('11111', 'jj', 'sfd', 'c', 'i', 'correcti')");




        $query = "insert into tests (title, question$i , a$i , b$i , c$i , d$i , correct$i) values ('$title', '$dbQuestion' , '$dbA', '$dbB', '$dbC', '$dbD', '$dbCorrect')";
        $mysqli->query($query);


      }elseif ($i <= $num) {
        // code...
        echo "###### inseide else";
        echo $title;
        $query = "update tests set
        question$i = '$dbQuestion',
         a$i = '$dbA',
         b$i = '$dbB',
         c$i = '$dbC',
         d$i = '$dbD',
         correct$i = '$dbCorrect'
          where title = '$title'";

        $mysqli->query($query);
      }


}
    }

    if($mysqli->error){
      array_push($errors, $mysqli->error);
    }else {
      $mysqli->query("update tests set num = $num where title = '$title' ");
      echo "<script>location.href = 'index.php'</script>";
    }

  }



?>


<!--  -->
<div class="card">

  <div class="content">


  </div>

</div>
<!--  -->
<!-- ***** Contact Us Start ***** -->
<section class="section" id="contact-us">
    <div class="container-fluid">
        <div class="row">
            <!-- ***** Contact Form Start ***** -->
<div class="col-lg-12 col-md-6 col-sm-12 contact_width" >
    <div class="contact-form">
      <h1 class="pb-5">سجل تحدّيك</h1>
      <?php include 'template/errors.php' ?>

        <form id="contact" action="" method="post">
          <div class="row">
            <!-- space -->
              <div class="col-lg-4"></div>
            <!-- end space -->
            <!-- title -->
            <div class="col-md-4 col-sm-12 pb-5" >
              <fieldset>
                <input class="contact-field" type="text" name="title" value='<?php echo $title ?>' class="form-control" placeholder="عنوان الأسئلة">
              </fieldset>
            </div>
            <!-- space -->
              <div class="col-lg-4"></div>
            <!-- end space -->
            <?php for ($i=1; $i <=  $num ; $i++): ?>
            <!-- **********first********** -->

            <!-- space -->
              <div class="col-lg-2"></div>
            <!-- end space -->
            <!-- question1 -->
            <div class="col-lg-8 col-md-6 col-sm-12 pt-5">
              <fieldset>
                <input class="contact-field" type="text" name="<?php echo 'question'.$i ?>" value="<?php echo ${"question$i"} ?>" class="form-control" placeholder="السؤال">
              </fieldset>
            </div>
            <!-- space -->
              <div class="col-lg-2"></div>
            <!-- end space -->
            <!-- space -->
              <div class="col-lg-2"></div>
            <!-- end space -->
            <!-- a -->
            <div class="col-lg-4 col-md-6 col-sm-12">
              <fieldset>
                <input class="contact-field" type="text" name="<?php echo 'a'.$i ?>" value="<?php echo ${"a$i"} ?>" class="form-control" placeholder="أول اختيار">
              </fieldset>
            </div>
            <!-- b -->
            <div class="col-lg-4 col-md-6 col-sm-12">
              <fieldset>
              </fieldset>
                <input class="contact-field" type="text" name="<?php echo 'b'.$i ?>" value="<?php echo ${"b$i"} ?>" class="form-control" placeholder="ثاني اختيار">
            </div>
            <!-- space -->
              <div class="col-lg-2"></div>
            <!-- end space -->
            <!-- space -->
              <div class="col-lg-2"></div>
            <!-- end space -->
            <!-- c -->
            <div class="col-lg-4 col-md-6 col-sm-12">
              <fieldset>
                <input class="contact-field" type="text" name="<?php echo 'c'.$i ?>" value="<?php echo ${"c$i"} ?>" class="form-control" placeholder="ثالث اختيار">
              </fieldset>
            </div>
            <!-- d -->
            <div class="col-lg-4 col-md-6 col-sm-12">
              <fieldset>
                <input class="contact-field" type="text" name="<?php echo 'd'.$i ?>" value="<?php echo ${"d$i"} ?>" class="form-control" placeholder="رابع اختيار">
              </fieldset>
            </div>
            <!-- space -->
              <div class="col-lg-2"></div>
            <!-- end space -->
            <!-- space -->
              <div class="col-lg-4"></div>
            <!-- end space -->
            <!-- correct -->
            <div class="col-md-4 col-sm-12 pb-5">
              <fieldset>
                <input class="contact-field" type="text" name="<?php echo 'correct'.$i ?>" value='<?php echo ${"correct$i"} ?>' class="form-control" placeholder="الجواب">
              </fieldset>
            </div>
            <!-- space -->
              <div class="col-lg-4"></div>
            <!-- end space -->
          <?php endfor;?>

            <!-- supmet -->
            <div class="form-group ">
              <button class="btn btn-success">تحدّيك بينوّر !</button>
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


<!--  -->
<?php
include 'template/footer.php';
?>
