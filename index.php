<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link rel="stylesheet" href="css/style.css">
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
  <!--  ビジネスモデルキャンバスの書き込みフォーマット-->
  <div class="canvas">
    <form method="POST" action="insert.php">
      <table>
        <tbody>
        <label>アイデア名：<input type="text" name="ideaName"></label>
          <tr>
            <td rowspan="2"><label>主なパートナー：<input type="text" name="partner"></label></td>
            <td><label>主な活動：<input type="text" name="activity"></label></td>
            <td colspan="2" rowspan="2"><label>価値提案：<input type="text" name="value"></label></td>
            <td><label>顧客との関係：<input type="text" name="relationship"></label></td>
            <td rowspan="2"><label>顧客セグメント：<input type="text" name="customer"></label></td>
          </tr>
          <tr>
            <td><label>主なリソース：<input type="text" name="resource"></label></td>
            <td><label>チャネル：<input type="text" name="channel"></label></td>
          </tr>
          <tr>
            <td colspan="3"><label>コスト構造：<input type="text" name="cost"></label></td>
            <td colspan="3"><label>収益の流れ：<input type="text" name="revenue"></label></td>
          </tr>
        </tbody>
      </table>
      <input type="submit" value="保存">
    </form>
  </div>
  <!-- Main[End] -->


</body>

</html>