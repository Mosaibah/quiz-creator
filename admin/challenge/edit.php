<!-- Additional CSS Files -->
<link rel="stylesheet" type="text/css" href="http://localhost/My_app/home/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://localhost/My_app/home/assets/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="http://localhost/My_app/home/assets/css/templatemo-art-factory.css">
<link rel="stylesheet" type="text/css" href="http://localhost/My_app/home/assets/css/owl-carousel.css">
<?php include __DIR__.'/../template/header.php';


$st = $mysqli->prepare('select * from tests where id = ? limit 1');
$st->bind_param('i' , $id);
$id = $_GET['id'];
$st->execute();

$test = $st->get_result()->fetch_assoc();

if(!isset($_GET['num']) || !$_GET['num']){
  die('Missing number parameter');
}
if(!isset($_GET['id']) || !$_GET['id']){
  die('Missing id parameter');
}

$num = $_GET['num'];
$id = $_GET['id'];

$errors = [];
$title = null;
for ($i=1; $i <= $num; $i++) {
  // code...
  ${"question$i"} = $test["question$i"];
  ${"a$i"} = $test["a$i"];
  ${"b$i"} = $test["b$i"];
  ${"c$i"} = $test["c$i"];
  ${"d$i"} = $test["d$i"];
  ${"correct$i"} = $test["correct$i"];
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


  if(!count($errors)){


      if($i == 1){


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

<!-- Table -->
<!-- ============================================================== -->



<div class="row">
    <!-- column -->
    <div class="col-2">

    </div>
    <div class="col-10">
        <div class="card">
            <div class="card-body">

<!--  -->
<!-- **************//**************///*******************///*******************//******************* -->
<style>
label {
color: #48637b;
font-size: 20px"
}
</style>

<section class="section" id="contact-us">
    <div class="container-fluid">
        <div class="row">
            <!-- ***** Contact Form Start ***** -->
<div class="col-lg-12 col-md-6 col-sm-12 contact_width" >
    <div class="contact-form">
      <h1 class="pb-5">تحديث التحدي</h1>
      <?php include __DIR__.'/../template/errors.php' ?>

        <form id="contact" action="" method="post">
          <div class="row">
            <!-- space -->
              <div class="col-lg-4"></div>
            <!-- end space -->
            <!-- title -->
            <div class="col-md-4 col-sm-12 pb-5" >
              <fieldset>
                <label >عنوان الأسئلة</label>
                <input class="contact-field" type="text" name="title" value='<?php echo $test['title'] ?>' class="form-control" placeholder="عنوان الأسئلة">
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
                <label>السؤال</label>
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
                <label>الخيار الأول</label>
                <input class="contact-field" type="text" name="<?php echo 'a'.$i ?>" value="<?php echo ${"a$i"} ?>" class="form-control" placeholder="أول اختيار">
              </fieldset>
            </div>
            <!-- b -->
            <div class="col-lg-4 col-md-6 col-sm-12">
              <fieldset>
              </fieldset>
              <label>الخيار الثاني</label>
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
                <label>الخيار الثالث</label>
                <input class="contact-field" type="text" name="<?php echo 'c'.$i ?>" value="<?php echo ${"c$i"} ?>" class="form-control" placeholder="ثالث اختيار">
              </fieldset>
            </div>
            <!-- d -->
            <div class="col-lg-4 col-md-6 col-sm-12">
              <fieldset>
                <label>الخيار الرابع</label>
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
                <label>الإجابة الصحيحة</label>
                <input class="contact-field" type="text" name="<?php echo 'correct'.$i ?>" value='<?php echo ${"correct$i"} ?>' class="form-control" placeholder="الجواب">
              </fieldset>
            </div>
            <!-- space -->
              <div class="col-lg-4"></div>
            <!-- end space -->
          <?php endfor;?>

            <!-- supmet -->
            <div class="form-group ">
              <button class="btn btn-success">  التحدّي بينوّر مرة ثانية !</button>
            </div>

          </div>
        </form>
    </div>
</div>
<!-- ***** Contact Form End ***** -->
</div>
</div>
</section>


<!--*********************//***************//*******************************//***************  -->

    </div>
</div>

<!-- ============================================================== -->
<!-- Table -->
<!-- ============================================================== -->


<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $mysqli->query('delete from users where id='.$_POST['id']);
  echo "<script>location.replace('index.php')</script>";
}

 include __DIR__.'/../template/footer.php' ?>
