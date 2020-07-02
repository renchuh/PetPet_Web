<?php
//資料庫設定
$dbServer = getenv('CLEARDB_DATABASE_HOST');
$dbUser = getenv('CLEARDB_DATABASE_USER');
$dbPass = getenv('CLEARDB_DATABASE_PASSWORD');
$dbName = getenv('CLEARDB_DATABASE_DB');git add .
//連線資料庫伺服器
$conn = @mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);

if (mysqli_connect_errno($conn)){
	die("無法連線資料庫伺服器");
}
else {
  echo "";//成功連結資料庫伺服器
}
//設定連線的字元集為 UTF8 編碼
mysqli_set_charset($conn, "utf8");
?>
