<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>留言板</title>
		<style>
			a{
				font-family: 华文细黑;
				text-decoration:none;
				color: black;
			}
			.do-msg{
				margin-top: 120px;
			}
			.header{
				position: fixed;
				left: 0;
				top: 0;
				width: 100%;
			}
		</style>
		<SCRIPT language=javascript>  
			function CheckPost()  
			{  
			    if (myform.username.value=="")  
			    {  
			        alert("请填写用户名");  
			        myform.username.focus();  
			        return false;  
			    }  
			    if (myform.title.value.length<5)  
			    {  
			        alert("标题不能少于5个字符");  
			        myform.title.focus();  
			        return false;  
			    }  
			    if (myform.content.value=="")  
			    {  
			        alert("必须要填写留言内容");  
			        myform.content.focus();  
			        return false;  
			    } 
			} 		       
	</SCRIPT>  	
	</head>
	<body>
	<?php require ('cklog.php'); ?>
		<div class="header">
			<h1 align="center"><a href="add.php">留言</a>||<a href="index.php">展示</a>
			</h1><hr width="75%" /><hr width="75%" /><br />
		</div>
		<div align="center" class="do-msg">
			<form action="add.php"  method="post" name = "myform"  onsubmit="return CheckPost();">
				<table >
					<tr>
						<td>用户名:</td>
						<td><input type="text" name="username" value="<?php echo $_SESSION['username'] ;?>" readonly/></td>
					</tr>
					<tr>
						<td>标题:</td>
						<td><input type="text" name="title" /></td>
					</tr>
					<tr>
						<td valign="top">内容:</td>
						<td><textarea  name="content" cols="40" rows="9" ></textarea></td>
					</tr>
					<tr >
						<td></td>
						<td colspan="2"><input type="submit" name="submit" value="提交留言"  />
						<input type="reset" value="重置输入"></td>
					</tr>
				</table>  
			</form>  
		</div>  
		<?php  
			// 引用之前写好的连接数据库文件  
			require("conn.php");  
			  
			if(@$_POST['submit']){  
			   $sql = "insert into msg (username,title,content,lastdate) values ('$_POST[username]','$_POST[title]','$_POST[content]',now())";  
			   	mysqli_query($con,"set names utf8"); 
			    $res=mysqli_query($con,$sql);
			    if ($res) {
			      	echo "<script>alert('留言成功！');window.location.href='index.php';</script>";
			    }  
			}   
			mysqli_close($con);	  
		?>  
	</body>
</html>

