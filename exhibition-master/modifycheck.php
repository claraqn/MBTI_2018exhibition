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

    if($_GET[mode]!="modify")

    {

     ?>
	<center>
    <form method="post" action="<?=$_SERVER[PHP_SELF]?>?id=<?=$_GET[id]?>&mode=modify">

      <table border=0>

        <tr>

          <td>PASSORD PLEASE!</td>

          <td><input type="password" name="pass" /></td>

          <td><input type="submit" value="확 인" /></td>

        </tr>

      </table>

    </form>

    <?php

    exit;

  }

    $sql="SELECT pass FROM guestbook WHERE id='$_GET[id]'";

    $result=$conn->query($sql);

    $row=$result->fetch_array();

    if($row[pass] == $_POST[pass])

    {

      echo "<script>alert('수정 페이지로 이동합니다');";

      echo "location.href='modify.php?id=$_GET[id]'</script>";

    }else{

      echo "<script>alert('비정상적인 요청입니다');";

      echo "location.href='list.php'</script>";

    }

     ?>

  </body>

</html>

