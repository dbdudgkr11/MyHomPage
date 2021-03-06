<!DOCTYPE html>
<html lang="ko" dir="ltr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/MyHomPage/css/common.css">
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/MyHomPage/free/css/greet.css?after3">
		<link rel="stylesheet" href="./css/normalize.css">
		<script src="https://kit.fontawesome.com/1513a75356.js" crossorigin="anonymous"></script>
    	<link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap" rel="stylesheet">
		<script src="http://<?= $_SERVER["HTTP_HOST"] ?>/MyHomPage/js/common.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="./js/member_form.js?ver=1"></script>
		<title>MyHomePage</title>
	</head>
	<body onload="slide_func()">
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/header.php"; ?>
		</header>
		<section>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/main_img_bar.php";

                include_once $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/db/db_connect.php";
                if (!isset($_SESSION['userid'])) {
                    echo "<script>alert('κΆνμμ11!');history.go(-1);</script>";
                    exit;
                }

                $mode = "insert";
                $checked = "";
                $subject = "";
                $content = "";
                $id = $_SESSION['userid'];

                if (isset($_GET["mode"]) && $_GET["mode"] == "update") {
                    $mode = "update";
                    $num = input_set($_GET["num"]);
                    $q_num = mysqli_real_escape_string($con, $num);

                    $sql = "SELECT * from `free` where num ='$q_num';";
                    $result = mysqli_query($con, $sql);

                    if (!$result) alert_back("Error: " . mysqli_error($con));

                    $row = mysqli_fetch_array($result);
                    $id = $row['id'];
                    $subject = htmlspecialchars($row['subject']);
                    $content = htmlspecialchars($row['content']);
                    $subject = str_replace("\n", "<br>", $subject);
                    $subject = str_replace(" ", "&nbsp;", $subject);
                    $content = str_replace("\n", "<br>", $content);
                    $content = str_replace(" ", "&nbsp;", $content);
                    $file_name_0 = $row['file_name_0'];
                    $file_copied_0 = $row['file_copied_0'];
                    $day = $row['regist_day'];
                    $is_html = $row['is_html'];
                    $checked = ($is_html == "y") ? ("checked") : ("");
                    $hit = $row['hit'];
                    mysqli_close($con);
                }
            ?>

			<div id="wrap">
				<div id="col2">
					<div id="title"><h3>λ΅λ³ν κ²μν > κ°μμΈμ¬</h3></div>
					<div class="clear"></div>
					<div id="write_form_title"><img src="./img/write_form_title.gif"></div>
					<div class="clear"></div>
					<form name="board_form" action="dml_free.php" method="post" enctype="multipart/form-data">

						<input type="hidden" name="mode" value="<?= $mode ?>">
						<div id="write_form">
							<div class="write_line"></div>
							<div id="write_row1">
								<div class="col1">μμ΄λ</div>
								<div class="col2"><?= $id ?></div>
								<div class="col3">
									<input type="checkbox" name="is_html" value="y" <?= $checked ?>>HTML μ°κΈ°
								</div>
							</div><!--end of write_row1  -->
							<div class="write_line"></div>
							<div id="write_row2">
								<div class="col1">μ &nbsp;&nbsp;λͺ©</div>
								<div class="col2"><input type="text" name="subject" value=<?= $subject ?>></div>
							</div><!--end of write_row2  -->
							<div class="write_line"></div>

							<div id="write_row3">
								<div class="col1">λ΄&nbsp;&nbsp;μ©</div>
								<div class="col2"><textarea name="content" rows="15"
								                            cols="79"><?= $content ?></textarea>
								</div>
							</div><!--end of write_row3  -->
							<div class="write_line"></div>
							<div id="write_row4">
								<div class="col1">νμΌμλ‘λ</div>
								<div class="col2">
                                    <?php
                                        if ($mode == "insert") {
                                            echo '<input type="file" name="upfile" >μ΄λ―Έμ§(2MB)νμΌ(0.5MB)';
                                        } else {
                                            ?>
											<input type="file" name="upfile"
											       onclick='document.getElementById("del_file").checked=true; document.getElementById("del_file").disabled=true'>
                                            <?php
                                        }
                                    ?>
                                    <?php
                                        if ($mode == "update" && !empty($file_name_0)) {
                                            echo "$file_name_0 νμΌλ±λ‘";
                                            echo '<input type="checkbox" id="del_file" name="del_file" value="1">μ­μ ';
                                            echo '<div class="clear"></div>';
                                            ?>
											<input type="hidden" name="num" value="<?= $num ?>">
											<input type="hidden" name="hit" value="<?= $hit ?>">
                                            <?php
                                        }
                                    ?>
								</div><!--end of col2  -->
							</div><!--end of write_row4  -->
							<div class="clear"></div>

							<div class="write_line"></div>
							<div class="clear"></div>
						</div><!--end of write_form  -->

						<div id="write_button">
							<input type="image" onclick='document.getElementById("del_file").disabled=false'
							       src="./img/ok.png">&nbsp;
							<a href="./list.php"><img src="./img/list.png"></a>
						</div><!--end of write_button-->
					</form>

				</div><!--end of col2  -->
			</div><!--end of wrap  -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/footer.php"; ?>
		</footer>
	</body>
</html>
