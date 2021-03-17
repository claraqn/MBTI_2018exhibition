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

    if($_GET[mode]!="delete")

    {

     ?>
	<center>
    <form method="post" action="<?=$_SERVER[PHP_SELF]?>?id=<?=$_GET[id]?>&mode=delete">

      <table border=0>

        <tr>

          <td>PASSWORD PLEASE!</td>

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

      $sql="DELETE FROM guestbook WHERE id='$_GET[id]'";

      $result=$conn->query($sql);

      echo "<script>alert('글이 정상적으로 삭제되었어요!');";

      echo "location.href='list.php'</script>";

    }else{

      echo "<script>alert('비밀번호가 틀렸어요ㅠㅠ다시 시도해보세요!');";

      echo "location.href='list.php'</script>";

    }

     ?>

  </body>

</html>
