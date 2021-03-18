<?php
$_SESSION['page'] = '';

include 'template/header.php';

?>
<style media="screen">
.before_create_heading {
    font-weight: 400;
    font-size: 70px;
    line-height: 80px;
    letter-spacing: 1.4px;
    margin-bottom: 30px;
    color: #fff;
    text-align: center;
}
</style>
<section class="section" id="services">
  <br><br><br><br><br><br><br>
  <div>
    <h1 class="before_create_heading pb-5" >حدد عدد أسئلة التحدّي</h1>


</div>
    <!-- ///////////////////// -->

<?php $num = null;

     if($_SERVER['REQUEST_METHOD'] == "POST"){
       $num = $_POST['num'];
     echo "<script> location.replace('create.php?num=$num') </script>" ;

     }?>

<!-- ///////////////////// -->
    <div class="container-fluid">
        <div class="row">
            <!-- ***** Contact Form Start ***** -->
<div class="col-lg-12 col-md-6 col-sm-12 contact_width" >
    <div class="contact-form">
        <form id="contact" action="" method="post">
          <div class="row">
            <!-- space -->
              <div class="col-lg-4"></div>
            <!-- end space -->
            <!-- title -->
            <div class="col-md-4 col-sm-12 pb-5" >
              <fieldset>
                <input class="contact-field" type="number" name="num" value='' class="form-control" placeholder="عدد الأسئلة">
              </fieldset>
            </div>


            <!-- supmet -->
            <div class="form-group ">
              <button class="btn btn-success">الخطوة التالية !</button>
            </div>

          </div>
        </form>
    </div>
</div>
<!-- ***** Contact Form End ***** -->
</div>
</div>
<!-- ***** Contact Us End ***** -->
</section>






<?php
include 'template/footer.php';
?>
