<script>
// creating an array and passing the number, questions, options, and answers

<?php ?>

let questions = [

  <?php for ($i=1; $i <= $num ; $i++) :?>
    // code...
    {
    numb: <?php echo $i?>,
    question: "<?php echo ${"question$i"} ?>",
        answer: "<?php echo ${"correct$i"} ?>",
        options: [
          "<?php echo ${"a$i"} ?>",
          "<?php echo ${"b$i"} ?>",
          "<?php echo ${"c$i"} ?>",
          "<?php echo ${"d$i"} ?>"
    ]
  },
  <?php endfor;  ?>

];
</script>
