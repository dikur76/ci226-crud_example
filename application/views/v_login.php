<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>
<body>
<form action="<?php echo site_url('login/login_act'); ?>" method="post">
<table>
	<tr>
    	<td colspan="2" align="left"><strong>CRUD Example, Login</strong>
        </td>
    </tr>
	<tr>
    	<td width="75">Username</td>
        <td width="500"> : <input type="text" name="username"><?php echo $this->session->flashdata('notif'); ?>
        </td>
    </tr>
	<tr>
    	<td>Password</td>
        <td> : <input type="password" name="password"></td>
    </tr>
	<tr>
    	<td colspan="2" align="left"><input type="submit" value="Login"> <input type="reset" value="Batal"></td>
    </tr>
</table>
</form>
</body>
</html>
