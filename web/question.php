<?php
include("mysql.inc.php");

//設定本程式所使用的資料表
$myTable='comment';

//查詢所有欄位, 並且依照編號遞減排序, 讓最新留言顯示在最前面
$result=mysqli_query($conn, "SELECT * FROM $myTable");

//取得留言的總筆數
$numRows = mysqli_num_rows($result);

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
        <div id="respond" class="column" style="text-align:center;">
            <div style="text-align:center;">
				<h3>
					討論區<br>
				</h3>
				<span style='font-size:25px;font-weight:bold;'>與大家分享你的想法或提出疑問吧d(`･∀･)b</span><br><br><br>
			</div>
			<div style='font-size:25px;font-weight:bold;'>
				<br>您的姓名：<input name="name" required><br><br>
				請輸入留言：<textarea style='font-size:25px;' cols="500" rows="7" name="message" required></textarea><br><br>
				<input name="submit" type="submit" value="送出"> &nbsp;&nbsp; <input name="reset." type="reset" value="清除">
				<br><br><br><br><br>
			</div>
			<div>
			<hr>
			<br><br><br><h3>留言板</h3><br><hr>
<?php
//如果留言筆數大於 0, 便顯示留言的內容
if ($numRows >0){
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "<br><br><div style='font-size:24px;font-weight:bold;'>名字：{$row['name']}</div><br>
			<div id=r1>留言：{$row['content']}<br><br>
			&emsp;&emsp;
			<br><hr></div>";
    }
}else{
	echo "<hr><br><br><div id=r1>尚未有留言。</div><br>";
}
?>
			</div>
    <!-- END -->
    </div>
	</form>
	</body>

</html>