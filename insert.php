<?php
//1. POSTデータ取得
$title   = $_POST["title"];
$author  = $_POST["author"];
$link    = $_POST["link"];
$comment = $_POST["comment"]; //追加されています

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(title,author,link,comment,indate)VALUES(:title,:author,:link,:comment,sysdate())");
$stmt->bindValue(':title',   $title,   PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':author',  $author,  PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':link',    $link,    PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("index.php");
}
?>
