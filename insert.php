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

//*** 外部ファイルを読み込む ***
include("funcs.php");
$pdo = db_conn();

//2. DB接続します
//*** function化を使う！  ***
// try {
//     $db_name = "gs_db3";    //データベース名
//     $db_id   = "root";      //アカウント名
//     $db_pw   = "";      //パスワード：XAMPPはパスワード無しに修正してください。
//     $db_host = "localhost"; //DBホスト
//     $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
// } catch (PDOException $e) {
//     exit('DB Connection Error:'.$e->getMessage());
// }


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO ib_canvas( ideaName, customer,value, channel, relationship, revenue, resource, activity, cost, partner) VALUES( :ideaName, :customer, :value, :channel, :relationship, :revenue, :resource, :activity, :cost, :partner)");

$stmt->bindValue(':ideaName', $ideaName, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':customer', $customer, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':value', $value, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':channel', $channel, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':relationship', $relationship, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':revenue', $revenue, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':resource', $resource, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':activity', $activity, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cost', $cost, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':partner', $partner, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute(); //実行

var_dump($_POST);

//４．データ登録処理後
if ($status == false) {
    //*** function化を使う！*****************
    // $error = $stmt->errorInfo();
    // exit("SQLError:".$error[2]);
    sql_error($stmt);
} else {
    //*** function化を使う！*****************
    // header("Location: index.php");
    // exit();
    redirect("index.php");
}
