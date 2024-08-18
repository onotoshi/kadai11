<?php
ini_set( 'display_errors', 1 );
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続
// function db_conn()
// {
//     try {
//         $db_name = 'onotoshi_php_db04kadai';    //データベース名
//         $db_id   = 'onotoshi';      // アカウント名
//         $db_pw   = 'L_zyzqfEyCg7';      // パスワード
//         $db_host = 'mysql57.onotoshi.sakura.ne.jp'; // DBホスト（さくらサーバーのホスト名）
//         $dns ="mysql:host={$db_host};dbname={$db_name};charset=utf8";
//         $pdo = new PDO($dns, $db_id, $db_pw);
//         var_dump($pdo);
//         return $pdo;
//     } catch (PDOException $e) {
//         var_dump($e->getMessage());
//         exit('DB Connection Error:' . $e->getMessage());
//     }
// }

// //DB接続
// function db_conn(){
//     try {
//         $db_name = "gs_db_class4";    //データベース名
//         $db_id   = "root";      //アカウント名
//         $db_pw   = "";      //パスワード：XAMPPはパスワード無しに修正してください。
//         $db_host = "localhost"; //DBホスト
//         return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
//     } catch (PDOException $e) {
//       exit('DB Connection Error:'.$e->getMessage());
//     }
//   }
//DB接続
function db_conn(){
    try {
        $db_name = "onotoshi_php_db04kadai";    //データベース名
        $db_id   = "onotoshi";      //アカウント名
        $db_pw   = "to20131117";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "mysql57.onotoshi.sakura.ne.jp"; //DBホスト
        return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
      exit('DB Connection Error:'.$e->getMessage());
    }
  }

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}


// ログインチェク処理 loginCheck()
function loginCheck() 
{
if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] !== session_id()) {
    exit('LOGIN ERROR');
}
session_regenerate_id(true);
$_SESSION['chk_ssid'] = session_id();
}