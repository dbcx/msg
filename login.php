<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LOGIN</title>
	<link rel="stylesheet" href="./css/style.css">	
	<SCRIPT language=javascript>  
			function CheckPost()  
			{  
			    if (myform.username.value=="")  
			    {  
			        alert("请填写用户名");  
			        myform.username.focus();  
			        return false;  
			    }  
			    if (myform.password.value=="")  
			    {  
			        alert("密码不能为空");  
			        myform.password.focus();  
			        return false;  
			    }  
			} 		       
	</SCRIPT>  
</head>
<body>
	<?php 
		session_start(); 
		unset($_SESSION['username']);
		if (@!empty($_POST['password']) && !empty($_POST['username'])) {
			//判断输入，并启用session
			require ("conn.php");
			$sql="select * from user where username='$_POST[username]' and password='$_POST[password]'";
			$result=mysqli_query($con,$sql);
		    $row = mysqli_fetch_assoc($result);
			if ($row>0) {
				$_SESSION['username']=$_POST['username'];
				header('location:index.php');				
			}else{
				echo "<script>alert('请输入正确的用户名或者密码！');</script>";
			}
		}
	 ?>
	<div class="by">
		<h1><b>LOGIN <a style="text-decoration: none;color:black;" href="register.php">?</a></b></h1>
		<form name="myform" method="post" onsubmit="CheckPost();">
				<input type="text" name="username" placeholder="用户名">
				<br>
				<input type="password" name="password" placeholder="密码">
				<br>
				<input type="submit" value=">>>" >
		</form>
	</div>
</body>
</html>