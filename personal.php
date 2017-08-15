<!DOCTYPE html>
<html>
<head>
	<title>个人中心--密码修改</title>
</head>
<body>
	<h1 align="center">密码修改界面</h1>
	<hr width="75%" />
	<hr width="75%" />
	<div align="center">
	<form method="post" name="myform" action="personal.php">
	<table>
		<tr>
			<td>用户名:</td>
			<td><input type="text" readonly="readonly" value="<?php session_start();echo $_SESSION['username'] ?>"></td>
		</tr>
		<tr>
			<td>旧密码:</td>
			<td><input type="password" name="oldpwd"></td>
		</tr>
		<tr>
			<td>新密码:</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr align="center">
			<td colspan="2"><input type="submit" name="" value="确认修改">
			<input type="reset" name="" value="重置数据">
			</td>
		</tr>
	</table>
	</form>
	</div>
	<?php  
		require ("conn.php");
		$name=$_SESSION['username'];
		$sql="select password from user where username='$name'";
		$result=mysqli_query($con,$sql);
		$rows=mysqli_fetch_array($result);
		mysqli_free_result();
		var_dump($_POST);
		if($_POST[password]){
			if ($rows[password]!=$_POST['oldpwd']) {
				echo "<script>alert('旧密码输入错误');</script>";
			}else{
				
				$sql="update user set password='$_POST[password]' where username='$name'";
				$result=mysqli_query($con,$sql);
				if ($result) {
					echo "<script>alert('密码更改成功');</script>";
					echo "<script>window.location.href='index.php';</script>";
				}
			}
		}
	?>
</body>
</html>	