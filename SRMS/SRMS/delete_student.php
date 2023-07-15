<?php

include "init.php";
include "session.php";

$rno = intval($_GET['rno']);

try {

  mysqli_autocommit($conn, false);

  $result2=mysqli_query($conn, "DELETE FROM result WHERE rno=$rno") or die(mysqli_error($conn));
  $result1=mysqli_query($conn, "DELETE FROM students WHERE rno=$rno") or die(mysqli_error($conn));

  
  mysqli_commit($conn);

  header("Location: manage_students.php");
  exit();
} catch (Exception $e) {
  mysqli_rollback($conn);
  echo 'Caught exception: ', $e->getMessage();
}

mysqli_close($conn);
?>
<script type="text/javascript">
  window.location = "manage_students.php";
</script>