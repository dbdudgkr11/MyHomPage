<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>경아 페이지</title>
		<link rel="stylesheet" type="text/css" href="http://<?=$_SERVER["HTTP_HOST"]?>/MyHomPage/css/common.css">
		<link rel="stylesheet" type="text/css" href="http://<?=$_SERVER["HTTP_HOST"]?>/MyHomPage/member/css/member.css">
		<script src="https://kit.fontawesome.com/1513a75356.js" crossorigin="anonymous"></script>
	    <link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="http://<?=$_SERVER["HTTP_HOST"]?>/MyHomPage/member/js/member.js"></script>
		<script src="http://<?=$_SERVER["HTTP_HOST"]?>/MyHomPage/js/common.js" ></script>
	</head>
	<body onload="slide_func()">
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/header.php"; ?>
		</header>
		<section>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/main_img_bar.php"; ?>
			<div id="main_content">
				<div id="join_box">
					<h2>정말로 회원탈퇴를 하시겠습니까?</h2>
					<form name="member_form" method="post" action="./member_delete.php">
						<input type="hidden" name="id" value="<?=$userid?>">
						<br><br>
						<div>
							<input type="submit" value="확인">
						</div>
					</form>
				</div> <!-- join_box -->
			</div> <!-- main_content -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/footer.php"; ?>
		</footer>
	</body>
</html>

