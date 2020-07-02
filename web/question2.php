<?php
include("mysql.inc.php");
$myTable='comment';  // 設定本程式所使用的資料表
$errMsg='';            // 存放錯誤訊息的變數
$name ='';             // 存放留言者姓名的變數 
$message ='';          // 存放留言內容的變數

//檢查是否已輸入姓名和留言 
if ( !empty($_POST['name']) && !empty($_POST['message'])) {
  //將姓名放入 $name 變數
  $name = $_POST['name'];
  //將留言放入 $message 變數
  $message = $_POST['message'];
}
//若否, 則將錯誤訊息寫入 $errMsg 變數
else {
  $errMsg.='您忘記輸入姓名<br>';
}
?>


<!DOCTYPE html>
<html class="petpet" lang="zh-Hant-TW">
<head>

    <!--- 標題 -->
    <meta charset="utf-8">
    <title>PetPet</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/vendor.css">

    <!-- JS -->
    <script src="js/modernizr.js"></script>
    <script defer src="js/fontawesome/all.min.js"></script>


</head>
<body id="top">

    <!-- header -->
    <header class="s-header">
        <div class="row">

            <div class="s-header__logo">
                <a href="main.html">
                    <img src="pet_logo.svg" alt="PetPet">
                </a>
            </div>

            <nav class="s-header__nav">
                <ul>
                    <li><a class="smoothscroll" href="main.html">主頁</a></li>
                    <li><a class="smoothscroll" href="main.html#value">核心價值</a></li>
                    <li><a class="smoothscroll" href="main.html#map">寵物圖鑒</a></li>
                    <li><a class="smoothscroll" href="main.html#knowledge">養護知識</a></li>
					<li class="current"><a class="smoothscroll" href="question.php">發問寶箱</a></li>
                    <li><a class="smoothscroll" href="main.html#aboutus">關於我們</a></li>
                </ul>
            </nav>

            <a class="s-header__menu-toggle" href="#0" title="Menu">
                <span class="s-header__menu-icon"></span>
            </a>

        </div> 
    </header> 

	<!-- 發問寶箱 -->
	<form method="post" action="question2.php" name="addmessage">
    <div id="question" class="s-about target-section">
        <div id="respond" class="column">
            <div style="text-align:center;">
				<h3>
					討論區
					<span>與大家分享你的想法或提出疑問吧d(`･∀･)b</span>
				</h3>
			</div>
			<div>




<?php
//如果 $errMsg 是空字串, 表示沒有錯誤, 可以將留言寫入資料庫
if ($errMsg==''){

  $stmt = mysqli_prepare($conn,"INSERT INTO $myTable (`name`,`content`)VALUES (?, ?)");
  
  //繫結參數
  mysqli_stmt_bind_param($stmt, 'ss', $name, $message);
  
  //將姓名、留言寫入資料庫
  mysqli_stmt_execute($stmt);
  
  if (mysqli_affected_rows($conn) > 0){
    echo '已成功新增一筆留言<br>';
  }
  else {
    echo '無法新增留言<br>';
  }
}

//如果 $errMsg 不是空字串, 便顯示錯誤訊息
else {
  echo $errMsg . '請按瀏覽器的上一頁鈕重新輸入<br>';
}

?>




	</div>
    <!-- END -->
<br><br>
<input type ="button" onclick="location.href='question.php'" value="回到發問寶箱"></input>
</div>
</body>
</html>