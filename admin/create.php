<?php include 'template/header.php';





$errors = [];
$name = null;
$email = null;
$role = null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $email = mysqli_real_escape_string($mysqli, $_POST['email']);
  $name = mysqli_real_escape_string($mysqli, $_POST['name']);
  $password = mysqli_real_escape_string($mysqli, $_POST['password']);
  $role = mysqli_real_escape_string($mysqli, $_POST['role']);

  if(empty($email)){array_push($errors, 'Email is required');}
  if(empty($name)){array_push($errors, 'Name is required');}
  if(empty($password)){array_push($errors, 'Password is required');}
  if(empty($role)){array_push($errors, 'Role is required');}


  // create a new user

  if(!count($errors)){

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "insert into users (email , name , password, role) values ('$email' , '$name' , '$password', '$role')";
    $mysqli->query($query);


    if($mysqli->error){
      array_push($errors, $mysqli->error);
    }else {
      echo "<script>location.href = 'index.php'</script>";
    }

  }

}


?>




<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->

    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
      <div class="col-lg-4">

      </div>

        <!-- Column -->
        <div class="col-lg-6 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                  <?php include __DIR__.'/../template/errors.php' ?>

                    <form class="form-horizontal form-material" action="" method="post">
                        <div class="form-group">
                            <label class="col-md-12">الاسم</label>
                            <div class="col-md-12">
                                <input type="text" name="name" placeholder="اسمك" value="<?php echo $name ?>" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">البريد الاكتروني</label>
                            <div class="col-md-12">
                                <input type="email" name="email" placeholder="البريد الالكتروني" value="<?php echo $email ?>"
                                    class="form-control form-control-line" name="example-email"
                                    id="example-email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">كلمة المرور</label>
                            <div class="col-md-12">
                                <input type="password" name="password" placeholder="password" value=""
                                    class="form-control form-control-line">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="role">الصلاحية : </label>
                            <select class="form-control" name="role" id="role">
                              <option value="user"<?php if($role == 'user') echo "selected" ?>>User</option>
                              <option value="admin" <?php if($role == 'admin') echo "selected" ?>>Admin</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">انشاء المستخدم</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<?php include 'template/footer.php' ?>
