<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>MyHomePage</title>
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/MyHomPage/css/common.css">
		<link rel="stylesheet" type="text/css" href="css/message.css">
		<script src="https://kit.fontawesome.com/1513a75356.js" crossorigin="anonymous"></script>
    	<link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/MyHomPage/js/common.js" defer></script>
	</head>
	<body onload="slide_func()">
		<header>
            <?php include $_SERVER["DOCUMENT_ROOT"] . "/MyHomPage/header.php"; ?>
		</header>
		<section>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/main_img_bar.php"; ?>
			<div id="message_box">
				<h3 class="title">
                    <?php
                        include_once $_SERVER['DOCUMENT_ROOT'] . '/MyHomPage/db/db_connect.php';
                        $mode = $_GET["mode"];
                        $num = $_GET["num"];

                        $sql = "select * from message where num=$num";
                        $result = mysqli_query($con, $sql);

                        $row = mysqli_fetch_array($result);
                        $send_id = $row["send_id"];
                        $rv_id = $row["rv_id"];
                        $regist_day = $row["regist_day"];
                        $subject = $row["subject"];
                        $content = $row["content"];

                        $content = str_replace(" ", "&nbsp;", $content);
                        $content = str_replace("\n", "<br>", $content);

                        if ($mode == "send")
                            $result2 = mysqli_query($con, "select name from members where id='$rv_id'");
                        else
                            $result2 = mysqli_query($con, "select name from members where id='$send_id'");

                        $record = mysqli_fetch_array($result2);
                        $msg_name = $record["name"];

                        if ($mode == "send")
                            echo "?????? ????????? > ????????????";
                        else
                            echo "?????? ????????? > ????????????";
                    ?>
				</h3>
				<ul id="view_content">
					<li>
						<span class="col1"><b>?????? :</b> <?= $subject ?></span>
						<span class="col2"><?= $msg_name ?> | <?= $regist_day ?></span>
					</li>
					<li>
                        <?= $content ?>
					</li>
				</ul>
				<ul class="buttons">
					<li>
						<button onclick="location.href='message_box.php?mode=rv'">?????? ?????????</button>
					</li>
					<li>
						<button onclick="location.href='message_box.php?mode=send'">?????? ?????????</button>
					</li>
                    <?php

                        if ($mode !== 'send') :
                            ?>
							<li>
								<button onclick='location.href="message_response_form.php?num=<?= $num ?>&mode=<?='reply'?>"'>?????? ??????
								</button>
							</li>
                        <?php else: ?>
							<li>
								<button onclick='location.href="message_response_form.php?num=<?= $num ?>&mode=<?='modify'?>"'>?????? ??????
								</button>
							</li>
                        <?php endif; ?>
					<li>
						<!--?????????????????? ????????? ???????????? ????????? ???????????? mode??? ?????? ????????????-->
						<button onclick="location.href='message_delete.php?num=<?= $num ?>&mode=<?= $mode ?>'">??????
						</button>
					</li>
				</ul>
			</div> <!-- message_box -->
		</section>
		<footer>
            <?php include $_SERVER["DOCUMENT_ROOT"] . "/MyHomPage/footer.php"; ?>
		</footer>
	</body>
</html>
