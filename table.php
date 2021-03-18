

<div class="card">

  <div class="content">

    <div class="table-responsive">

      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <td>#</td>
            <td>title</td>
            <td>actiona</td>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($tests as $test):?>
          <tr>
            <td><?php echo $test['id'] ?></td>
            <td><?php echo $test['title'] ?></td>
            <td><a href="quiz.php?id=<?php echo $test['id'] ?>" class="btn btn-success">Tast it</a></td>
          </tr>
          <?php endforeach;  ?>
        </tbody>

      </table>

    </div>

  </div>

</div>
