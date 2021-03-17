<?php 
  include "/db.php";
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>GUEST BOOK</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<div id="board_area">
<p><p></p></p>
  <h1 align="center">GUEST BOOK</h1>
  <h4 align="center">친구들이 남긴 후기도 보고 직접 방명록에 후기를 남겨보세요!</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">NUM</th>
                <th width="500">TITLE</th>
                <th width="120">WITER</th>
                <th width="100">DATE</th>
                <th width="100">HIT</th>
            </tr>
        </thead>
        <?php
          $sql = mq("select * from board order by idx desc limit 0,5"); // board테이블에있는 idx를 기준으로 내림차순해서 5개까지 표시
            while($board = $sql->fetch_array())
            {
              $title=$board["title"]; 
              if(strlen($title)>30)
              { 
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]); //title이 30을 넘어서면 ...표시
              }
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500"><a href=""><?php echo $title;?></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <div id="write_btn">
      <a href="/page/board/write.php"><button>글쓰기</button></a>
    </div>
  </div>
</body>
</html>