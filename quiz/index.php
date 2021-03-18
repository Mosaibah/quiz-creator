<!-- Created By CodingNepal - www.codingnepalweb.com  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awesome Quiz App | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <!-- FontAweome CDN Link for Icons-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

  <?php
require_once __DIR__.'/../config/app.php';
require_once __DIR__.'/../config/database.php';

if(!isset($_GET['id']) || !$_GET['id']){
  die('Missing id parameter');
}
if (!isset($_GET['num']) || !$_GET['num']) {
  // code...
  die('Missing number parameter');

}

$num = $_GET['num'];


$st = $mysqli->prepare('select * from tests where id = ? limit 1');
$st->bind_param('i' , $testId);
$testId = $_GET['id'];
$st->execute();

$test = $st->get_result()->fetch_assoc();



$title = $test['title'];
// 1

for ($i=1; $i <= $num ; $i++) {
  // code...


  ${"question$i"} = $test['question'.$i];
  ${"a$i"} = $test['a'.$i];
  ${"b$i"} = $test['b'.$i];
  ${"c$i"} = $test['c'.$i];
  ${"d$i"} = $test['d'.$i];
  ${"correct$i"} = $test['correct'.$i];
}



?>
<style media="screen">

a:link, a:visited {
  background-color: #fff;
  color: #007bff;
  padding: 8px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 0 5px;
  height: 40px;
  width: 150px;
  font-size: 16px;
  font-weight: 500;
  cursor: pointer;
  border: none;
  outline: none;
  border-radius: 5px;
  border: 1px solid #007bff;
  transition: all 0.3s ease;
}

.restart{
  margin: 0 5px;
  height: 40px;
  width: 150px;
  font-size: 16px;
  font-weight: 500;
  cursor: pointer;
  border: none;
  outline: none;
  border-radius: 5px;
  border: 1px solid #007bff;
  transition: all 0.3s ease;
}

a:hover, a:active {
  background-color: #007bff;
  color: #fff;
}
</style>
ئ

    <!-- start Quiz button -->
    <div class="start_btn"><button>Start Quiz</button></div>

    <!-- Info Box -->
    <div class="info_box">
        <div class="info-title"><span>Some Rules of this Quiz</span></div>
        <div class="info-list">
            <div class="info">1. You will have only <span>15 seconds</span> per each question.</div>
            <div class="info">2. Once you select your answer, it can't be undone.</div>
            <div class="info">3. You can't select any option once time goes off.</div>
            <div class="info">4. You can't exit from the Quiz while you're playing.</div>
            <div class="info">5. You'll get points on the basis of your correct answers.</div>
        </div>
        <div class="buttons">
          <a href="http://localhost/My_app/home/">الصفحة الرئيسية</a>
            <input class="quit" type="hidden">
            <button class="restart ">Continue</button>
        </div>
    </div>

    <!-- Quiz Box -->
    <div class="quiz_box">
        <header>
            <div class="title">Awesome Quiz Application</div>
            <div class="timer">
                <div class="time_left_txt">Time Left</div>
                <div class="timer_sec">15</div>
            </div>
            <div class="time_line"></div>
        </header>
        <section>
            <div class="que_text">
                <!-- Here I've inserted question from JavaScript -->
            </div>
            <div class="option_list">
                <!-- Here I've inserted options from JavaScript -->
            </div>
        </section>

        <!-- footer of Quiz Box -->
        <footer>
            <div class="total_que">
                <!-- Here I've inserted Question Count Number from JavaScript -->
            </div>
            <button class="next_btn">Next Que</button>
        </footer>
    </div>

    <!-- Result Box -->
    <div class="result_box">
        <div class="icon">
            <i class="fas fa-crown"></i>
        </div>
        <div class="complete_text">You've completed the Quiz!</div>
        <div class="score_text">
            <!-- Here I've inserted Score Result from JavaScript -->
        </div>
        <div class="buttons">
            <button class="restart">Replay Quiz</button>
            <input type="hidden" class="quit">
            <a href="http://localhost/My_app/home/">الصفجة الرئيسية</a>

        </div>
    </div>

    <!-- Inside this JavaScript file I've inserted Questions and Options only -->
    <?php include "js/questions.php"?>

    <!-- Inside this JavaScript file I've coded all Quiz Codes -->
    <script src="js/script.js"></script>

</body>
</html>
