<!-- <div>Loop</div> -->
<p>In ket qua duoi theo 3 cach: For, While, Do-While</p>
<?php 
  echo "<br/>";
  for ($i = 0; $i < 9; $i++) {
    for ($j = 0; $j <= $i; $j++) {
      echo "* ";
    }
    echo "<br/>";
  }
?>