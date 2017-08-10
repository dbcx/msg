<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript">
		function checkE(str){
		    var re = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/
		    if(re.test(str)){
			return 0;
		    }else{
			return 1;
		    }
		}
		function check() {
			if (myform.username.value=='') {
				alert('用户名不能为空！');
				myform.username.focus();
				return false;
			}
			if (myform.password.value.length<6) {
				alert('密码不能少于6位！');
				myform.password.focus();
				return false;
			}
			//if (checkE(myform.email.value)) {
			//	alert('请输入正确的邮箱！');
			//	myform.e-mail.focus();
			//	return false;
			//}
		}
	</script>
</head>
<body>
	<?php
		if ($_POST[username]!='' && $_POST[password]!='') {
			require ('conn.php');
			$sqll="select * from user where username='$_POST[username]'";
			$ress=mysqli_query($con,$sqll);
			$row=mysqli_fetch_array($ress);	
			if ($row>0) {
				echo "<script>alert('用户名已被使用！');</script>";
			}
			else{
				mysqli_free_result($ress);
				$sql="insert into user (username,password) values('$_POST[username]','$_POST[password]')";
				$res=mysqli_query($con,$sql);
				if ($res) {
					echo "<script>alert('注册成功！');</script>";
					echo "<script>window.location.href='login.php'</script>";
				}
			}	
		}
	?>
	<h1 align="center">欢迎注册新用户</h1>
	<hr width="75%">
	<form action="register.php" name="myform" method="post" onsubmit="check();">
		<table border="0" align="center">
			<tr>
				<td align="right">用户名：</td>
				<td><input type="text" name="username"  placeholder="用户名必填"></td>
			</tr>
			<tr>
				<td align="right">性别：</td>
				<td><input type="radio" name="sex" value="男">男
				<input type="radio" name="sex" value="女">女
				</td>
			</tr>
			<tr>
				<td align="right">密码：</td>
				<td><input type="password" name="password" placeholder="密码长度为6～20位"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit"value="确认注册">
					<input type="reset" value="重新输入">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
