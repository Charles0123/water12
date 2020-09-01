<?php
	//啟動session，等一下要儲存連線後資訊。@是為了要讓此方法執行時，若有錯誤訊息不顯示。
	@session_start();    
	//先設定資料庫資訊，主機通常都用本機
	$host = 'localhost';
	//以root管理者帳號進入資料庫
	$dbuser ='root';
	//以root的資料庫密碼
	$dbpw = 'jf8888fendi';
	//登入後要使用的資料庫
	$dbname = 'iqWater_DB';
	
	//宣告一個link變數，並執行連接資料庫函式 mysqli_connect()，連結結果會帶入link中
	$_SESSION['link'] = mysqli_connect($host,$dbuser,$dbpw,$dbname);
    $_SESSION['dbname'] = $dbname;
	if($_SESSION['link'])
	{
		mysqli_query($_SESSION['link'],"SET NAMES utf8");
//		echo "已正連線";
		//print_r($_SESSION);
	}
	else 
	{
		echo '無法連線mysql資料庫: <br/>'.mysqli_connect_errno();
	}
?>