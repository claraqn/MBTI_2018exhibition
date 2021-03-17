<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">

    <title></title>
	<link href="https://fonts.googleapis.com/css?family=Gaegu|Handlee" rel="stylesheet">
	 <style type="text/css">
	 body{
	 background-color:#FFD85F;
	 font-family: 'Handlee', cursive;
	 font-family: 'Gaegu', cursive;
	 font-size: 25px;
	 }

	</style>

  </head>

  <body>

    <?php

    $conn=mysqli_connect("localhost", "root", "123456");

    $db=mysqli_select_db($conn, "board");

     ?>
	<center>
    <form method="post" action="update.php?id=<?=$_GET[id]?>">

      <table width=600 border=0>

        <tr>

          <td>글을 수정해주세요!</td>

        </tr>

        <tr>

          <td><textarea placeholder="글을 수정하세요!" name="modicont" rows="8" cols="80"></textarea></td>

        </tr>

          <tr>

          <td align=right><input type="submit" value="수정하기" /></td>

        </tr>

      </table>

    </form>

  </body>

</html>