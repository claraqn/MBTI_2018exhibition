<?php

  $conn = mysqli_connect("localhost", "root", "123456");

  $db = mysqli_select_db($conn, "board");

  $sql="UPDATE guestbook SET content='$_POST[modicont]', wdate=now() WHERE id='$_GET[id]'";

  $result=$conn->query($sql);

  echo "<script>alert('수정이 완료되었습니다.')</script>";

  echo "<script>location.href='list.php';</script>";

?>