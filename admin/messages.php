<?php include 'template/header.php';

$messages = $mysqli->query('select * from messages order by id')->fetch_all(MYSQLI_ASSOC);

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
                <!-- title -->
                <div class="d-md-flex align-items-center">
                    <div>
                      <a href="create.php" class="btn btn-success">انشاء مستخدم جديد</a>
                    </div>
                </div>
                <!-- title -->
            </div>
            <div class="table-responsive">
                <table class="table v-middle">
                    <thead>
                        <tr class="bg-light">
                          <th class="border-top-0">ID</th>
                            <th class="border-top-0">الإسم</th>
                            <th class="border-top-0">البريد الاكتروني</th>
                            <th class="border-top-0">الرسالة</th>
                            <th class="border-top-0">أخرى</th>
                        </tr>
                    </thead>
                    <tbody>

                      <!-- loop -->
                      <?php foreach($messages as $message): ?>
                        <tr>
                          <td><?php echo $message['id'] ?></td>
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="">
                                        <h4 class="m-b-0 font-16"><?php echo $message['name'] ?></h4>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $message['email'] ?></td>

                            <td><?php echo $message['message'] ?></td>

                            <!-- actions -->
                            <td>
                              <form onsubmit="return confirm('Are you sure ?')"  action="" method="post" style="display: inline-block">
                                <input type="hidden" name="id" value="<?php echo $message['id'] ?>">
                                <button class="btn btn-md btn-danger" type="submit">Delete</button>
                              </form>
                            </td>
                            <!-- end actions -->
                          </tr>
                      <?php endforeach; ?>
                        <!-- loop -->

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Table -->
<!-- ============================================================== -->


<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $mysqli->query('delete from messages where id='.$_POST['id']);
  echo "<script>location.replace('index.php')</script>";
}
 include 'template/footer.php' ?>
