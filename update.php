<?php
//1. POSTデータ取得
$ideaName = $_POST["ideaName"];
$customer = $_POST["customer"];
$partner = $_POST["partner"];
$activity = $_POST["activity"];
$resource = $_POST["resource"];
$channel = $_POST["channel"];
$value = $_POST["value"];
$relationship = $_POST["relationship"];
$cost = $_POST["cost"];
$revenue = $_POST["revenue"];
$id    = $_POST["id"];   //idを取得

//2. DB接続します
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数


//３．データ登録SQL作成
$sql = "UPDATE ib_canvas SET ideaName=:ideaName, customer=:customer, partner=:partner, activity=:activity, resource=:resource, channel=:channel, value=:value, relationship=:relationship, cost=:cost, revenue=:revenue WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':ideaName', $ideaName, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':customer', $customer, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue('value', $value, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':channel', $channel, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':relationship', $relationship, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':revenue', $revenue, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':resource', $resource, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':activity', $activity, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cost', $cost, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':partner', $partner, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',$id,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("select.php");
}

?>