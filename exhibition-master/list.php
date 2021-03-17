<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">

    <title>GUEST BOOK</title>
	<link href="https://fonts.googleapis.com/css?family=Gaegu|Handlee" rel="stylesheet">

	 <style type="text/css">
	 body{
	 background-color:#FFD85F;
	 font-family: 'Handlee', cursive;
	 font-family: 'Gaegu', cursive;
	 font-size: 25px;
	 color: #5B370D;
	 }
	 p{
	 color: #5B370D;
	 font-size: 30px;
	 }
	 a { text-decoration: none; }

	</style>

  </head>

  <body>

    <?php

    $conn = mysqli_connect("localhost","root","123456");

    $db = mysqli_select_db($conn, "board");

    $pageNum = 5;

    $sql = "SELECT * FROM guestbook ORDER BY id DESC";

    $result = $conn->query($sql);

    $pageTotal = mysqli_num_rows($result);



    $start = $_GET['start'];

    if(!$start) $start=0;



    $sql = "SELECT * FROM guestbook ORDER BY id DESC limit $start, $pageNum";

    $result = $conn->query($sql);

    ?>

    <br />

    <center>

    <form action="insert.php" method="post">
	<p style="font-weight:bold">방명록에 후기를 남겨주세요!</p>

      <table border=0 width=600>

        <tr>

          <td>이름</td><td><input type="text" name="name"></td>

          <td>비밀번호</td><td><input type="password" name="pass"></td>

        </tr>

        <tr>

          <td  colspan=4>

            <textarea placeholder="후기를 남겨주세요!" name="content" rows="8" cols="80"></textarea>

          </td>

        </tr>

        <tr>

          <td colspan=4 align=right><input type="submit" value="확인"></td>

        </tr>

      </table>

    </form>

    <br />

    <?php

    while($row=$result->fetch_array()){

      echo "<table width=600 border=0><tr>";

      echo "<td>No. $row[id]</td>";

      echo "<td>$row[name]</td>";

      echo "<td>$row[wdate]</td>";

      echo "<td style=color:#E58518><a href='modifycheck.php?id=$row[id]'>수정</a></td>";

      echo "<td style=color:#E58518><a href='delete.php?id=$row[id]'>삭제</a></td></tr>";

      echo "<tr><td colspan=5>$row[content]</td>";

      echo "</tr></table>";

      echo "<br />";

    }

    $pages = $pageTotal / $pageNum;

    for($i=0; $i<$pages; $i++){

      $nextPage = $pageNum * $i;

      echo "<a href=$_SERVER[PHP_SELF]?start=$nextPage>[$i]</a>";
	 

    }
      echo "<a href='test.html'>[홈으로]</a>";
    ?>

  </center>

  </body>

</html>


