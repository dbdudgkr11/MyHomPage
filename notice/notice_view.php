<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>MyHomePage</title>
		<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/MyHomPage/css/common.css">
		<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/MyHomPage/notice/css/notice.css">
		<script src="https://kit.fontawesome.com/1513a75356.js" crossorigin="anonymous"></script>
    	<link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap" rel="stylesheet">
		<script src="http://<?=$_SERVER['HTTP_HOST'] ?>/MyHomPage/notice/js/notice.js"></script>
		<script src="http://<?=$_SERVER["HTTP_HOST"]?>/MyHomPage/js/common.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	</head>
	<body onload="slide_func()">
		<header>
            <?php include  $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/header.php"; ?>
		</header>
		<section>
            <?php include $_SERVER['DOCUMENT_ROOT']."/MyHomPage/main_img_bar.php"; ?>
			<div id="notice_box">
				<h3 class="title">
					공지사항 > 내용보기
				</h3>
                <?php
                    include_once $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/db/db_connect.php";
                    $num = $_GET["num"];
                    $page = $_GET["page"];

                    $sql = "select * from notice where num=$num";
                    $result = mysqli_query($con, $sql);

                    $row = mysqli_fetch_array($result);
                    $id = $row["id"];
                    $name = $row["name"];
                    $regist_day = $row["regist_day"];
                    $subject = $row["subject"];
                    $content = $row["content"];
                    $hit = $row["hit"];

                    $content = str_replace(" ", "&nbsp;", $content);
                    $content = str_replace("\n", "<br>", $content);
                    if ($userid !== $id) {
                        $new_hit = $hit + 1;
                        $sql = "update notice set hit=$new_hit where num=$num";
                        mysqli_query($con, $sql);
                    }


                ?>
				<ul id="view_content">
					<li>
						<span class="col1"><b>제목 :</b> <?= $subject ?></span>
						<span class="col2"><?= $name ?> | <?= $regist_day ?></span>
					</li>
					<li>
                        <?= $content ?>
					</li>
				</ul>
				<ul class="buttons">
					<li>
						<button onclick="location.href='notice_list.php?page=<?= $page ?>'">목록</button>
					</li>
					<li>
						<button onclick="location.href='notice_modify_form.php?num=<?= $num ?>&page=<?= $page ?>'">수정

						</button>
					</li>
					<li>
						<button onclick="location.href='notice_delete.php?num=<?= $num ?>&page=<?= $page ?>'">삭제</button>
					</li>
					<li>
						<button onclick="location.href='notice_form.php'">글쓰기</button>
					</li>
				</ul>
			</div> <!-- notice_box -->
		</section>
		<footer>
            <?php include  $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/footer.php"; ?>
		</footer>
	</body>
</html>
