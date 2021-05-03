<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>MyHomePage</title>
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/MyHomPage/css/common.css">
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/MyHomPage/admin/css/admin.css?after2">
		<script src="https://kit.fontawesome.com/1513a75356.js" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap" rel="stylesheet">
	</head>
	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/header.php"; ?>
		</header>
		<section>
			<div id="admin_box">
				<h3 id="member_title">
					관리자 모드 > 회원 관리
				</h3>
				<ul id="member_list">
					<li>
						<span class="col1">번호</span>
						<span class="col2">아이디</span>
						<span class="col3">이름</span>
						<span class="col4">레벨</span>
						<span class="col5">포인트</span>
						<span class="col6">가입일</span>
						<span class="col7">수정</span>
						<span class="col8">삭제</span>
					</li>
                    <?php
                        include_once $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/db/db_connect.php";

                        if (!isset($_SESSION['userid']) && $_SESSION['userlevel']!=='1' ) {
                            echo("
						            <script>
						            alert('관리자만 접근가능합니다');
						            history.go(-1)
						            </script>
						        ");
                            exit;
                        }

                        $sql = "select * from members order by num desc";
                        $result = mysqli_query($con, $sql);
                        $total_record = mysqli_num_rows($result); // 전체 회원 수
						// 레코드셋에서 해당되는 레코드 갯수 

						//$number => 전체 레코드 갯수 
                        $number = $total_record;

						//레코드셋에 가르키는 포인터 위치 레코드를 배열로 가져온다.
						// 포인터 위치는 mysql_fetch_array($result) 사용할때 마다 다음 레코드를 불러온다
						//가르킬 레코드 위치가 없으면 null 리턴한다. = false
                        while ($row = mysqli_fetch_array($result)) {
                            $num = $row["num"];
                            $id = $row["id"];
                            $name = $row["name"];
                            $level = $row["level"];
                            $point = $row["point"];
                            $regist_day = $row["regist_day"];
                            ?>

							<li>
								<form method="post" action="./admin_member_update.php">
									<input type="hidden" name="num" value="<?= $num ?>">
									<span class="col1"><?= $number ?></span>
									<span class="col2"><?= $id ?></a></span>
									<span class="col3"><?= $name ?></span>
									<span class="col4"><input type="text" name="level" value="<?= $level ?>"></span>
									<span class="col5"><input type="text" name="point" value="<?= $point ?>"></span>
									<span class="col6"><?= $regist_day ?></span>
									<span class="col7"><button type="submit">수정</button></span>
									<span class="col8"><button type="button"
									                           onclick="location.href='admin_member_delete.php?num=<?= $num ?>'">삭제</button></span>
								</form>
							</li>

                            <?php
                            $number--;
                        }
                    ?>
				</ul>
				<h3 id="member_title">
					관리자 모드 > 게시판 관리
				</h3>
				<ul id="board_list">
					<li class="title">
						<span class="col1">선택</span>
						<span class="col2">번호</span>
						<span class="col3">이름</span>
						<span class="col4">제목</span>
						<span class="col5">첨부파일명</span>
						<span class="col6">작성일</span>
					</li>
					<form method="post" action="admin_board_delete.php">
                        <?php
                            $sql = "select * from board order by num desc";
                            $result = mysqli_query($con, $sql);
                            $total_record = mysqli_num_rows($result); // 전체 글의 수

                            $number = $total_record;

                            while ($row = mysqli_fetch_array($result)) {
                                $num = $row["num"];
                                $name = $row["name"];
                                $subject = $row["subject"];
                                $file_name = $row["file_name"];
                                $regist_day = $row["regist_day"];
                                $regist_day = substr($regist_day, 0, 10)
                                ?>
								<li>
									<span class="col1"><input type="checkbox" name="item[]" value="<?= $num ?>"></span>
									<span class="col2"><?= $number ?></span>
									<span class="col3"><?= $name ?></span>
									<span class="col4"><?= $subject ?></span>
									<span class="col5"><?= $file_name ?></span>
									<span class="col6"><?= $regist_day ?></span>
								</li>
                                <?php
                                $number--;
                            }
                            mysqli_close($con);
                        ?>
						<button type="submit">선택된 글 삭제</button>
					</form>
				</ul>
			</div> <!-- admin_box -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/footer.php"; ?>
		</footer>
	</body>
</html>
