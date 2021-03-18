<?php include 'template/header.php';



if(!isset($_GET['id']) || !$_GET['id']){
  die('Missing id parameter');
}

$st = $mysqli->prepare('select * from users where id = ? limit 1');
$st->bind_param('i' , $userId);
$userId = $_GET['id'];
$st->execute();

$user = $st->get_result()->fetch_assoc();

$name = $user['name'];
$email = $user['email'];
$role = $user['role'];
$errors= [];


if($_SERVER['REQUEST_METHOD'] == 'POST'){

  if(empty($_POST['email'])){array_push($errors, 'Email is required');}
  if(empty($_POST['name'])){array_push($errors, 'Name is required');}
  if(empty($_POST['role'])){array_push($errors, 'Role is required');}

  if(!count($errors)){

    $st = $mysqli->prepare('update users set name = ?, email = ?, role = ?, password = ? where id = ?');
    $st->bind_param('ssssi' , $dbName , $dbEmail , $dbRole , $dbPassword , $dbId);
    $dbName = $_POST['name'];
    $dbEmail = $_POST['email'];
    $dbRole = $_POST['role'];
    $_POST['password'] ? $dbPassword = password_hash($_POST['passowrd'], PASSWORD_DEFAULT) : $dbPassword = $user['password'];
    $dbId = $_GET["id"];

    $st->execute();

    if($st->error){
        array_push($errors, $st->error);
    }else {
        echo "<script>location.href = 'index.php'</script>";
    }//end else

  }//end if


}//end post


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
                                 <button class="btn btn-success">تحديث المستخدم</button>
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
