<?php
//１．PHP
//select.phpの[PHPコードだけ！]をマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$id = $_GET["id"]; //?id~**を受け取る

include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//２．データ登録SQL作成
$stmt   = $pdo->prepare("SELECT * FROM ib_canvas WHERE id=:id"); //SQLをセット
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //idは数値なのでINT
$status = $stmt->execute(); //SQLを実行→エラーの場合falseを$statusに代入

//３．データ表示
$view=""; //HTML文字列作り、入れる変数
if($status==false) {
  //SQLエラーの場合
  sql_error($stmt);
}else{
  //SQL成功の場合
$row=$stmt->fetch();
}



?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    div {
      padding: 10px;
      font-size: 16px;
    }
  </style>
</head>

<body>

  <!-- Head[Start] -->
  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
      </div>
    </nav>
  </header>
  <!-- Head[End] -->

  <!-- Main[Start] -->
<div class="canvas">
    <form method="POST" action="update.php">
      <label>アイデア名：<input type="text" name="name"></label>
      <table>
        <tbody>
          <tr>
          <td rowspan="2"><label>主なパートナー：<input type="text" name="partnership" value="<?=$row["partnership"]?>"></label></td>
            <td><label>主な活動：<input type="text" name="activity" value="<?=$row["activity"]?>"></label></td>
            <td colspan="2" rowspan="2"><label>価値提案：<input type="text" name="proposition" value="<?=$row["proposition"]?>"></label></td>
            <td><label>顧客との関係：<input type="text" name="relationship" value="<?=$row["relationship"]?>"></label></td>
            <td rowspan="2"><label>顧客セグメント：<input type="text" name="segment" value="<?=$row["segment"]?>"></label></td>
          </tr>
          <tr>
            <td><label>主なリソース：<input type="text" name="resource" value="<?=$row["resource"]?>"></label></td>
            <td><label>チャネル：<input type="text" name="channel" value="<?=$row["channel"]?>"></label></td>
          </tr>
          <tr>
            <td colspan="3"><label>コスト構造：<input type="text" name="cost" value="<?=$row["cost"]?>"></label></td>
            <td colspan="3"><label>収益の流れ：<input type="text" name="stream" value="<?=$row["stream"]?>"></label></td>
        </tbody>
      </table>
      <input type="submit" value="保存">
    </form>
  </div>

  <!-- Main[End] -->


</body>

</html>