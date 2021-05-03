<?php include $_SERVER['DOCUMENT_ROOT']."/MyHomPage/main_img_bar.php"; ?>
<div id="main_content">
    <div class="latest1">
        <h4>게임리뷰</h4>    
			<!-- 최근 게시 글 DB에서 불러오기 -->
            <?php
	            include_once "db/db_connect.php";

                $sql = "select * from board order by num desc limit 5";
                $result = mysqli_query($con, $sql);

                if (!$result)
                    echo "<li><span>아직 게시글이 없습니다!</span></li>";
                else {
                    while ($row = mysqli_fetch_array($result)) {
                        $regist_day = substr($row["regist_day"], 0, 10);
                        ?>
						<li id="latested">
							<span><?= $row["subject"] ?></span>
							<span><?= $row["name"] ?></span>
							<span><?= $regist_day ?></span>
						</li>
                        <?php
                    }
                }
            ?>
		</ul>
	</div>
	<dive class="point_rank">
		<h4>공지사항</h4>
		<ul>
			<!-- 최근 게시 글 DB에서 불러오기 -->
            <?php
	            include_once "db/db_connect.php";

                $sql = "select * from notice order by num desc limit 5";
                $result1 = mysqli_query($con, $sql);

                if (!$result1)
                    echo "<li><span>아직 게시글이 없습니다!</span></li>";
                else {
                    while ($row = mysqli_fetch_array($result1)) {
                        $regist_day = substr($row["regist_day"], 0, 10);
                        ?>
						<li>
							<span><?= $row["subject"] ?></span>
							<span><?= $row["name"] ?></span>
							<span><?= $regist_day ?></span>
						</li>
                        <?php
                    }
                }
            ?>
		</ul>
    </dive>
</div>
<div id="main_content">
    <div class="latest">
        <h4>이미지 게시판</h4>    
        <ul>
		<!-- 최근 게시 글 DB에서 불러오기 -->
		<?php
	            include_once "db/db_connect.php";

                $sql = "select * from image_board order by num desc limit 5";
                $result = mysqli_query($con, $sql);

                if (!$result)
                    echo "<li><span>아직 게시글이 없습니다!</span></li>";
                else {
                    while ($row = mysqli_fetch_array($result)) {
                        $regist_day = substr($row["regist_day"], 0, 10);
                        ?>
						<li id="latested">
							<span><?= $row["subject"] ?></span>
							<span><?= $row["name"] ?></span>
							<span><?= $regist_day ?></span>
						</li>
                        <?php
                    }
                }
            ?>
		</ul>
	</div>
	<dive class="point_rank">
		<h4>QnA</h4>
		<ul>
			<!-- 최근 게시 글 DB에서 불러오기 -->
		<?php
	            include_once "db/db_connect.php";

                $sql = "select * from free order by num desc limit 5";
                $result1 = mysqli_query($con, $sql);

                if (!$result1)
                    echo "<li><span>아직 게시글이 없습니다!</span></li>";
                else {
                    while ($row = mysqli_fetch_array($result1)) {
                        $regist_day = substr($row["regist_day"], 0, 10);
                        ?>
						<li>
							<span><?= $row["subject"] ?></span>
							<span><?= $row["name"] ?></span>
							<span><?= $regist_day ?></span>
						</li>
                        <?php
                    }
                }
            ?>
		</ul>
    </dive>
</div>
