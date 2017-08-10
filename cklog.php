<?php 
		//判断是否已经登录
		session_start();
		if (!isset($_SESSION['username'])) {
			echo "<script>alert('您还未登录，请先登录！');</script>";
			echo "<script>window.location='login.php';</script>";
		}
	 ?>