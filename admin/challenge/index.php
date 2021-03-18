<?php include __DIR__.'/../template/header.php';


$tests = $mysqli->query('select * from tests order by id')->fetch_all(MYSQLI_ASSOC);

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
                      <a href="http://localhost/My_app/home/before_create.php" class="btn btn-success">انشاء تحدي جديد</a>
                    </div>
                </div>
                <!-- title -->
            </div>
            <div class="table-responsive">
                <table class="table v-middle">
                    <thead>
                        <tr class="bg-light">
                          <th class="border-top-0">ID</th>
                            <th class="border-top-0">العنوان</th>
                            <th class="border-top-0">عدد الأسئلة</th>
                            <th class="border-top-0">أخرى</th>
                        </tr>
                    </thead>
                    <tbody>

                      <!-- loop -->
                      <?php foreach($tests as $test): ?>
                        <tr>
                          <td><?php echo $test['id'] ?></td>
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="">
                                        <h4 class="m-b-0 font-16"><?php echo $test['title'] ?></h4>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $test['num'] ?></td>

                            <!-- actions -->
                            <td>
                              <a href="edit.php?id=<?php echo $test['id']?>&num=<?php echo $test['num']?>" class="btn btn-warning">Edit</a>
                              <form onsubmit="return confirm('Are you sure ?')"  action="" method="post" style="display: inline-block">
                                <input type="hidden" name="id" value="<?php echo $test['id'] ?>">
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
  $mysqli->query('delete from tests where id='.$_POST['id']);
  echo "<script>location.replace('index.php')</script>";
}

 include __DIR__.'/../template/footer.php' ?>
