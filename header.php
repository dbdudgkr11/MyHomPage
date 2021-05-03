<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "1";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>
<div id="top">
    <h3>
    <i class="fas fa-gamepad"></i>
        <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/MyHomPage/index.php">MyHomePage</a>
    </h3>
    <ul id="menu_bar">
        <li>
            <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/MyHomPage/index.php">메인</a>
        </li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/MyHomPage/memo/message_box.php?mode=rv">건의</a></li>
        <li>
        <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/MyHomPage/board/board_list.php">게임리뷰</a>
        </li>
        <li>
            <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/MyHomPage/image_board/board_list.php">이미지게시판</a>
        </li>
        <li>
            <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/MyHomPage/notice/notice_list.php">공지사항</a>
        </li>
        <li>
            <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/MyHomPage/free/list.php">QnA</a>
        </li>
    </ul>
    <ul id="top_menu">
    <?php
            if(!$userid) {
                ?>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/MyHomPage/member/member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/MyHomPage/login/login_form.php">로그인</a></li>
                <?php
            } else {
                $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
                ?>
                <li><?=$logged?> </li>
                <li> | </li>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/MyHomPage/login/logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/MyHomPage/member/member_modify_form.php">정보 수정</a></li>
	            <li> | </li>
	            <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/MyHomPage/member/member_delete_form.php">회원 탈퇴</a></li>
                <?php
            }
        ?>
         <?php
            if($userlevel==1) {
                ?>
                <li> | </li>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/MyHomPage/admin/admin.php">관리자 모드</a></li>
                <?php
            }
        ?>
    <ul >
</div>