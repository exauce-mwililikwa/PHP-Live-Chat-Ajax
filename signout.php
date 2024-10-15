<?php 
SESSION_START();
include('header.php');
$loginError = '';
if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
	include ('Chat.php');
	$chat = new Chat();
	
    $avatar = $_FILES['pic'];
		$lastInsertId = $chat->insertUser($_POST['username'],$_POST['pwd'],$avatar);
		
		// header("Location:login.php");
	} else {
		$loginError = "Invalid username or password!";
	}


?>
<title>phpzag.com : Demo Push Notification System with PHP & MySQL</title>
<?php include('container.php');?>

<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f8f9fa; /* Light background color */
    }
    .login-form {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        width: 60%; /* Set a fixed width */
    }
    .alert {
        margin-bottom: 15px; /* Add some margin */
    }
</style>

<div class="login-container">		
	<div class="login-form">
		<h2>Login</h2>		
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<?php if ($loginError) { ?>
					<div class="alert alert-warning"><?php echo $loginError; ?></div>
				<?php } ?>
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username" required>
			</div>
			<div class="form-group">
				<label for="pwd">Password</label>
				<input type="password" class="form-control" name="pwd" required>
			</div>  
            <div class="form-group">
				<label for="pic">Avatar</label>
				<input type="file" class="form-control" name="pic" accept="image/*" required>
			</div>  
			<div class="form-group">
				<button type="submit" name="login" class="btn btn-info">Login</button>
			</div>
		</form>
	</div>
</div>	

<?php include('footer.php');?>
