<?php

    $conn = mysqli_connect("localhost","root","123456");

    $db = mysqli_select_db($conn, "board");

    $sql = "INSERT INTO guestbook (name, pass, content) VALUES('$_POST[name]', '$_POST[pass]', '$_POST[content]')";

    $conn->query($sql);



    echo "<script>alert('글이 정상적으로 등록되었어요!');";

    echo "location.href='list.php';</script>";

?>