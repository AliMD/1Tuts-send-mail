<?php
	error_reporting(E_ALL ^ E_NOTICE);

	$admin	 = 'target@domain.com';
	$sender  = 'info@mydomain.com';
	$subject = 'domain.com Contact';
	$name		 = $_REQUEST['name'];
	$email	 = $_REQUEST['mail'];
	$msg		 = $_REQUEST['msg'];

	$errmsg = array(
		'ok'=>'با تشکر، ایمیل شما ارسال شد.',
		'email'=>'خطا در ارسال ایمیل، لطفا دوباره تلاش کنید.',
		'validation'=>'خطا در اطلاعات فرم !'
	);
	$err = 'email';

	if( strlen($name)>=3  && strlen($email)>=7 && strpos($email, '@')>0 && strlen($msg)>=8){
		if(@mail ($admin, $subject, "Contact from: $name <$email>\r\n\r\n$msg", "From:$sender\r\nReply-To:$name <$email>")){
			$err = 'ok';
		}else{
			$err = 'email';
		}
	}else{
		$err = 'validation';
	}

?>
<!DOCTYPE HTML>
<html lang="fa">
<head>
	<meta charset="UTF-8" />
	<title>Sending mail ...</title>
	<style type="text/css">
		body {
			background-color:transparent;
			direction: rtl;
			font-size: 20px;
		}
		.err-ok{
			color:#1A1;
		}
		.err-email,
		.err-validation{
			color:#A11;
		}
	</style>
</head>
<body>
	<div class="err-<?php echo $err; ?>"><?php echo $errmsg[$err]; ?></div>
</body>
</html>