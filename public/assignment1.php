<?php

require_once __DIR__."/../helper/utils.php";

if(isset($_POST['login']))
{

	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	$response = getK2sProfileInfo($user_name,$password);

	if($response["status"] === $GLOBALS['_SUCCESS_'])
	{
		$account_type = $response["data"]["account_type"];
		$traffic_used_today = $response["data"]["traffic_used_today"];
		$traffic_left_today = $response["data"]["traffic_left_today"];

		$message = "<p>UserName : $user_name<br>Account Type : $account_type<br>Traffic Used Today : $traffic_used_today<br>Traffic Left Today : $traffic_left_today</p>";
	}
	else
	{
		$error_msg = $response["error_msg"];

		$message = "<p><Strong>Error :</Strong>$error_msg<p>";
	}
}	
?>

<?php include "../helper/header.php"  ?>
<main>
<h2>Login Form</h2>

<form action="#" method="post">
    <div class="container">
    <label for="user_name"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user_name" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit" name="login">Login</button>
      </div>
</form>
<?php echo "$message"   ?>
    </main>
    <footer>
	<div></div>  
    </footer>
</div>

</body>
</html>
